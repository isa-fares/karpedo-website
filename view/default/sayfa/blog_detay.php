<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 */

// ============================================
$table = "blog";
$veri = $this->dbLangSelectRow($table, array("id" => $id, "master_id" => $id), "resim");
// ============================================
$baslik = $this->temizle($veri["baslik"]);
$blog_id = $this->getID($veri);
$detay = $this->temizle($veri["detay"]);
$resim = $this->dbResimAl($veri["resim"], "blog");

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
// ============================================

?>

<div id="smooth-wrapper">
    <div id="smooth-content">


        <div class="navbar-top style-one bg-title">
            <div class="container style-one">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-4 text-lg-start text-center mb-lg-0 mb-2">
                        <p class="position-relative text-white d-inline-block text-lg-start text-center fs-15 mb-0">
                            <img src="<?=$assetURL?>img/icons/phone-small.svg" alt="Icon">+90 (344) 236 06 37
                        </p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-8 mb-lg-0 mb-1">
                        <div
                            class="social-share d-flex flex-wrap align-items-center justify-content-lg-end justify-content-center">
                            <span class="fs-15 text-white">Takip Edin:</span>
                            <ul class="social-profile style-six list-unstyled mb-0">
                                <li><a href="https://www.facebook.com/" target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                            class="ri-facebook-fill"></i></a></li>
                                <li><a href="https://x.com/?lang=en" target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                            class="ri-twitter-x-line"></i></a></li>
                                <li><a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                            class="ri-instagram-line"></i></a></li>
                                <li><a href="https://www.linkedin.com/" target="_blank"
                                        class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                            class="ri-linkedin-fill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="navbar-area style-two position-relative" id="navbar">
            <div class="container style-one">
                <div class="navbar-wrapper d-flex justify-content-center align-items-center">
                    <a href="index.html" class="mobilelogo">
                        <img src="<?=$assetURL?>img/karpedo_logo.png" />
                    </a>
                    <div class="menu-area me-4">
                        <div class="overlay"></div>
                        <nav class="menu">
                            <div class="menu-mobile-header">
                                <button type="button" class="menu-mobile-arrow bg-transparent border-0"><i
                                        class="ri-arrow-left-s-line"></i></button>
                                <div class="menu-mobile-title"></div>
                                <button type="button" class="menu-mobile-close bg-transparent border-0"><i
                                        class="ri-close-line"></i></button>
                            </div>
                            <ul class="menu-section p-0 mb-0 ms-0 lh-1 d-flex align-items-center">
                                <li><a href="index.html">Anasayfa</a></li>
                                <li><a href="hakkimizda.html">Hakkımızda</a></li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0)">Ürünler<i class="ri-add-line"></i></a>
                                    <ul class="menu-subs menu-column-1">
                                        <li><a href="urunler.html">Kesme Dondurma</a></li>
                                        <li><a href="urunler.html">Karışık Dondurma</a></li>
                                        <li><a href="urunler.html">Çikolatalı Dondurma</a></li>
                                        <li><a href="urunler.html">Bademli Dondurma</a></li>
                                    </ul>
                                </li>
                                <li class="nvb_li">
                                    <a href="index.html" class="navbar-brand">
                                        <img src="<?=$assetURL?>img/karpedo_logo.png" alt="Logo" class="logo-light">
                                        <img src="<?=$assetURL?>img/logo_dark.png" alt="Logo" class="logo-dark">
                                    </a>
                                </li>
                                <li><a href="#">E-Katalog</a></li>
                                <li><a class="active" href="blog_liste.html">Blog</a></li>
                                <li><a href="iletisim.html">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="other-options d-flex flex-wrap align-items-center justify-content-end">
                        <div class="option-item">
                            <ul class="option-list d-flex flex-wrap align-items-center list-unstyled mb-0">
                                <li>
                                    <div class="mobile-options position-relative d-lg-none">
                                        <div class="dropdown-menu dropdown-menu-centered mobile-option-list top-1 border-0"
                                            data-bs-popper="static">
                                            <a href="contact.html"
                                                class="btn style-three position-relative z-1 round-10">Get In
                                                Touch</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="option-item d-lg-none">
                            <button type="button" class="menu-mobile-trigger">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="breadcrumb-area position-relative z-1">
            <img src="<?=$assetURL?>img/breadcrumb/br-dot-shape.png" alt="Shape"
                class="br-bg-shape position-absolute top-0 start-0 w-100 h-100 z-n1">
            <img src="<?=$assetURL?>img/top-zigzag-shape.svg" alt="Shape"
                class="br-top-shape position-absolute top-0 start-0 w-100 z-n1">
            <img src="<?=$assetURL?>img/bottom-zigzag-shape.svg" alt="Shape"
                class="br-bottom-shape position-absolute bottom-0 start-0 w-100 z-n1">
            <div class="container style-one text-center">
                <div class="row align-items-center">
                    <div class="col-xxl-4 col-lg-3 col-md-2">
                        <div class="br-img mb-sm-10">
                            <img src="<?=$assetURL?>img/breadcrumb/br-img-1.png" alt="Image" class="d-block mx-auto">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-lg-6 col-md-8 mb-sm-10">
                        <h2 class="br-title fw-normal mb-12">Blog Detayları</h2>
                        <ul class="br-menu list-unstyled mb-0">
                            <li><a href="index.html">Anasayfa</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                    <div class="col-xxl-4 col-lg-3 col-md-2">
                        <div class="br-img">
                            <img src="<?=$assetURL?>img/breadcrumb/br-img-2.png" alt="Image" class="d-block mx-auto">
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
                            <img src="<?=$assetURL?>img/blog/single-blog-1.jpg" alt="Image" class="round-20">
                        </div>
                        <div class="single-para">
                            <h1 class="fw-normal">Karpedo’nun Sırrı: Geleneksel Maraş Usulü Dondurma</h1>
                            <div class="content-detail">
                                <p>Gerçek bir dondurmanın tadı, sadece serinletmesinde değil; damağınızda bıraktığı
                                    o eşsiz <strong>kıvam</strong> ve <strong>doğallıkta</strong> gizlidir. Bugün
                                    dünyanın dört bir yanında bilinen dondurma kültürü, Anadolu’nun kalbinde,
                                    Maraş’ın karlı dağlarından gelen bir ustalıkla birleşerek Karpedo’da hayat
                                    buluyor.</p>

                                <p>Peki, Karpedo’yu rakiplerinden ayıran ve her lokmada aynı lezzeti sunmasını
                                    sağlayan o büyük sır ne? İşte geleneksel Maraş usulü dondurmamızın hikayesi...
                                </p>

                                <h3>1. Dağların Mucizesi: Hakiki Salep</h3>
                                <p>Maraş dondurmasının olmazsa olmazı, Toros Dağları'nın yüksek kesimlerinde yetişen
                                    yabani orkidelerin köklerinden elde edilen <strong>hakiki saleptir</strong>.
                                    Karpedo olarak, dondurmamıza o meşhur sakızsı dokuyu ve benzersiz aromayı veren
                                    en kaliteli salepleri özenle seçiyoruz. Kimyasal kıvam artırıcılar yerine
                                    doğanın bize sunduğu bu mucizeyi kullanıyoruz.</p>

                                <h3>2. Taze ve Tam Yağlı Süt</h3>
                                <p>Lezzetimizin temel taşı, yerel çiftliklerden sofranıza uzanan taze sütlerdir.
                                    Geleneksel tarife sadık kalarak, sütün en saf halini işliyoruz. İçindeki yağ
                                    oranı korunmuş, besin değeri yüksek sütler, Karpedo dondurmasının o yoğun ve
                                    kremsi yapısını oluşturuyor.</p>

                                <h3>3. Sabırla Dövülen Kıvam</h3>
                                <p>Maraş dondurmasını "Maraş dondurması" yapan en önemli aşama <strong>dövme
                                        tekniğidir</strong>. Karpedo tesislerinde, modern teknolojiyi geleneksel
                                    yöntemlerle harmanlıyoruz. Dondurmamız, ideal sertliğe ve esnekliğe ulaşana
                                    kadar ustalıkla işleniyor. İşte çatalla yenen, erirken bile formunu koruyan o
                                    meşhur dokunun sırrı tam olarak burada yatıyor.</p>

                                <h3>Neden Karpedo?</h3>
                                <ul>
                                    <li><strong>Doğallık:</strong> Yapay renklendirici ve koruyucu maddelerden uzak
                                        duruyoruz.</li>
                                    <li><strong>Gelenek:</strong> Kuşaktan kuşağa aktarılan reçeteleri modern hijyen
                                        standartlarıyla birleştiriyoruz.</li>
                                    <li><strong>Tutku:</strong> Her bir paket dondurmayı, ilk günkü heyecanımızla
                                        üretiyoruz.</li>
                                </ul>

                                <p><span>Karpedo ile sadece bir tatlı yemiyor; asırlık bir geleneğin, emeğin ve
                                        doğallığın tadına bakıyorsunuz.</span></p>

                                <p><em>Gerçek Maraş lezzetini özleyenler için Karpedo, her zaman en taze haliyle
                                        yanınızda!</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="insta-slider-three swiper pb-120">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/1.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/2.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/3.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/4.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/5.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/6.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/7.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/8.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/9.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/10.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/11.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/12.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/13.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                        class="insta-card style-two position-relative round-20">
                        <img src="<?=$assetURL?>img/instagram/14.jpg" alt="Image" class="round-20">
                        <span
                            class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                class="ri-instagram-line"></i></span>
                    </a>
                </div>
            </div>f
        </div>
