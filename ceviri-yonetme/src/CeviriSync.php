<?php
/**
 * Çeviri yönetimi – DB işlemleri (sınıf).
 * Not: Tüm yorumlar Türkçe ve kısa tutulmuştur.
 */

class CeviriSync
{
    /** @var \PDO|object Veritabanı bağlantısı */
    private $conn;

    /** @var string Lang dosyalarının kök yolu (tr, en, ar alt klasörleri burada) */
    private $langBasePath;

    /**
     * @param \PDO|object $conn Veritabanı bağlantısı (prepare, execute, exec desteklemeli)
     * @param string|null $langBasePath Lang kök yolu
     */
    public function __construct($conn, $langBasePath = null)
    {
        $this->conn = $conn;
        $this->langBasePath = $langBasePath !== null && $langBasePath !== ''
            ? rtrim($langBasePath, DIRECTORY_SEPARATOR . '/')
            : __DIR__ . DIRECTORY_SEPARATOR . 'lang';
    }

    /**
     * SELECT sorgusu çalıştırır.
     *
     * @param string $sql
     * @return array<int, array<string, mixed>>
     */
    private function sorgu($sql)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $out = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return is_array($out) ? $out : [];
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Prepared statement çalıştırır.
     *
     * @param string $sql
     * @param array<int, mixed> $params
     * @return bool
     */
    private function execPrepared($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        return (bool) $stmt->execute($params);
    }

    /**
     * ceviri tablosu yoksa oluşturur.
     */
    public function ceviriTabloOlustur()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS ceviri (
                id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `key` VARCHAR(255) NOT NULL,
                tr TEXT,
                en TEXT,
                ar TEXT,
                kid INT UNSIGNED NOT NULL DEFAULT 0,
                UNIQUE KEY uk_key_kid (`key`, kid)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            if (method_exists($this->conn, 'exec')) {
                $this->conn->exec($sql);
            } elseif (method_exists($this->conn, 'executeStatement')) {
                $this->conn->executeStatement($sql);
            }
        } catch (\Throwable $e) {
            // Yetki/varsa hata yok say
        }
    }

    /**
     * Dosya adı -> kid eşlemesi.
     *
     * @return array<string, int>
     */
    public function getCeviriDosyaKidMap()
    {
        return [
            'header'   => 1,
            'footer'   => 3,
            'iletisim' => 4,
            'form'     => 5,
            'genel'    => 6,
        ];
    }

    /**
     * Lang klasöründen tr/en/ar okuyup satır üretir.
     *
     * @return array<int, array{key: string, tr: string, en: string, ar: string, kid: int}>
     */
    public function getCeviriVerilerFromLang()
    {
        $base = $this->langBasePath . DIRECTORY_SEPARATOR;
        $map = $this->getCeviriDosyaKidMap();
        $rows = [];

        foreach ($map as $dosya => $kid) {
            $trFile = $base . 'tr' . DIRECTORY_SEPARATOR . $dosya . '.php';
            $enFile = $base . 'en' . DIRECTORY_SEPARATOR . $dosya . '.php';
            $arFile = $base . 'ar' . DIRECTORY_SEPARATOR . $dosya . '.php';

            if (!is_file($trFile)) {
                continue;
            }

            $trData = @include $trFile;
            $enData = is_file($enFile) ? (array) @include $enFile : [];
            $arData = is_file($arFile) ? (array) @include $arFile : [];

            if (!is_array($trData)) {
                $trData = [];
            }

            foreach ($trData as $key => $trVal) {
                $rows[] = [
                    'key' => (string) $key,
                    'tr'  => (string) $trVal,
                    'en'  => isset($enData[$key]) ? (string) $enData[$key] : '',
                    'ar'  => isset($arData[$key]) ? (string) $arData[$key] : '',
                    'kid' => (int) $kid,
                ];
            }
        }

        return $rows;
    }

    /**
     * Key normalize (intl varsa).
     *
     * @param string $key
     * @return string
     */
    private function ceviriKeyNorm($key)
    {
        $key = (string) $key;
        if (class_exists('Normalizer') && method_exists('Normalizer', 'normalize')) {
            $n = \Normalizer::normalize($key, \Normalizer::FORM_C);
            return $n !== false ? $n : $key;
        }
        return $key;
    }

    /**
     * DB'deki mevcut key|kid çiftleri.
     *
     * @return array<string>
     */
    public function getCeviriMevcutKeys()
    {
        $out = [];
        $res = $this->sorgu("SELECT `key`, kid FROM ceviri");
        foreach ($res as $r) {
            $out[] = $this->ceviriKeyNorm($r['key']) . '|' . (int) $r['kid'];
        }
        return $out;
    }

    /**
     * Lang + DB durum listesi.
     *
     * @return array<int, array{key: string, tr: string, en: string, ar: string, kid: int, durum: string}>
     */
    public function getCeviriDurumListesi()
    {
        $veriler = $this->getCeviriVerilerFromLang();
        $mevcut = array_flip($this->getCeviriMevcutKeys());

        foreach ($veriler as $i => $row) {
            $k = $this->ceviriKeyNorm($row['key']) . '|' . $row['kid'];
            $veriler[$i]['durum'] = isset($mevcut[$k]) ? 'exists' : 'missing';
        }

        return $veriler;
    }

    /**
     * Lang -> DB ekler (mükerrer yakalar).
     *
     * @return array{eklenen: int, atlanan: int, hata: string}
     */
    public function ceviriVerileriEkle()
    {
        $veriler = $this->getCeviriVerilerFromLang();
        $mevcut = array_flip($this->getCeviriMevcutKeys());
        $eklenen = 0;
        $atlanan = 0;

        foreach ($veriler as $row) {
            $k = $this->ceviriKeyNorm($row['key']) . '|' . $row['kid'];
            if (isset($mevcut[$k])) {
                $atlanan++;
                continue;
            }

            try {
                $stmt = $this->conn->prepare('INSERT INTO ceviri SET `key` = ?, tr = ?, en = ?, ar = ?, kid = ?');
                $ok = $stmt->execute([$row['key'], $row['tr'], $row['en'], $row['ar'], $row['kid']]);
                if ($ok) {
                    $eklenen++;
                    $mevcut[$k] = true;
                }
            } catch (\Throwable $e) {
                $msg = $e->getMessage();
                $code = $e->getCode();
                if (($code === '23000' || strpos($msg, '1062') !== false) && strpos($msg, 'Duplicate entry') !== false) {
                    $atlanan++;
                    $mevcut[$k] = true;
                    continue;
                }
                return ['eklenen' => $eklenen, 'atlanan' => $atlanan, 'hata' => $msg];
            }
        }

        return ['eklenen' => $eklenen, 'atlanan' => $atlanan, 'hata' => ''];
    }

    /**
     * DB satırları.
     *
     * @return array<int, array{id: int, key: string, tr: string, en: string, ar: string, kid: int}>
     */
    public function getCeviriDbRows()
    {
        $rows = $this->sorgu("SELECT id, `key`, tr, en, ar, kid FROM ceviri ORDER BY kid ASC, `key` ASC, id ASC");
        $out = [];
        foreach ($rows as $r) {
            $out[] = [
                'id'  => (int) $r['id'],
                'key' => (string) $r['key'],
                'tr'  => (string) ($r['tr'] ?? ''),
                'en'  => (string) ($r['en'] ?? ''),
                'ar'  => (string) ($r['ar'] ?? ''),
                'kid' => (int) $r['kid'],
            ];
        }
        return $out;
    }

    /**
     * Satır güncelle.
     *
     * @param int $id
     * @param array{key: string, tr: string, en: string, ar: string, kid: int} $data
     * @return array{ok: bool, hata: string}
     */
    public function updateCeviriRow($id, $data)
    {
        $id = (int) $id;
        $key = isset($data['key']) ? trim((string) $data['key']) : '';
        $kid = isset($data['kid']) ? (int) $data['kid'] : 0;
        if ($id <= 0 || $key === '' || $kid <= 0) {
            return ['ok' => false, 'hata' => 'Geçersiz id/key/kid'];
        }

        try {
            $ok = $this->execPrepared(
                "UPDATE ceviri SET `key` = ?, tr = ?, en = ?, ar = ?, kid = ? WHERE id = ?",
                [(string) $key, (string) ($data['tr'] ?? ''), (string) ($data['en'] ?? ''), (string) ($data['ar'] ?? ''), $kid, $id]
            );
            return ['ok' => $ok, 'hata' => $ok ? '' : 'Güncelleme başarısız'];
        } catch (\Throwable $e) {
            return ['ok' => false, 'hata' => $e->getMessage()];
        }
    }

    /**
     * Satır sil.
     *
     * @param int $id
     * @return array{ok: bool, hata: string}
     */
    public function deleteCeviriRow($id)
    {
        $id = (int) $id;
        if ($id <= 0) {
            return ['ok' => false, 'hata' => 'Geçersiz id'];
        }
        try {
            $ok = $this->execPrepared("DELETE FROM ceviri WHERE id = ?", [$id]);
            return ['ok' => $ok, 'hata' => $ok ? '' : 'Silme başarısız'];
        } catch (\Throwable $e) {
            return ['ok' => false, 'hata' => $e->getMessage()];
        }
    }

    /**
     * Satır ekle.
     *
     * @param array{key: string, tr: string, en: string, ar: string, kid: int} $data
     * @return array{ok: bool, hata: string}
     */
    public function insertCeviriRow($data)
    {
        $key = isset($data['key']) ? trim((string) $data['key']) : '';
        $kid = isset($data['kid']) ? (int) $data['kid'] : 0;
        if ($key === '' || $kid <= 0) {
            return ['ok' => false, 'hata' => 'Geçersiz key/kid'];
        }
        try {
            $ok = $this->execPrepared(
                "INSERT INTO ceviri SET `key` = ?, tr = ?, en = ?, ar = ?, kid = ?",
                [(string) $key, (string) ($data['tr'] ?? ''), (string) ($data['en'] ?? ''), (string) ($data['ar'] ?? ''), $kid]
            );
            return ['ok' => $ok, 'hata' => $ok ? '' : 'Ekleme başarısız'];
        } catch (\Throwable $e) {
            return ['ok' => false, 'hata' => $e->getMessage()];
        }
    }

    /**
     * Tabloyu tamamen boşalt (TRUNCATE).
     *
     * @return array{ok: bool, hata: string}
     */
    public function truncateCeviriTable()
    {
        try {
            if (method_exists($this->conn, 'exec')) {
                $this->conn->exec('TRUNCATE TABLE ceviri');
            } elseif (method_exists($this->conn, 'executeStatement')) {
                $this->conn->executeStatement('TRUNCATE TABLE ceviri');
            } else {
                return ['ok' => false, 'hata' => 'TRUNCATE desteklenmiyor'];
            }
            return ['ok' => true, 'hata' => ''];
        } catch (\Throwable $e) {
            return ['ok' => false, 'hata' => $e->getMessage()];
        }
    }
}

