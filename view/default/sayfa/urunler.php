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
    $breadcrumb_baslik = $kategoriBaslik;
}
?>
<div class="breadcrumb-area position-relative z-1">
    <img src="<?= $assetURL ?>img/breadcrumb/br-dot-shape.png" alt="Shape"
        class="br-bg-shape position-absolute top-0 start-0 w-100 h-100 z-n1">
    <img src="<?= $assetURL ?>img/top-zigzag-shape.svg" alt="Shape"
        class="br-top-shape position-absolute top-0 start-0 w-100 z-n1">
    <img src="<?= $assetURL ?>img/bottom-zigzag-shape.svg" alt="Shape"
        class="br-bottom-shape position-absolute bottom-0 start-0 w-100 z-n1">
    <div class="container style-one text-center">
        <div class="row align-items-center">
            <div class="col-xxl-4 col-lg-3 col-md-2">
                <div class="br-img mb-sm-10">
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-2.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
            <div class="col-xxl-4 col-lg-6 col-md-8 mb-sm-10">
                <h2 class="br-title fw-normal mb-12"><?= $breadcrumb_baslik ?></h2>
                <ul class="br-menu list-unstyled mb-0">
                    <li><a href="<?= $this->BaseURL("index", $lang, 1) ?>">Anasayfa</a></li>
                    <li><a href="<?= $this->BaseURL("urunler", $lang, 1) ?>"><?= $baslik ?></a></li>
                    <?php if (!empty($id) && (int)$id > 0): ?>
                        <li><?= $breadcrumb_baslik ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-xxl-4 col-lg-3 col-md-2">
                <div class="br-img">
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-8.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>

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
                    $kategori_url = $this->BaseURL("urunler/" . $kat["url"] . "-" . $kat["id"], $lang, 1);
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