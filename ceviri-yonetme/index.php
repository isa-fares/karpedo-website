<?php
/**
 * Çeviri Yönetme – giriş dosyası.
 * CSS/HTML ayrı, sınıf ayrı.
 */

if (session_id() === '') {
    session_start();
}

$root = dirname(__DIR__);

require_once $root . '/vendor/autoload.php';
require_once $root . '/include/Request.php';
require_once $root . '/include/Ayarlar.php';
require_once $root . '/include/Smap.php';
require_once $root . '/include/Functions.php';
require_once $root . '/include/Database.php';

require_once __DIR__ . '/src/CeviriSync.php';

$ayarlar = new \AdminPanel\Ayarlar();
$db = new \Database\Data($ayarlar);

$conn = $db->conn;
$langPath = $root . '/include/lang';

$sync = new CeviriSync($conn, $langPath);
$sync->ceviriTabloOlustur();

if (!isset($_SESSION['ceviri_sync_csrf'])) {
    $_SESSION['ceviri_sync_csrf'] = bin2hex(random_bytes(16));
}
$csrf = (string) $_SESSION['ceviri_sync_csrf'];

$ekle_sonuc = null;
$crud_sonuc = null;
$truncate_sonuc = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfPost = isset($_POST['csrf']) && is_string($_POST['csrf']) ? $_POST['csrf'] : '';
    if (!hash_equals($csrf, $csrfPost)) {
        $crud_sonuc = ['ok' => false, 'hata' => 'CSRF doğrulaması başarısız'];
    } else {
        if (isset($_POST['ceviri_ekle'])) {
            $ekle_sonuc = $sync->ceviriVerileriEkle();
        }
        if (isset($_POST['ceviri_truncate'])) {
            $truncate_sonuc = $sync->truncateCeviriTable();
        }
        if (isset($_POST['action']) && is_string($_POST['action'])) {
            $action = $_POST['action'];
            if ($action === 'update') {
                $crud_sonuc = $sync->updateCeviriRow((int) ($_POST['id'] ?? 0), [
                    'key' => (string) ($_POST['key'] ?? ''),
                    'tr'  => (string) ($_POST['tr'] ?? ''),
                    'en'  => (string) ($_POST['en'] ?? ''),
                    'ar'  => (string) ($_POST['ar'] ?? ''),
                    'kid' => (int) ($_POST['kid'] ?? 0),
                ]);
            } elseif ($action === 'delete') {
                $crud_sonuc = $sync->deleteCeviriRow((int) ($_POST['id'] ?? 0));
            } elseif ($action === 'insert') {
                $crud_sonuc = $sync->insertCeviriRow([
                    'key' => (string) ($_POST['key'] ?? ''),
                    'tr'  => (string) ($_POST['tr'] ?? ''),
                    'en'  => (string) ($_POST['en'] ?? ''),
                    'ar'  => (string) ($_POST['ar'] ?? ''),
                    'kid' => (int) ($_POST['kid'] ?? 0),
                ]);
            }
        }
    }
}

$liste = $sync->getCeviriDurumListesi();
$db_rows = $sync->getCeviriDbRows();
$kid_etiket = array_flip($sync->getCeviriDosyaKidMap()); // kid => label

// Filtre (kid)
$filter_kid = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirect_kid'])) {
    $filter_kid = (int) $_POST['redirect_kid'];
} elseif (isset($_GET['kid'])) {
    $filter_kid = (int) $_GET['kid'];
}
if ($filter_kid > 0) {
    $liste = array_values(array_filter($liste, function ($row) use ($filter_kid) { return (int) $row['kid'] === $filter_kid; }));
    $db_rows = array_values(array_filter($db_rows, function ($r) use ($filter_kid) { return (int) $r['kid'] === $filter_kid; }));
}

$baslik = 'Çeviri Veritabanı Senkronizasyonu';

// URL tabanı (css/linkler için)
$baseUrl = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/';

header('Content-Type: text/html; charset=utf-8');
require __DIR__ . '/templates/page.php';

