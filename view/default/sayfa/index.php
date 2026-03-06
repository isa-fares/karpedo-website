<?php

/**
 * Ana Sayfa / Home Page
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION (tek dil - direkt değerler)
// ============================================
$sayfa = "index";
$baslik = "Anasayfa";
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);

// ============================================
$kategoriler = $this->dbLangSelect("kategori", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira asc, id asc");
$blogs = $this->dbLangSelect("blog", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira asc, id asc");
// Sosyal link (Instagram) - panelden değiştirilebilir
$instagram_url = $this->ayarlar("ins") ?: "https://www.instagram.com/karpedo.kurumsal";
 
//get all  foto from galeri InstagramGalari
$foto_galeri = $this->dbLangSelect("dosyalar", "aktif = 1 AND sil = 0 AND type = 'galeri'", "resim", "", "ORDER BY sira asc, id asc");

?>

<section class="hero-area style-two bg-f position-relative z-1">
    <img src="<?= $assetURL ?>img/hero/shape-3.png" alt="Shape"
        class="hero-shape-three position-absolute z-n1 bounce">
    <img src="<?= $assetURL ?>img/hero/shape-1.png" alt="Shape"
        class="hero-shape-one position-absolute z-n1 animationFramesTwo">
    <img src="<?= $assetURL ?>img/hero/shape-2.png" alt="Shape"
        class="hero-shape-two position-absolute z-n1 moveHorizontal">
    <div class="container style-one">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content mb-lg-30">
                    <h6 class="section-subtile fs-xxl-20 fw-light text_primary mb-6">Karpedo Dondurma</h6>
                    <h1>Kendinize Bir Tatlılık Yapın</h1>
                    <p class="fs-xxl-18 pe-xl-5">El yapımı dondurmanın verdiği mutluluk gibisi yoktur; biz
                        de Karpedo olarak bu deneyimi en üst seviyeye taşıyoruz. En kaliteli malzemelerle,
                        geleneksel yöntemlerle hazırladığımız her bir kaşıkta gerçek lezzeti sunuyoruz.</p>
                    <div class="btn-wrap d-flex flex-wrap align-items-center gap-3">
                        <a href="<?= $this->BaseURL("urunler", $lang, 1) ?>" class="btn style-two position-relative z-1 round-10">Ürünlerimizi
                            İnceleyin</a>
                        <a data-fslightbox="video1" href="https://www.youtube.com/watch?v=u31qwQUeGuM"
                            class="play-btn style-one d-flex flex-wrap align-items-center transition">
                            <span
                                class="play-icon d-flex flex-column align-items-center justify-content-center rounded-circle transition"><i
                                    class="ri-play-large-fill"></i></span>
                            <span class="text-title fw-bold play-text">Tanıtım Filmimizi İzleyin</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-slider-wrap style-one d-flex flex-wrap align-items-center">
                    <div class="hero-slider-one swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hero-slide-item">
                                    <img src="<?= $assetURL ?>img/hero/hero-slide-3.png" alt="Image"
                                        class="d-block mx-auto">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-slide-item">
                                    <img src="<?= $assetURL ?>img/hero/hero-slide-2.png" alt="Image"
                                        class="d-block mx-auto">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-slide-item">
                                    <img src="<?= $assetURL ?>img/hero/hero-slide-1.png" alt="Image"
                                        class="d-block mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper hero-thumbslider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="hero-thumb d-flex flex-column justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="<?= $assetURL ?>img/hero/hero-slide-3.png" alt="Image"
                                        class="d-block mx-auto">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="hero-thumb d-flex flex-column justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="<?= $assetURL ?>img/hero/hero-slide-2.png" alt="Image"
                                        class="d-block mx-auto">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="hero-thumb d-flex flex-column justify-content-center align-items-center rounded-circle bg-white">
                                    <img src="<?= $assetURL ?>img/hero/hero-slide-1.png" alt="Image"
                                        class="d-block mx-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="category-area pt-120 pb-90">
    <div class="container style-one position-relative">
        <h6 class="section-subtile fs-20 fw-light text_primary text-center mb-10">Keşfedin</h6>
        <h2 class="section-title style-one fw-normal text-title text-center mb-45">Ürün Çeşitlerimiz</h2>
        <div class="category-swiper-wrap position-relative">
            <div class="swiper category-swiper">
                <div class="swiper-wrapper">

                <?php foreach ($kategoriler as $kategori):
                    $kategori_title = $kategori["baslik"];
                    $kategori_image = $this->dbResimAl($kategori["resim"], "kategori", "200x200");
                    $kategori_url = $this->BaseURL("kategori_detay/" . $kategori["url"], $lang, 1);
                    $urun_sayisi = $this->dbCount("urun", "aktif = 1 AND sil = 0 AND kid = " . $kategori["id"]);
                ?>


                    <div class="swiper-slide">
                        <div class="category-card style-one text-center mb-30">
                            <div class="category-img position-relative rounded-circle d-block mx-auto transition">
                                <img src="<?= $kategori_image ?>" alt="<?= $kategori_title ?>" class="rounded-circle transition">
                                <a href="<?= $this->BaseURL("urunler", $lang, 1) ?>#tabs-urunler-1" class="position-absolute top-0 start-0 w-100 h-100"></a>
                            </div>
                            <h3 class="fs-24 fw-normal"><a href="<?= $kategori_url ?>" class="text-title link-hover-primary transition"><?= $kategori_title ?></a></h3>
                            <span>
                                <?php if ($urun_sayisi > 0): ?>
                                    (<?= $urun_sayisi ?> Ürün)
                                <?php endif; ?>
                        </span>
                        </div>
                    </div>
                <?php endforeach; ?>


                </div>
            </div>
        </div>
        <div class="row justify-content-center items-center">
            <div class="col-12 text-center">
                <a href="<?= $this->BaseURL("urunler", $lang, 1) ?>" class="btn style-two position-relative z-1 round-10">Tüm Ürünlerimizi İnceleyin</a>
            </div>
        </div>
    </div>
</section>



<section class="feature-area pb-120">
    <div class="container style-one">
        <div class="row gx-xxl-18 justify-content-center">
            <div class="col-xl-4 col-md-6">
                <div
                    class="featured-product style-two bg-1 position-relative img-hover-wrap round-30 mb-30">
                    <div class="feature-info text-center">
                        <h6 class="font-primary fw-medium text_primary fs-16">Karpedo Gerçek Meyveli</h6>
                        <h3 class="fw-light text-title mb-10">Gerçek Dondurma Gerçek Meyve</h3>
                        <p class="fs-xxl-18 fw-normal text-title mb-35">Mevsiminde toplanmış taptaze
                            meyvelerle hazırlanır</p>
                    </div>
                    <div class="feature-img overflow-hidden">
                        <img src="<?= $assetURL ?>img/featured/feature-1.jpg" alt="Image" class="transition">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div
                    class="featured-product style-two bg-2 position-relative img-hover-wrap round-30 mb-30">
                    <div class="feature-info text-center">
                        <h6 class="font-primary fw-medium text-white fs-16">Karpedo Lezzetli</h6>
                        <h3 class="fw-light text-white mb-10">Hafif Lezzet Düşük Kalori</h3>
                        <p class="fs-xxl-18 fw-normal text-white mb-0">Yumuşak dokusu ve kremsi yapısıyla
                            damaklarda iz bırakır</p>
                    </div>
                    <div class="feature-img overflow-hidden">
                        <img src="<?= $assetURL ?>img/featured/feature-2.jpg" alt="Image" class="transition">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div
                    class="featured-product style-two bg-3 position-relative img-hover-wrap round-30 mb-30">
                    <div class="feature-info text-center">
                        <h6 class="font-primary fw-medium text_primary fs-16">Karpedo Doğal</h6>
                        <h3 class="fw-light text-title mb-10">Temiz İçerik Doğal Kaynak</h3>
                        <p class="fs-xxl-18 fw-normal text-title mb-35">Gizli şeker
                            barındırmayan, en doğal malzemeli atıştırmalık</p>
                    </div>
                    <div class="feature-img overflow-hidden">
                        <img src="<?= $assetURL ?>img/featured/feature-3.jpg" alt="Image" class="transition">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container style-one">
    <div class="offer-area style-two bg-f position-relative z-1 round-30">
        <img src="<?= $assetURL ?>img/discount/discount-product-3.png" alt="Image" class="offer-img-one z-n1">
        <div class="container text-center">
            <div class="ft_inner">
                <h6 class="section-subtile fs-20 fw-light text_primary mb-10">Something For Everyone</h6>
                <h2 class="section-title style-one fw-normal text-title mb-15">Dondurma ustalarının mahir
                    ellerinden benzersiz bir lezzet... </h2>
                <p class="fs-xxl-18 text-center text-title mb-30">Firmamız Kahramanmaraş
                    Dulkadiroğlu’nda
                    100 m2
                    alanda 1995 yılında Kahramanmaraş dondurması üretimine başlayıp bugün 10.000 m2
                    alanda,
                    33
                    çeşit dondurma üretimi yapmaktadır.</p>
                <p class="fs-xxl-18 text-center text-title mb-30">Kahramanmaraş dondurmasının 300 yıllık
                    özel tarifi ve yapımını bilen geleneksel
                    ustalarımız ile akademik kısımda bulunan gıda mühendislerimizin bilgilerinin
                    harmanlanması ile Karpedo Dondurmanın tadına tad, gücüne güç katmıştır.</p>
                <a href="<?= $this->BaseURL("hakkimizda", $lang, 1) ?>"
                    class="btn style-three position-relative z-1 round-10">Hakkımızda</a>
            </div>
        </div>
        <div class="offer-img-two position-absolute bottom-0 end-0 z-n1">
            <img src="<?= $assetURL ?>img/discount/discount-product-4.png" alt="Image">
        </div>
    </div>
</div>

<div class="container style-one pt-120 pb-90">
    <h6 class="section-subtitle fs-20 fw-light text_primary text-center mb-10">Blog</h6>
    <h2 class="section-title style-one fw-normal text-title text-center mb-45">Lezzete Lezzet Katacak
        Bloglar
    </h2>
    <div class="row justify-content-center">
        <?php foreach ($blogs as $blog):
            $blog_title = $blog["baslik"];
            $blog_date = date("d", strtotime($blog["tarih"]));
            $blog_month = date("M", strtotime($blog["tarih"]));
            $blog_year = date("Y", strtotime($blog["tarih"]));
            $blog_image = $this->dbResimAl($blog["resim"], "blog", "480x320");
            $blog_url = $this->BaseURL("blog_detay/" . $blog["url"], $lang, 1);
        ?>
            <div class="col-xl-4 col-md-6">
                <div class="blog-card style-two img-hover-zoom round-20 mb-30">
                    <div class="br-hover position-absolute"></div>
                    <div class="blog-img position-relative img-zoom overflow-hidden round-15">
                        <img src="<?= $blog_image ?>" alt="Image"
                            class="position-absolute top-0 start-0 w-100 h-100 round-15 transition">
                        <img src="<?= $blog_image ?>" alt="Image" class="round-15 transition">
                        <a href="<?= $blog_url ?>"
                            class="blog-date fs-14 position-absolute d-flex flex-column align-items-center justify-content-center bg-white round-10 text-para transition">
                            <span class="fs-20 fw-semibold text-title d-block"><?= $blog_date ?></span>
                            <?= $blog_month ?>
                        </a>
                    </div>
                    <div class="blog-info">
                        <h3 class="fs-24"><a href="<?= $blog_url ?>"
                                class="text-title link-hover-secondary transition"><?= $blog_title ?></a></h3>
                        <a href="<?= $blog_url ?>" class="btn style-five position-relative z-1 round-10">Devamını Oku</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<div class="container style-one pb-90" id="tgs09">
    <div class="row justify-content-center">
        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-6">
            <div class="category-card style-two position-relative text-center mb-30">
                <img src="<?= $assetURL ?>img/icons/traditional.png" alt="Icon" class="d-block mx-auto mb-25">
                <h3 class="fs-24 fw-normal mb-0 transition">Geleneksel Lezzet</h3>
            </div>
        </div>
        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-6">
            <div class="category-card style-two position-relative text-center mb-30">
                <img src="<?= $assetURL ?>img/icons/soft.png" alt="Icon" class="d-block mx-auto mb-25">
                <h3 class="fs-24 fw-normal mb-0 transition">Yumuşak Doku</h3>
            </div>
        </div>
        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-6">
            <div class="category-card style-two position-relative text-center mb-30">
                <img src="<?= $assetURL ?>img/icons/calorie.png" alt="Icon" class="d-block mx-auto mb-25">
                <h3 class="fs-24 fw-normal mb-0 transition">Düşük Kalori</h3>
            </div>
        </div>
        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-6">
            <div class="category-card style-two position-relative text-center mb-30">
                <img src="<?= $assetURL ?>img/icons/contact.png" alt="Icon" class="d-block mx-auto mb-25">
                <h3 class="fs-24 fw-normal mb-0 transition">Müşteri Desteği</h3>
            </div>
        </div>
        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-6">
            <div class="category-card style-two position-relative text-center mb-30">
                <img src="<?= $assetURL ?>img/icons/strawberry.png" alt="Icon" class="d-block mx-auto mb-25">
                <h3 class="fs-24 fw-normal mb-0 transition">%100 Organik</h3>
            </div>
        </div>
        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-6">
            <div class="category-card style-two position-relative text-center mb-30">
                <img src="<?= $assetURL ?>img/icons/fruit.png" alt="Icon" class="d-block mx-auto mb-25">
                <h3 class="fs-24 fw-normal mb-0 transition">Gerçek Meyve</h3>
            </div>
        </div>
    </div>
</div>



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
            <a href="<?= $foto_url ?>" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $foto_url ?>" alt="Image" class="round-20">
            </a>
        </div>
    <?php endforeach; ?>
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