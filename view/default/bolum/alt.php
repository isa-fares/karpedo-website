<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */ ?>
<?php
$kategori = $this->dbLangSelect("kategori", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira ASC, sira ASC");
$urunler = $this->dbLangSelect("urun", "aktif = 1 AND sil = 0 AND baslik <> ''", "resim", "", "ORDER BY sira ASC, sira ASC");
$katalog = $this->dbLangSelectRow("katalog", array("id" => 1, "master_id" => 1));
?>


<footer class="footer-area style-two position-relative z-1">
    <div class="footer-top bg-f position-relative z-1 pt-120">
        <div class="container style-one pb-90">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-5 pe-xxl-5 mb-lg-20">
                    <h2 class="section-title style-one me-xxl-4 mb-0">Doğanın kalbinden, ustalığın
                        zirvesine: Gerçek Maraş lezzeti</h2>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="newsletter-form style-one position-relative">
                        <div id="typewritter" class="w-100 bg-white border-0 round-10 text-para outline-0">
                        </div>
                        <a href="<?= $this->baseURL('e-katalog.html') . '/' . $katalog[$mid . 'id'] ?>" class="btn style-three z-1 round-10">E-Kataloğu İncele</a>

                    </div>
                </div>
            </div>
            <div class="row pt-120">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 pe-xxl-1">
                    <div class="footer-widget mb-30">
                        <a href="index.html" class="logo d-block mb-40">
                            <img src="<?= $assetURL ?>img/karpedo_logo.png" alt="Logo" class="logo-light">
                            <img src="<?= $assetURL ?>img/logo_dark.png" alt="Logo" class="logo-dark">
                        </a>
                        <ul class="social-profile style-five list-unstyled mb-0">
                            <?= $this->getSocialList() ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-2 col-lg-2 col-6 ps-xxl-5">
                    <div class="footer-widget mb-30 ps-xxl-5">
                        <h3 class="footer-widget-title fs-24 fw-normal text-title position-relative">
                            Kolay Bağlantı</h3>
                        <ul class="footer-menu list-unstyled mb-0">
                            <li><a href="<?= $this->BaseURL("index", $lang, 1) ?>" class="link style-two">Anasayfa</a></li>
                            <li><a href="<?= $this->BaseURL("hakkimizda", $lang, 1) ?>" class="link style-two">Hakkımızda</a></li>
                            <!-- <li><a href="#" class="link style-two">Sertifikalarımız</a></li> -->
                            <li><a href="<?= $this->BaseURL("blog", $lang, 1) ?>" class="link style-two">Blog</a>
                            </li>
                            <li><a href="<?= $this->BaseURL("iletisim", $lang, 1) ?>" class="link style-two">İletişim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-6 ps-xxl-60">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title fs-24 fw-normal text-title position-relative">Ürünler
                        </h3>
                        <ul class="footer-menu list-unstyled mb-0">
                            <? foreach ($kategori as $kat) :
                                $baslik = $kat["baslik"];
                                $url = $kat["url"];
                                $url = $this->getURL($kat, "urunler");
                            ?>
                                <li><a href="<?= $url ?>" class="link style-two"><?= $this->temizle($baslik) ?></a></li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 ps-xxl-5">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title fs-24 fw-normal text-title position-relative">
                            İletişim</h3>
                        <ul class="contact-info list-unstyled mb-0">
                            <li class="position-relative">
                                <img src="<?= $assetURL ?>img/icons/pin-small.svg" alt="Icon">
                                <h6 class="font-primary fw-bold fs-18 text-title mb-6">Adres</h6>
                                <p class="text-title mb-0">
                                    <?= $this->ayarlar("adres_merkez") ?>
                                </p>
                            </li>
                            <li class="position-relative">
                                <img src="<?= $assetURL ?>img/icons/mail-small.svg" alt="Icon">
                                <h6 class="font-primary fw-bold fs-18 text-title mb-6">E-posta</h6>
                                <a href="<?= $this->linkEmail() ?>" class="link style-two fw-normal"><?= $this->ayarlar("email_merkez") ?></a>
                            </li>
                            <li class="position-relative">
                                <img src="<?= $assetURL ?>img/icons/phone-small.svg" alt="Icon">
                                <h6 class="font-primary fw-bold fs-18 text-title mb-6">Telefon</h6>
                                <a href="<?= $this->linkTelefon() ?>" class="link style-two fw-normal">
                                    <?= $this->ayarlar("telefon_merkez") ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom position-relative bg-title z-1">
        <div class="container style-one">
            <div class="row">
                <div class="col-md-7">
                    <p class="copyright-text text-white text-md-start text-center mb-0"><i
                            class="ri-copyright-line"></i>
                        <script>
                            document.write(/\d{4}/.exec(Date())[0])
                        </script> <span
                            class="text-white fw-medium">Karpedo</span>
                        Tüm Hakları Saklıdır
                    </p>
                </div>
                <div class="col-md-5 koolay_signature">
                    <a href="https://www.vemedya.com/" target="_blank">
                        <img src="<?= $assetURL ?>img/vemedya.svg" alt="Vemedya">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>


</div>
</div>