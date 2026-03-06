<?php
// ============================================
// PAGE CONFIGURATION (tek dil - direkt değerler)
// ============================================
$sayfa = "hakkimizda";
$baslik = "Hakkımızda";
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);

// ============================================
// Breadcrumb
// ============================================

$br_param = [
    ["title" => $this->lang->header("index") ?: "Anasayfa", "href" => $this->langURL("index")],
    ["title" => $baslik],
];
$this->breadcrumb($br_param, $assetURL . 'img/breadcrumb/br-img-7.png');
?>

<!-- ================================================ -->
<!-- Hakkımızda İçerik -->
<!-- ================================================ -->
<section class="about-area style-one ptb-120">
    <div class="container style-one">
        <div class="row align-items-center">
            <div class="col-lg-6 pe-xxl-2">
                <div class="about-img-wrap position-relative z-1 overflow-hidden mb-md-30">
                    <span class="corner-shape-left position-absolute"></span>
                    <img src="<?= $assetURL ?>img/about/about-1.jpg" alt="Image" class="about-img">
                </div>
            </div>
            <div class="col-lg-6 ps-xxl-50 pe-xxl-1">
                <div class="about-content ps-xxl-5">
                    <h6 class="section-subtitle fs-20 fw-light text_primary mb-8">Karpedo Hakkında</h6>
                    <h2 class="section-title style-one fw-normal text-title mb-15">Dondurma ustalarının
                        mahir ellerinde benzersiz bir lezzete ulaşan tat</h2>
                    <p class="mb-25">Firmamız Kahramanmaraş Dulkadiroğlu’nda 100 m2 alanda 1995 yılında
                        Kahramanmaraş dondurması üretimine başlayıp bugün 10.000 m2 alanda, 33 çeşit
                        dondurma üretimi yapmaktadır.</p>
                    <div class="counter-card-wrap d-flex flex-wrap justify-content-between mb-15">
                        <div class="counter-card style-one mb-25">
                            <h4 class="fw-normal fs-36 text-title mb-10"><span
                                    class="transition">1995</span></h4>
                            <p class="fs-xxl-18 fw-normal d-block mb-0">Kuruluş</p>
                        </div>
                        <div class="counter-card style-one mb-25 ps-xxl-4">
                            <h4 class="fw-normal fs-36 text-title mb-10"><span
                                    class="transition">10.000</span>
                            </h4>
                            <p class="fs-xxl-18 fw-normal d-block mb-0">m² Alanda Üretim</p>
                        </div>
                        <div class="counter-card style-one mb-25 ps-xxl-4">
                            <h4 class="fw-normal fs-36 text-title mb-10"><span class="transition">33</span>
                            </h4>
                            <p class="fs-xxl-18 fw-normal d-block mb-0">Çeşit Dondurma</p>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-xl-6 col-lg-12 col-md-6 mb-20">
                            <ul class="feature-list style-one list-unstyled">
                                <li class="position-relative font-secondary fw-normal fs-xxl-18 text-title">
                                    <img src="<?= $assetURL ?>img/icons/badge-violet.svg" alt="Icon">Yapay katkı
                                    maddelerinden uzak
                                </li>
                                <li class="position-relative font-secondary fw-normal fs-xxl-18 text-title">
                                    <img src="<?= $assetURL ?>img/icons/badge-violet.svg" alt="Icon">Doğanın
                                    kalbinden gelen saflık
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="container style-one pb-90">
    <div class="row align-items-center mb-45">
        <div class="col-xl-6 col-lg-7 mb-md-10">
            <h6 class="section-subtitle fs-20 fw-light text_primary mb-10">Our Mission</h6>
            <h2 class="section-title style-one fw-normal text-title mb-0">Özel Dondurma Ustaları</h2>
        </div>
        <div class="col-xxl-4 offset-xxl-2 col-xl-5 offset-xl-1 col-lg-5">
            <p class="mb-0">Kahramanmaraş dondurmasının 300 yıllık özel tarifi ve yapımını bilen geleneksel
                ustalarımız ile akademik kısımda bulunan gıda mühendislerimizin bilgilerinin harmanlanması
                ile Karpedo Dondurmanın tadına tad, gücüne güç katmıştır.</p>
        </div>
    </div>
    <div class="row justify-content-center gx-xxl-18" style="row-gap: 30px;">
        <div class="col-xl-4 col-md-6">
            <div class="mission-card style-one br-hover-one position-relative z-1 round-20 mb-30">
                <div class="br-hover position-absolute"></div>
                <div class="mission-title d-flex flex-wrap align-items-center">
                    <div
                        class="mission-icon d-flex flex-column align-items-center justify-content-center round-10">
                        <img src="<?= $assetURL ?>img/icons/goat.png" alt="Icon">
                    </div>
                    <h3 class="fs-24 fw-normal">Keçi Sütü</h3>
                </div>
                <p class="mb-0">Bu dondurmanın kendisi gibi ‘sert’. Keçi sütü ve salep kullanılması olmazsa
                    olmaz maraş dondurması yasalarındansır.</p>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mission-card style-one br-hover-one position-relative z-1 round-20 mb-30">
                <div class="br-hover position-absolute"></div>
                <div class="mission-title d-flex flex-wrap align-items-center">
                    <div
                        class="mission-icon d-flex flex-column align-items-center justify-content-center round-10 transition">
                        <img src="<?= $assetURL ?>img/icons/ice-cream.png" alt="Icon">
                    </div>
                    <h3 class="fs-24 fw-normal">Dövülmesi</h3>
                </div>
                <p class="mb-0">Tekniği bilen ustalar tarafından dövülerek dondurulması, bu sayede elastik
                    hale getirilmesi gerekiyor.</p>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mission-card style-one br-hover-one position-relative z-1 round-20 mb-30">
                <div class="br-hover position-absolute"></div>
                <div class="mission-title d-flex flex-wrap align-items-center">
                    <div
                        class="mission-icon d-flex flex-column align-items-center justify-content-center round-10 transition">
                        <img src="<?= $assetURL ?>img/icons/aroma.png" alt="Icon">
                    </div>
                    <h3 class="fs-24 fw-normal">Aroması</h3>
                </div>
                <p class="mb-0">Karpedo’ Maraş Dondurmayı benzersiz kılan ana faktör ise Maraş’ın eşsiz
                    kendine has doğal aroması ve tadı.</p>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mission-card style-one br-hover-one position-relative z-1 round-20 mb-30">
                <div class="mission-title d-flex flex-wrap align-items-center">
                    <div
                        class="mission-icon d-flex flex-column align-items-center justify-content-center round-10 transition">
                        <img src="<?= $assetURL ?>img/icons/mountain.png" alt="Icon">
                    </div>
                    <h3 class="fs-24 fw-normal">Ahir Dağı</h3>
                </div>
                <p class="mb-0">Doğal aroması için kenti kuşatan Ahir Dağı'nın faunasından beslenmiş
                    keçilerin sütü kullanılıyor.</p>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mission-card style-one br-hover-one position-relative z-1 round-20 mb-30">
                <div class="mission-title d-flex flex-wrap align-items-center">
                    <div
                        class="mission-icon d-flex flex-column align-items-center justify-content-center round-10 transition">
                        <img src="<?= $assetURL ?>img/icons/orchid.png" alt="Icon">
                    </div>
                    <h3 class="fs-24 fw-normal">Salep</h3>
                </div>
                <p class="mb-0">Karpedo Maraş dondurmasını yapan salep de yine bölgedeki yabani orkidelerin
                    yumrularından elde ediliyor.</p>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mission-card style-one br-hover-one position-relative z-1 round-20 mb-30">
                <div class="mission-title d-flex flex-wrap align-items-center">
                    <div
                        class="mission-icon d-flex flex-column align-items-center justify-content-center round-10 transition">
                        <img src="<?= $assetURL ?>img/icons/ice-cream2.png" alt="Icon">
                    </div>
                    <h3 class="fs-24 fw-normal">Dondurma Sertliği</h3>
                </div>
                <p class="mb-0">Karpedo Maraş dondurmasının parlak beyaz rengi ve satırla kesilmesini
                    gerektiren kendine özgü sertliği de keçi sütünden geliyor.</p>
            </div>
        </div>
    </div>
</div>



<div class="funfact-area style-one position-relative z-1 pt-120 pb-90">
    <img src="<?= $assetURL ?>img/top-zigzag-shape.svg" alt="shape"
        class="top-shape position-absolute top-0 start-0 w-100 z-n1">
    <img src="<?= $assetURL ?>img/bottom-zigzag-shape.svg" alt="shape"
        class="bottom-shape position-absolute bottom-0 start-0 w-100 z-n1">
    <img src="<?= $assetURL ?>img/dot-shape-2.png" alt="shape"
        class="dot-shape position-absolute top-0 start-0 w-100 h-100 z-n1">
    <div class="container style-one">
        <div
            class="counter-card-wrap style-two d-flex flex-wrap align-items-center justify-content-md-between">
            <div class="counter-card style-two mb-25">
                <h4 class="fw-normal text-title mb-10">%<span class="transition">100</span></h4>
                <p class="fs-xxl-18 fw-normal d-block mb-0">Doğal İçerik</p>
            </div>
            <div class="counter-card style-two mb-25">
                <h4 class="fw-normal text-title mb-10"><span class="transition">33</span>+</h4>
                <p class="fs-xxl-18 fw-normal d-block mb-0">Eşsiz Reçete</p>
            </div>
            <div class="counter-card style-two mb-25">
                <h4 class="fw-normal text-title mb-10">-<span class="transition">18°C</span></h4>
                <p class="fs-xxl-18 fw-normal d-block mb-0">Soğuk Zincir</p>
            </div>
            <div class="counter-card style-two mb-25">
                <h4 class="fw-normal text-title mb-10"><span class="transition">7/24</span></h4>
                <p class="fs-xxl-18 fw-normal d-block mb-0">Modern Üretim</p>
            </div>
        </div>
    </div>
</div>

<div class="move-text-wrapper overflow-hidden pt-120 mb-120">
    <div class="move-text style-one position-relative z-1">
        <ul class="d-flex align-items-center list-unstyled mb-0">
            <li class="font-secondary text-title">Kesme Dondurma</li>
            <li><img src="<?= $assetURL ?>img/products/cake/product-thumb-10.png" alt="Image"></li>
            <li class="font-secondary text-title">Karışık Dondurma</li>
            <li><img src="<?= $assetURL ?>img/products/cake/product-thumb-11.png" alt="Image"></li>
            <li class="font-secondary text-title">Çikolatalı Dondurma</li>
            <li><img src="<?= $assetURL ?>img/products/cake/product-thumb-12.png" alt="Image"></li>
            <li class="font-secondary text-title">Bademli Dondurma </li>
            <li><img src="<?= $assetURL ?>img/products/cake/product-thumb-13.png" alt="Image"></li>
            <li class="font-secondary text-title">Baton Dondurma</li>
            <li><img src="<?= $assetURL ?>img/products/cake/product-thumb-10.png" alt="Image"></li>
            <li class="font-secondary text-title">Reyon Dondurma</li>
            <li><img src="<?= $assetURL ?>img/products/cake/product-thumb-11.png" alt="Image"></li>
        </ul>
    </div>
</div>


<section class="featured-product-area pb-90">
    <div class="container style-one">
        <div class="row">
            <div class="col-lg-6 mb-30">
                <div
                    class="featured-product style-three position-relative overflow-hidden z-1 d-flex flex-wrap align-items-center round-20">
                    <div
                        class="feature-product-bg bg-1 position-absolute top-0 start-0 w-100 h-100 z-n1 round-20 transition">
                    </div>
                    <div class="featured-product-info">
                        <h6 class="font-primary fw-medium fs-16 text_primary mb-8">Eşsiz Kalite</h6>
                        <h3 class="text-title fw-light pe-lg-5 me-xxl-2">Sıfır Taviz Kalite Standardı</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div
                    class="featured-product style-three position-relative overflow-hidden z-1 d-flex flex-wrap align-items-center round-20">
                    <div
                        class="feature-product-bg bg-2 position-absolute top-0 start-0 w-100 h-100 z-n1 round-20 transition">
                    </div>
                    <div class="featured-product-info">
                        <h6 class="font-primary fw-medium fs-16 text_primary mb-8">Dağıtım Ağı</h6>
                        <h3 class="text-title fw-light">81 İl, Binlerce Nokta</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>