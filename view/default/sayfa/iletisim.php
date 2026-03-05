<?php
// ============================================
// PAGE CONFIGURATION (tek dil - direkt değerler)
// ============================================
$sayfa = "iletisim";
$baslik = "İletişim";
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);
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
                <h2 class="br-title fw-normal mb-12"><?= $this->sayfaBaslik() ?></h2>
                <ul class="br-menu list-unstyled mb-0">
                    <li><a href="<?= $this->langURL("index") ?>"><?= $this->lang->header("index") ?: 'Anasayfa' ?></a></li>
                    <li><?= $baslik ?></li>
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



<div class="container style-one ptb-120">
    <div
        class="contact-card-wrap style-one d-flex flex-wrap align-items-center justify-content-center round-20">
        <div class="contact-card style-one d-flex flex-wrap align-items-center mb-30">
            <div
                class="contact-icon d-flex flex-column align-items-center justify-content-center rounded-circle bg_secondary">
                <img src="<?= $assetURL ?>img/icons/pin-large-white.svg" alt="Icon">
            </div>
            <div class="contact-info">
                <h3 class="fs-22 fw-normal">Fabrika</h3>
                <p>
                    <?= $this->ayarlar("adres_merkez") ?>
                </p>
                <p><a href="#" class="text-para link-hover-primary transition d-block"><?= $this->ayarlar("email_merkez") ?></a>
                </p>
                <p><a href="#" class="text-para link-hover-primary transition d-block"><?= $this->ayarlar("telefon_merkez") ?></a>      
                </p>
            </div>
        </div>
        <div class="contact-card style-one d-flex flex-wrap align-items-center mb-30">
            <div
                class="contact-icon d-flex flex-column align-items-center justify-content-center rounded-circle bg_secondary">
                <img src="<?= $assetURL ?>img/icons/pin-large-white.svg" alt="Icon">
            </div>
            <div class="contact-info">
                <h3 class="fs-22 fw-normal">Kültü Şube</h3>
                <p>N. Fazıl Mah. A. Türkeş Bul. İkizkent Sitesi, D:A Blok No:8, 46050 Onikişubat /
                    Kahramanmaraş Türkiye</p>
                <p><a href="#" class="text-para link-hover-primary transition d-block">info@karpedo.com</a>
                </p>
                <p><a href="#" class="text-para link-hover-primary transition d-block"><?= $this->ayarlar("telefon_kultu") ?></a></p>
            </div>
        </div>
    </div>
    <div class="pt-120">
        <h6 class="section-subtitle fs-20 fw-light text_primary text-center mb-8">Karpedo Dondurma</h6>
        <h2 class="section-title style-one fw-normal text-title text-center mb-45">Bizimle İletişime Geçin
        </h2>
        <div class="row">
            <div class="col-lg-6 mb-30">
                <?php Form::Open(array(
                    "class" => "iletisim-form comment-form-wrap style-one round-20",
                    "id" => "cmt-form",
                    "method" => "post",
                    "action" => $this->baseURL("ajax/iletisimForm", "tr", 1),
                    "token" => true,
                    "message" => array(
                        ["no" => 1, "title" => $this->lang->iletisim("formsucces"), "status" => "success"],
                        ["no" => 2, "title" => $this->lang->iletisim("formerror"), "status" => "error"],
                        ["no" => 3, "title" => $this->lang->iletisim("formvalid"), "status" => "warning"],
                    ),
                    "lang" => $lang
                )); ?>
                <div class="row gx-xl-3">
                    <div class="col-md-6">
                        <div class="form-group position-relative mb-25">
                            <input type="text" name="adi"
                                class="w-100 ht-60 bg-ash text-para border-0 outline-0 round-10"
                                placeholder="İsminiz" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-25">
                            <input type="email" name="email"
                                class="w-100 ht-60 bg-ash text-para border-0 outline-0 round-10"
                                placeholder="E-posta Adresiniz" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group position-relative mb-25">
                            <input type="number" name="tel"
                                class="w-100 ht-60 bg-ash text-para border-0 outline-0 round-10"
                                placeholder="Telefon Numaranız" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-25">
                            <textarea name="mesaj" id="messages" cols="30" rows="10"
                                placeholder="Mesajınız"
                                class="w-100 ht-206 bg-ash text-para border-0 outline-0 round-10 resize-0"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="captcha">
                            <img class="captcha_image" src="<?= $this->baseURL("ajax/getcaptchaimage", "tr", 1) ?>">
                            <input type="text" minlength="6" class="w-100 ht-60 bg-ash text-para border-0 outline-0 round-10" name="captcha_value" maxlength="6" required>
                        </div>
                        <small>* kodu değiştirmek için resmin üzerine tıklayın</small>

                    </div>
                    <div class="col-12">
                        <div class="col-xl-5 col-md-6">
                            <button type="submit" 
                                class="btn style-two position-relative z-1 round-10">Gönder</button>
                        </div>
                    </div>
                </div>
                <?php Form::Close(); ?>
            </div>
            <div class="col-lg-6 mb-30" id="mapFrame">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1581.4501085907862!2d36.93594067346228!3d37.55741462636354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152dddda1030dabd%3A0x3958f3d4f9edaa42!2sKarpedo%20Dondurma!5e0!3m2!1str!2str!4v1767793500289!5m2!1str!2str"></iframe>
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
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/1.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/2.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/3.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/4.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/5.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/6.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/7.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/8.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/9.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/10.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/11.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/12.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/13.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
        <div class="swiper-slide">
            <a href="https://www.instagram.com/karpedo.kurumsal" target="_blank"
                class="insta-card style-two position-relative round-20">
                <img src="<?= $assetURL ?>img/instagram/14.jpg" alt="Image" class="round-20">
                <span
                    class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                        class="ri-instagram-line"></i></span>
            </a>
        </div>
    </div>
</div>