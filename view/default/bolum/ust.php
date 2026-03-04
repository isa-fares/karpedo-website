<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */


?>
<!-- Page Header-->
<div class="cursor"><span class="cursor-text"></span></div>
<div class="cursor-inner"></div>

<div id="smooth-wrapper">
    <div id="smooth-content">


        <div class="navbar-top style-one bg-title">
            <div class="container style-one">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-4 text-lg-start text-center mb-lg-0 mb-2">
                        <p class="position-relative text-white d-inline-block text-lg-start text-center fs-15 mb-0">
                            <img src="<?= $assetURL ?>img/icons/phone-small.svg" alt="Icon">+90 (344) 236 06 37
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
                    <a href="<?= $this->BaseURL("anasayfa", $lang, 1) ?>" class="mobilelogo">
                        <img src="<?= $assetURL ?>img/karpedo_logo.png" />
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
                                <li><a class="active" href="<?= $this->BaseURL("anasayfa", $lang, 1) ?>">Anasayfa</a></li>
                                <li><a href="<?= $this->BaseURL("hakkimizda", $lang, 1) ?>">Hakkımızda</a></li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0)">Ürünler<i class="ri-add-line"></i></a>
                                    <ul class="menu-subs menu-column-1">
                                        <li><a href="<?= $this->BaseURL("urunler", $lang, 1) ?>#tabs-urunler-1">Kesme Dondurma</a></li>
                                        <li><a href="<?= $this->BaseURL("urunler", $lang, 1) ?>#tabs-urunler-1">Karışık Dondurma</a></li>
                                        <li><a href="<?= $this->BaseURL("urunler", $lang, 1) ?>#tabs-urunler-1">Çikolatalı Dondurma</a></li>
                                        <li><a href="<?= $this->BaseURL("urunler", $lang, 1) ?>#tabs-urunler-1">Bademli Dondurma</a></li>
                                    </ul>
                                </li>
                                <li class="nvb_li">
                                    <a href="<?= $this->BaseURL("index", $lang, 1) ?>" class="navbar-brand">
                                        <img src="<?= $assetURL ?>img/karpedo_logo.png" alt="Logo" class="logo-light">
                                        <img src="<?= $assetURL ?>img/logo_dark.png" alt="Logo" class="logo-dark">
                                    </a>
                                </li>
                                <li><a href="<?= $this->BaseURL("e-katalog", $lang, 1) ?>">E-Katalog</a></li>
                                <li><a href="<?= $this->BaseURL("blog", $lang, 1) ?>">Blog</a></li>
                                <li><a href="<?= $this->BaseURL("iletisim", $lang, 1) ?>">İletişim</a></li>
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
                                            <a href="<?= $this->BaseURL("iletisim", $lang, 1) ?>"
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