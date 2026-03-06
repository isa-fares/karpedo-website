<?php

/**
 * Blog List Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
//  
// ============================================
$sayfa = "blog";
$baslik = "Blog";
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);
$foto_galeri = $this->dbLangSelect("dosyalar", "aktif = 1 AND sil = 0 AND type = 'galeri'", "resim", "", "ORDER BY sira asc, id asc");

// ============================================
// DATA PREPARATION
// ============================================

// Get all blog posts (without limit for pagination)
// ============================================
// DATA PREPARATION
// ============================================

// Get all blog posts (single query)
$all_blogs = $this->dbLangSelect(
    "blog",
    "aktif = 1 AND sil = 0 AND baslik <> ''",
    "resim",
    "",
    "ORDER BY sira DESC, id DESC"
);

// Pagination setup
$sayfaLimit = 6;
list($gecerli, $sayfaLimit, $toplamSayfa, $sayfa, $showlist) = $this->sayfalama($all_blogs, $sayfaLimit);

// Get paginated blogs from the already fetched data (no second query!)
$blogs = array_slice($all_blogs, $gecerli, $sayfaLimit);

// ============================================
// Breadcrumb
// ============================================
$br_param = [
    ["title" => $this->lang->header("index") ?: "Anasayfa", "href" => $this->langURL("index")],
    ["title" => $baslik],
];
$this->breadcrumb($br_param, $assetURL . 'img/breadcrumb/br-img-2.png');
?>

<!-- ================================================ -->
<!-- Blog Liste İçerik -->
<!-- ================================================ -->
<div class="container style-one ptb-120">
    <div class="row justify-content-center">
        <?php foreach ($blogs as $blog):
            $blog_image = $this->dbResimAl($blog["resim"], "blog", "480x320");
            $blog_title = $blog["baslik"];
            $blog_date = date("d", strtotime($blog["tarih"]));
            $blog_month = date("M", strtotime($blog["tarih"]));
            $blog_year = date("Y", strtotime($blog["tarih"]));
            $blog_url = $this->getURL($blog, "blog_detay");
        ?>
            <div class="col-xl-4 col-md-6">
                <div class="blog-card style-two img-hover-zoom round-20 mb-30">
                    <div class="br-hover position-absolute"></div>
                    <div class="blog-img position-relative img-zoom overflow-hidden round-15">
                        <a href="<?= $blog_url ?>">
                            <img src="<?= $blog_image ?>" alt="Image"
                                class="position-absolute top-0 start-0 w-100 h-100 round-15 transition">
                            <img src="<?= $blog_image ?>" alt="Image" class="round-15 transition">
                        </a>
                        <a href="<?= $blog_url ?>"
                            class="blog-date fs-14 position-absolute d-flex flex-column align-items-center justify-content-center bg-white round-10 text-para transition">
                            <span class="fs-20 fw-semibold text-title d-block"><?= $blog_date ?></span>
                            <?= $blog_month ?>
                        </a>
                    </div>
                    <div class="blog-info">
                        <h3 class="fs-24"><a href="<?= $blog_url ?>"
                                class="text-title link-hover-secondary transition"><?= $blog_title ?></a></h3>
                        <a href="<?= $blog_url ?>" class="btn style-five position-relative z-1 round-10">Devamını
                            Oku</a>
                    </div>
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
<div class="insta-slider-three swiper pb-120">
    <div class="swiper-wrapper">
        <?php foreach ($foto_galeri as $foto):
            $foto_url = $this->dbResimAl($foto["dosya"], "galeri", "1350x1688");
        ?>
            <div class="swiper-slide">
                <a href="<?= $this->ayarlar("ins") ?>" target="_blank"
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