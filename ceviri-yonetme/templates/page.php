<?php
/**
 * Çeviri yönetimi arayüzü (HTML).
 *
 * Beklenen değişkenler:
 * @var string $baslik
 * @var string $baseUrl
 * @var int $filter_kid
 * @var array<int, string> $kid_etiket
 * @var string $csrf
 * @var array|null $crud_sonuc
 * @var array|null $truncate_sonuc
 * @var array|null $ekle_sonuc
 * @var array<int, array<string, mixed>> $liste
 * @var array<int, array<string, mixed>> $db_rows
 */
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($baslik, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl . 'assets/style.css', ENT_QUOTES, 'UTF-8') ?>">
</head>
<body>
<div class="wrap">
    <h3><?= htmlspecialchars($baslik, ENT_QUOTES, 'UTF-8') ?></h3>

    <div class="filter-bar">
        <span>Filtre (sınıf):</span>
        <a href="<?= htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8') ?>"<?= $filter_kid === 0 ? ' class="active"' : '' ?>>Tümü</a>
        <?php foreach ($kid_etiket as $k => $label): ?>
            <a href="<?= htmlspecialchars($baseUrl . '?kid=' . (int) $k, ENT_QUOTES, 'UTF-8') ?>"<?= $filter_kid === (int) $k ? ' class="active"' : '' ?>><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></a>
        <?php endforeach; ?>
    </div>

    <?php if ($crud_sonuc !== null): ?>
        <div class="alert alert-info">
            <strong>İşlem:</strong>
            <?php if (!empty($crud_sonuc['hata'])): ?>
                <span class="text-danger"><?= htmlspecialchars($crud_sonuc['hata'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php else: ?>
                Başarılı
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($truncate_sonuc !== null): ?>
        <div class="alert alert-info">
            <strong>Tabloyu boşalt:</strong>
            <?php if (!empty($truncate_sonuc['hata'])): ?>
                <span class="text-danger"><?= htmlspecialchars($truncate_sonuc['hata'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php else: ?>
                ceviri tablosu tamamen boşaltıldı.
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($ekle_sonuc !== null): ?>
        <div class="alert alert-info">
            <strong>Sonuç:</strong>
            <?= (int) $ekle_sonuc['eklenen'] ?> kayıt eklendi,
            <?= (int) $ekle_sonuc['atlanan'] ?> kayıt zaten mevcut olduğu için atlandı (mükerrer).
            <?php if (!empty($ekle_sonuc['hata'])): ?>
                <br><span class="text-danger">Hata: <?= htmlspecialchars($ekle_sonuc['hata'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:20px;">
        <form method="post" style="margin:0;">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
            <input type="hidden" name="redirect_kid" value="<?= (int) $filter_kid ?>">
            <input type="hidden" name="ceviri_ekle" value="1">
            <button type="submit" class="btn">Lang → Veritabanına verileri ekle</button>
        </form>

        <form method="post" style="margin:0;">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
            <input type="hidden" name="redirect_kid" value="<?= (int) $filter_kid ?>">
            <input type="hidden" name="ceviri_truncate" value="1">
            <button type="submit" class="btn btn-danger" onclick="return confirm('ceviri tablosu tamamen boşaltılacak (TRUNCATE). Tüm kayıtlar silinecek. Emin misiniz?');">Tabloyu tamamen boşalt (TRUNCATE)</button>
        </form>
    </div>

    <p class="text-muted" style="margin-bottom: 12px;">
        <span style="color: #28a745;">■ Yeşil</span> = Veritabanında mevcut &nbsp;
        <span style="color: #dc3545;">■ Kırmızı</span> = Veritabanında yok (eklenebilir) &nbsp;
        <span style="color: #ffc107;">■ Sarı</span> = Mükerrer (aynı key+kid zaten var)
    </p>

    <div style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>Durum</th>
                <th>key</th>
                <th>kid (sınıf)</th>
                <th>tr</th>
                <th>en</th>
                <th>ar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($liste as $row):
                $durum = $row['durum'];
                $renk = ($durum === 'exists') ? '#28a745' : (($durum === 'missing') ? '#dc3545' : '#ffc107');
                $kidLabel = isset($kid_etiket[$row['kid']]) ? $kid_etiket[$row['kid']] : (string) $row['kid'];
                ?>
                <tr>
                    <td style="background-color: <?= $renk ?>; width: 8px;" title="<?= htmlspecialchars($durum, ENT_QUOTES, 'UTF-8') ?>"></td>
                    <td><code><?= htmlspecialchars($row['key'], ENT_QUOTES, 'UTF-8') ?></code></td>
                    <td><?= htmlspecialchars($kidLabel, ENT_QUOTES, 'UTF-8') ?> (<?= (int) $row['kid'] ?>)</td>
                    <td style="max-width: 200px;" title="<?= htmlspecialchars($row['tr'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(mb_substr($row['tr'], 0, 50), ENT_QUOTES, 'UTF-8') ?><?= mb_strlen($row['tr']) > 50 ? '…' : '' ?></td>
                    <td style="max-width: 200px;" title="<?= htmlspecialchars($row['en'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(mb_substr($row['en'], 0, 50), ENT_QUOTES, 'UTF-8') ?><?= mb_strlen($row['en']) > 50 ? '…' : '' ?></td>
                    <td style="max-width: 200px;" title="<?= htmlspecialchars($row['ar'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(mb_substr($row['ar'], 0, 50), ENT_QUOTES, 'UTF-8') ?><?= mb_strlen($row['ar']) > 50 ? '…' : '' ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <hr style="margin: 24px 0; border: none; border-top: 1px solid #eee;">

    <h3>Veritabanı Kayıtları (Düzenle / Sil)</h3>

    <div class="card" style="margin-bottom: 16px;">
        <strong>Yeni satır ekle</strong>
        <form method="post" style="margin-top: 10px;">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
            <input type="hidden" name="redirect_kid" value="<?= (int) $filter_kid ?>">
            <input type="hidden" name="action" value="insert">
            <div class="grid">
                <div>
                    <label>key</label>
                    <input type="text" name="key" required>
                </div>
                <div>
                    <label>kid</label>
                    <input type="number" name="kid" required min="1">
                </div>
                <div>
                    <label>tr</label>
                    <textarea name="tr"></textarea>
                </div>
                <div>
                    <label>en</label>
                    <textarea name="en"></textarea>
                </div>
                <div style="grid-column: 1 / -1;">
                    <label>ar</label>
                    <textarea name="ar"></textarea>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <button class="btn" type="submit">Ekle</button>
            </div>
        </form>
    </div>

    <div style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>key</th>
                <th>kid</th>
                <th>tr</th>
                <th>en</th>
                <th>ar</th>
                <th>İşlem</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($db_rows as $r): ?>
                <tr>
                    <form method="post">
                        <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="redirect_kid" value="<?= (int) $filter_kid ?>">
                        <input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                        <td><?= (int) $r['id'] ?></td>
                        <td><input type="text" name="key" value="<?= htmlspecialchars($r['key'], ENT_QUOTES, 'UTF-8') ?>"></td>
                        <td><input type="number" name="kid" min="1" value="<?= (int) $r['kid'] ?>"></td>
                        <td><textarea name="tr"><?= htmlspecialchars($r['tr'], ENT_QUOTES, 'UTF-8') ?></textarea></td>
                        <td><textarea name="en"><?= htmlspecialchars($r['en'], ENT_QUOTES, 'UTF-8') ?></textarea></td>
                        <td><textarea name="ar"><?= htmlspecialchars($r['ar'], ENT_QUOTES, 'UTF-8') ?></textarea></td>
                        <td style="white-space: nowrap;">
                            <button class="btn btn-secondary" type="submit" name="action" value="update">Kaydet</button>
                            <button class="btn btn-danger" type="submit" name="action" value="delete" onclick="return confirm('Silinsin mi?');">Sil</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

