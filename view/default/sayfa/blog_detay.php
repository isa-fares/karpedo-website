<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 */

// ============================================
// PAGE CONFIGURATION (tek dil - başlık yazıdan)
// ============================================
$sayfa = "blog_detay";

$table = "blog";
$veri = $this->dbLangSelectRow($table, array("id" => $id, "master_id" => $id), "ek_resim");
// ============================================
$baslik = $this->temizle($veri["baslik"]);
$blog_id = $this->getID($veri);
$detay = $this->temizle($veri["detay"]);
$resim = $this->dbResimAl($veri["ek_resim"], "blog", "1014x486");

// ============================================
// PAGE TITLE
// ============================================
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);
$this->ogBaslik = $this->sayfaBaslik;
$this->ogUrl = $this->fullUrl;
if (!empty($resim)) {
    $this->ogResim = $resim;
}

// ============================================
// SHARE DATA FOR SOCIAL MEDIA
// ============================================
$current_url = urlencode($this->fullUrl);
$instagram_url = $this->ayarlar("ins") ?: "https://www.instagram.com/karpedo.kurumsal";
// ============================================
//get all  foto from galeri InstagramGalari
$foto_galeri = $this->dbLangSelect("dosyalar", "aktif = 1 AND sil = 0 AND type = 'galeri'", "resim", "", "ORDER BY sira asc, id asc");

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
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-1.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
            <div class="col-xxl-4 col-lg-6 col-md-8 mb-sm-10">
                <h2 class="br-title fw-normal mb-12"><?= $this->sayfaBaslik() ?></h2>
                <ul class="br-menu list-unstyled mb-0">
                    <li><a href="<?= $this->langURL("index") ?>"><?= $this->lang->header("index") ?: 'Anasayfa' ?></a></li>
                    <li><a href="<?= $this->langURL("blog") ?>">Blog</a></li>
                    <li><?= $this->cumleKisalt($baslik, 40) ?></li>
                </ul>
            </div>
            <div class="col-xxl-4 col-lg-3 col-md-2">
                <div class="br-img">
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-2.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container style-one ptb-120">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <div class="blog-desc">
                <div class="single-img round-20 mb-45">
                    <img src="<?= $resim ?>" alt="Image" class="round-20">
                </div>
                <div class="single-para">
                    <div class="content-detail">
                        <?= $detay ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="insta-slider-three swiper pb-120">
    <div class="swiper-wrapper">
        <?php foreach ($foto_galeri as $foto):
        $foto_url = $this->dbResimAl($foto["dosya"], "galeri", "1350x1688");
        ?>
        <div class="swiper-slide">
            <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $foto_url ?>" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
                                                                                                                                                                                                                                                                                                                            </div>
</div>