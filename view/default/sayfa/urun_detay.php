<?php
/**
 * Ürün detay sayfası
 * @var $this FrontClass|Loader
 * @var $lang string
 * @var $assetURL string
 * @var $id int
 */

$urun = $this->dbLangSelectRow("urun", array("id" => $id, "master_id" => $id), "resim", "", "ORDER BY sira DESC, id DESC");
$urun_image = $this->dbResimAl($urun["resim"], "urun", "400x336");
$urun_baslik = $urun["baslik"];
$urun_url = $this->getURL($urun, "urun_detay");
$urun_ozet = $urun["ozet"];
$urun_detay = $this->temizle($urun["icindekiler"]);
$urunler = $this->dbLangSelect("urun", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira DESC, id DESC");

// ============================================
// PAGE CONFIGURATION (tek dil - başlık ürün adından)
// ============================================
$sayfa = "urun_detay";
$this->sayfaBaslik = $urun_baslik . " - " . $this->ayarlar("title_" . $lang);

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
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-9.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
            <div class="col-xxl-4 col-lg-6 col-md-8 mb-sm-10">
                <h2 class="br-title fw-normal mb-12"><?= $this->sayfaBaslik() ?></h2>
                <ul class="br-menu list-unstyled mb-0">
                    <li><a href="<?= $this->langURL("index") ?>"><?= $this->lang->header("index") ?: 'Anasayfa' ?></a></li>
                    <li><a href="<?= $this->langURL("urunler") ?>">Ürünler</a></li>
                    <li><?= htmlspecialchars($urun_baslik) ?></li>
                </ul>
            </div>
            <div class="col-xxl-4 col-lg-3 col-md-2">
                <div class="br-img">
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-10.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container style-one pt-120">
    <div class="product-details-wrapper pb-90">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-lg-6">
                <div
                    class="single-product-img bg-ash d-flex flex-column align-items-center justify-content-center round-20 mb-md-30">
                    <a data-fslightbox="gallery"
                        href="https://www.karpedo.com/wp-content/uploads/2022/04/27_mango_reyon_dondurma00.png"
                        class="d-block">
                        <img src="https://www.karpedo.com/wp-content/uploads/2022/04/27_mango_reyon_dondurma00.png"
                            alt="Product" class="d-block mx-auto">
                    </a>
                </div>
            </div>
            <div class="col-xxl-7 col-lg-6 ps-xl-5">
                <div class="single-product-info">
                    <h1 class="fw-normal text-title"><?= $urun_baslik ?></h1>
                    <p>
                        <?= $urun_ozet ? $urun_ozet : "Bu sayfanın içeriği güncellenmektedir." ?>
                    </p>
                    <a href="<?= $this->langURL("iletisim") ?>" class="btn style-two position-relative z-1 round-10 mb-25">Tedarik
                        İçin İletişime Geçin</a>
                    <div class="post-share d-flex flex-wrap align-items-center">
                        <span class="text-para fw-semibold me-3">Paylaş:</span>
                        <ul class="social-profile style-three list-unstyled mb-0">
                            <?= $this->getSocialList() ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs list-unstyled product-tablist style-two d-inline-flex align-items-center mb-25"
        role="tablist">
        <li class="nav-item border-0">
            <button class="nav-link border-0 active" data-bs-toggle="tab" data-bs-target="#tab_1"
                type="button" role="tab">Açıklama</button>
        </li>
    </ul>
    <div class="tab-content product-tab-content pb-120">
        <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
            <div class="product_desc content-detail">
                <?= $urun_detay ? $urun_detay : "Bu sayfanın içeriği güncellenmektedir." ?>
            </div>
        </div>
    </div>



    <div class="container style-one pb-90">
        <h6 class="section-subtile fs-20 fw-light text_primary text-center mb-10">Karpedo Dondurma</h6>
        <h2 class="section-title style-one fw-normal text-title text-center mb-45">Diğer Ürünlerimiz</h2>
        <div class="row justify-content-center">


            <?php foreach ($urunler as $urun) :
                if ($urun["id"] == $id) continue;
                $urun_image = $this->dbResimAl($urun["resim"], "urun", "400x336");
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

    <div class="container style-one">
        <h6 class="section-subtitle fs-20 fw-light text_primary text-center mb-10">Instagram</h6>
        <h2 class="section-title style-one fw-normal text-title text-center mb-45">Bizi Instagram'da Takip Edin
        </h2>
    </div>
    <div class="insta-slider-three swiper pb-120">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/1.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/2.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/3.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/4.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/5.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/6.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/7.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/8.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/9.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/10.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/11.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/12.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/13.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $assetURL ?>img/instagram/14.jpg" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
        </div>
    </div>