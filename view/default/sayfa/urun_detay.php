<?php

/**
 * Ürün detay sayfası
 * @var $this FrontClass|Loader
 * @var $lang string
 * @var $assetURL string
 * @var $id int
 */

$urun = $this->dbLangSelectRow("urun", array("id" => $id, "master_id" => $id), "resim", "", "ORDER BY sira DESC, id DESC");
$urun_image = $this->dbResimAl($urun["resim"], "urun", "1200x0");
$urun_baslik = $urun["baslik"];
$urun_url = $this->getURL($urun, "urun_detay");
$urun_ozet = $urun["ozet"];
$urun_detay = $this->temizle($urun["detay"]);
$urunler = $this->dbLangSelect("urun", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira DESC, id DESC LIMIT 5");
$ek_resim = $this->dbResimAl($urun["ek_resim"], "urun", "400x0");
// ============================================
// PAGE CONFIGURATION (tek dil - başlık ürün adından)
// ============================================
$sayfa = "urun_detay";
$this->sayfaBaslik = $urun_baslik . " - " . $this->ayarlar("title_" . $lang);
$urunuKategori = $this->dbLangSelectRow("kategori", array("id" => $urun["kid"]), "baslik", "", "ORDER BY sira DESC, id DESC");


// ============================================
// Breadcrumb
// ============================================

$br_param = [
    ["title" => $this->lang->header("index") ?: "Anasayfa", "href" => $this->langURL("index")],
    ["title" => "Ürünler", "href" => $this->langURL("urunler")],
    ["title" => $urun_baslik],
];
$this->breadcrumb($br_param, $assetURL . 'img/breadcrumb/br-img-2.png');
?>

<!-- ================================================ -->
<!-- Product Details Wrapper Start -->
<!-- ================================================ -->
<div class="container style-one pt-120">
    <div class="product-details-wrapper pb-90 ">
        <div class="row align-items-center ">
            <div class="col-xxl-5 col-lg-6">
                <div
                    class="single-product-img bg-ash d-flex flex-column align-items-center justify-content-center round-20 mb-md-30">
                    <a data-fslightbox="gallery"
                        href="<?= $urun_image ?>"
                        class="d-block">
                        <img src="<?= $urun_image ?>"
                            alt="Product" class="d-block mx-auto w-100">
                    </a>
                </div>
            </div>
            <div class="col-xxl-7 col-lg-6 ps-xl-5">
                <div class="single-product-info">
                    <?= $urun_detay ? $urun_detay : "Bu Alanın içeriği güncellenmektedir." ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================ -->
    <!-- Diğer Ürünler -->
    <!-- ================================================ -->
    <div class="container style-one pb-90">
        <h6 class="section-subtile fs-20 fw-light text_primary text-center mb-10">Karpedo Dondurma</h6>
        <h2 class="section-title style-one fw-normal text-title text-center mb-45">Diğer Ürünlerimiz</h2>
        <div class="row justify-content-center">


            <?php foreach ($urunler as $urun) :
                if ($urun["id"] == $id) continue;
                $urun_image = $this->dbResimAl($urun["resim"], "urun", "400x0");
                $urun_baslik = $urun["baslik"];
                $urun_url = $this->getURL($urun, "urun_detay");
            ?>
                <div class="col-xxl-3 col-xl-4 col-md-6">
                    <div
                        class="product-card br-hover-one style-one text-center position-relative z-1 round-20 mb-30  transition">
                        <div
                            class="product-img d-flex flex-column align-items-center justify-content-center mx-auto">
                            <a href="<?= $urun_url ?>"><img src="<?= $urun_image ?>"
                                    alt="<?= htmlspecialchars($urun_baslik) ?>" class="d-block mx-auto"></a>
                        </div>
                        <h3 class="fs-24"><a href="<?= $urun_url ?>" class="text-title link-hover-primary"><?= $urun_baslik ?></a></h3>
                        <a href="<?= $urun_url ?>" class="btn style-four position-relative z-1 round-10">Ürünü İncele</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ================================================ -->
    <!-- Instagram Bölümü -->
    <!-- ================================================ -->
    <div class="container style-one">
        <h6 class="section-subtitle fs-20 fw-light text_primary text-center mb-10">Instagram</h6>
        <h2 class="section-title style-one fw-normal text-title text-center mb-45">Bizi Instagram'da Takip Edin
        </h2>
    </div>
    <?php $this->instaSlider(); ?>  
</div>