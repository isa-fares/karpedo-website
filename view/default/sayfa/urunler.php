<?php

/**
 * Ürünler: urunler.html = tüm kategoriler; urunler/slug-id.html = o kategorideki ürünler
 * @var $this FrontClass|Loader
 * @var $lang string
 * @var $assetURL string
 * @var $id int kategori id (0 ise kategoriler listelenir)
 */

$sayfa = "urunler";
$baslik = "Ürünler";
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);

// Kategori seçili değilse (urunler.html) → kategorileri listele; seçiliyse → ürünleri listele
if (empty($id) || (int)$id === 0) {
    // ========== SAYFA: Tüm kategoriler (https://localhost/karpedo/urunler.html)
    $kategoriler = $this->dbLangSelect("kategori", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira ASC, id ASC");
    $breadcrumb_baslik = $baslik;
} else {
    // ========== SAYFA: Seçili kategorideki ürünler (urunler/kategori-url-id.html)
    $urunler = $this->dbLangSelect("urun", "aktif = 1 AND sil = 0 AND baslik <> '' AND kid = " . (int)$id, "resim", "", "ORDER BY sira DESC, id DESC");
    $kategori = $this->dbLangSelectRow("kategori", array("id" => $id), "baslik", "", "ORDER BY sira DESC, id DESC");
    $kategoriBaslik = isset($kategori["baslik"]) ? $kategori["baslik"] : $baslik;
}


// ============================================
// Breadcrumb
// ============================================

$br_param = [
    ["title" => $this->lang->header("index") ?: "Anasayfa", "href" => $this->langURL("index")],
];
if (!empty($id) && (int)$id > 0) {
    $br_param[] = ["title" => $baslik, "href" => $this->langURL("urunler")];
    $br_param[] = ["title" => $kategoriBaslik];
} else {
    $br_param[] = ["title" => $baslik];
}
$this->breadcrumb($br_param, $assetURL . 'img/breadcrumb/br-img-3.png');
?>



<!-- ================================================ -->
<!-- Ürünler / Kategori İçerik -->
<!-- ================================================ -->
<div class="container style-one pt-120 pb-90">
    <!-- ========== Görünüm: Kategoriler listesi -->
    <?php if (empty($id) || (int)$id === 0): ?>
        <?php if (!empty($kategoriler)): ?>
            <h6 class="section-subtile fs-20 fw-light text_primary text-center mb-10">Keşfedin</h6>
            <h2 class="section-title style-one fw-normal text-title text-center mb-45">Ürün Çeşitlerimiz</h2>
            <div class="row justify-content-center" style="row-gap: 30px;">
                <?php foreach ($kategoriler as $kat):
                    $kategori_title = $kat["baslik"];
                    $kategori_image = $this->dbResimAl($kat["resim"], "kategori", "400x336");
                    $kategori_url = $this->getURL($kat, "urunler", $lang, 1);
                ?>
                    <div class="col-xxl-3 col-xl-4 col-md-6">
                        <div class="product-card br-hover-one style-one text-center position-relative z-1 round-20 mb-30 transition">
                            <div class="product-img d-flex flex-column align-items-center justify-content-center mx-auto">
                                <a href="<?= $kategori_url ?>">
                                    <img src="<?= $kategori_image ?>" alt="<?= htmlspecialchars($kategori_title) ?>" class="d-block mx-auto">
                                </a>
                            </div>
                            <h3 class="fs-24"><a href="<?= $kategori_url ?>" class="text-title link-hover-primary"><?= $kategori_title ?></a></h3>
                            <a href="<?= $kategori_url ?>" class="btn style-four position-relative z-1 round-10">Ürünleri Gör</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-guncelleme text-center">
                    <h4 class="mb-0">Bu sayfanın içeriği güncellenmektedir.</h4>
                    <h4 class="mb-0">Lütfen daha sonra tekrar kontrol ediniz.</h4>
                </div>
            </div>
        <?php endif; ?>

        <!-- ==========  Kategorideki ürünler -->
    <?php else: ?>
        <div class="row justify-content-center" style="row-gap: 30px;">
            <?php if (!empty($urunler)): ?>
                <?php foreach ($urunler as $urun):
                    $urun_image = $this->dbResimAl($urun["resim"], "urun", "400x0");
                    $urun_baslik = $urun["baslik"];
                    $urun_url = $this->getURL($urun, "urun_detay");
                ?>
                    <div class="col-xxl-3 col-xl-4 col-md-6">
                        <div class="product-card br-hover-one style-one text-center position-relative z-1 round-20 mb-30 transition">
                            <div class="product-img d-flex flex-column align-items-center justify-content-center mx-auto">
                                <a href="<?= $urun_url ?>">
                                    <img src="<?= $urun_image ?>" alt="Ürün görseli" class="d-block mx-auto">
                                </a>
                            </div>
                            <h3 class="fs-24"><a href="<?= $urun_url ?>" class="text-title link-hover-primary"><?= $urun_baslik ?></a></h3>
                            <a href="<?= $urun_url ?>" class="btn style-four position-relative z-1 round-10">Ürünü İncele</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-guncelleme text-center">
                        <h4 class="mb-0">Bu kategoride henüz ürün bulunmamaktadır.</h4>
                        <h4 class="mb-0">Lütfen daha sonra tekrar kontrol ediniz.</h4>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>