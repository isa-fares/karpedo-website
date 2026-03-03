<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 * @var $katurl string
 */
// ---   Page Settings  ---
$table = "sayfa";

$sayfa = "kurumsal";

$type = Request::GETURL("type", null);
if ($type == "subpage") {
    $table = "alt_sayfa";
}
// Kurumsal Sayfalarını alır
$this->langZorunluSayfa($id, $table, $sayfa, "aktif = 1 and kid = 1 and baslik <> ''");

// Kurumsal Sayfalarını alır
$veri = $this->dbLangSelectRow($table, array("id" => $id, "master_id" => $id), "resim");
$getID = $this->getID($veri);

// Sayfa Bilgilerini alır
$KurumsalSayfalar = $this->getKategoriSayfalari("Kurumsal");

$baslik = $this->temizle($veri["baslik"]);
$detay = $this->temizle($veri["detay"]);
$this->sayfaBaslik = $this->temizle($veri["baslik"]) . " - " . $this->ayarlar("title_" . $lang);

$boyut = $this->getimageinfo("sayfa", "", "big");
$ek_boyut = $this->getimageinfo("sayfa", "", "ek");
$resim = $this->dbResimAl($veri["resim"], "sayfa", $boyut);
$sidebar = $this->dbLangSelect("sayfa", "aktif = 1  and baslik <> '' and kid = 1");
//$resimler = $this->sorgu("SELECT *, baslik as baslik_tr FROM dosyalar WHERE type = 'sayfa' and tur = 'resim' and aktif = 1 and data_id = $getID and sil <> 1 ORDER BY sira ASC");
$baslik_2 = $this->temizle($veri["baslik_2"]);

// Get images based on current language
$lang_safe = $this->kirlet($lang);
$belge_resimler = $this->sorgu(
    "SELECT * FROM dosyalar 
     WHERE type = 'sayfa' AND data_id = $getID 
     AND tur = 'resim' AND sil <> 1 AND aktif = 1
     ORDER BY sira ASC, id ASC"
);

$this->ogBaslik = $this->sayfaBaslik;
$this->ogUrl = $this->fullUrl;
?>
<style>
    <?php if ($getID == 4): ?>.corporate.content-detail img {
        width: auto;
    }

    <?php else: ?>.corporate.content-detail img {
        width: 100%;
    }

    <?php endif; ?>
</style>
<!-- Breadcrumbs -->
<section class="bg-gray-7">
    <div class="breadcrumbs-custom box-transform-wrap context-dark">
        <div class="container">
            <h3 class="breadcrumbs-custom-title">Hakkımızda</h3>
            <div class="breadcrumbs-custom-decor"></div>
        </div>
        <div class="box-transform" style="background-image: url(images/bg-1.jpg);"></div>
    </div>
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Ana Sayfa</a></li>
            <li class="active">Hakkımızda</li>
        </ul>
    </div>
</section>
<section class="section section-lg bg-default">
    <div class="container">
        <div class="tabs-custom row row-50 justify-content-center flex-lg-row-reverse text-center text-md-left" id="tabs-4">
            <div class="col-lg-4 col-xl-3">
                <h5 class="text-spacing-200 text-capitalize">10+ yıllık tecrübe</h5>
                <ul class="nav list-category list-category-down-md-inline-block">
                    <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay="0s"><a class="active" href="#tabs-4-1" data-toggle="tab">Hakkımızda</a></li>
                    <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay=".1s"><a href="#tabs-4-2" data-toggle="tab">Misyonumuz</a></li>
                    <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay=".2s"><a href="#tabs-4-3" data-toggle="tab">Hedeflerimiz</a></li>
                    <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay=".3s"><a href="#tabs-4-4" data-toggle="tab">Değerlerimiz</a></li>
                </ul><a class="button button-xl button-primary button-winona" href="contacts.html">İletişime geçin</a>
            </div>
            <div class="col-lg-8 col-xl-9">
                <!-- Tab panes-->
                <div class="tab-content tab-content-1">
                    <div class="tab-pane fade show active" id="tabs-4-1">
                        <h4>Hakkımızda birkaç söz</h4>
                        <p>PizzaHouse olarak yıllardır en taze malzemelerle, geleneksel ve yenilikçi tariflerle müşterilerimize hizmet veriyoruz. Kalite ve lezzet önceliğimizdir. Şehir merkezindeki mekânımızda sıcak bir ortamda, aileniz ve arkadaşlarınızla keyifli vakit geçirmenizi hedefliyoruz.</p>
                        <p>Misyonumuz, her lokmada evde hissettiren lezzet sunmak ve müşteri memnuniyetini en üst düzeyde tutmaktır. Uzman ekibimiz ve hijyenik mutfağımızla güvenilir, lezzetli ve uygun fiyatlı menümüzle hizmetinizdeyiz.</p><img src="images/about-1-835x418.jpg" alt="" width="835" height="418" />
                    </div>
                    <div class="tab-pane fade" id="tabs-4-2">
                        <h4>En İyi Pizzayı Sunmak</h4>
                        <p>Kaliteli hamur, taze soslar ve seçkin malzemelerle hazırladığımız pizzalarımız, hem geleneksel hem de özel tariflerimizle fark yaratıyor. Her tabakta tutarlı lezzet ve hijyen standartlarımızla güven veriyoruz.</p>
                        <p>Müşterilerimizin beklentilerini aşmak için sürekli kendimizi geliştiriyoruz. Yerel ve uluslararası tarifleri harmanlayarak her damak zevkine hitap eden bir menü sunuyoruz.</p><img src="images/about-1-835x418.jpg" alt="" width="835" height="418" />
                    </div>
                    <div class="tab-pane fade" id="tabs-4-3">
                        <h4>Üstün Müşteri Hizmeti</h4>
                        <p>Müşteri memnuniyeti bizim için her şeyden önce gelir. Siparişinizden masanıza kadar hızlı, nazik ve titiz bir hizmet sunuyoruz. Özel günleriniz ve toplu siparişleriniz için de özel çözümler üretiyoruz.</p>
                        <p>Personelimiz düzenli eğitimlerle güncel kalıyor; temizlik ve hijyen kurallarına sıkı sıkıya uyuyoruz. Restoranımızda rahat ve güvenli bir ortamda yemek yemenizi sağlamak en büyük önceliğimizdir.</p><img src="images/about-1-835x418.jpg" alt="" width="835" height="418" />
                    </div>
                    <div class="tab-pane fade" id="tabs-4-4">
                        <h4>Dürüstlük ve Özveri</h4>
                        <p>İşimizi dürüstlük ve özveriyle yapıyoruz. Malzeme seçiminden servise kadar her aşamada şeffaf ve güvenilir olmayı ilke ediniyoruz.</p>
                        <p>Ekibimiz, PizzaHouse değerlerine bağlı olarak çalışıyor; kaliteden ödün vermeden, müşterilerimize en iyi deneyimi sunmak için var gücümüzle çalışıyoruz.</p><img src="images/about-1-835x418.jpg" alt="" width="835" height="418" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Icon Classic-->
<section class="section section-lg bg-gray-100">
    <div class="container">
        <div class="row row-md row-50">
            <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay="0s">
                <article class="box-icon-classic">
                    <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                        <div class="unit-left">
                            <div class="box-icon-classic-icon linearicons-helicopter"></div>
                        </div>
                        <div class="unit-body">
                            <h5 class="box-icon-classic-title"><a href="#">Ücretsiz Teslimat</a></h5>
                            <p class="box-icon-classic-text">Belirli tutar üzeri siparişlerde ücretsiz teslimat hizmeti sunuyoruz.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay=".1s">
                <article class="box-icon-classic">
                    <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                        <div class="unit-left">
                            <div class="box-icon-classic-icon linearicons-pizza"></div>
                        </div>
                        <div class="unit-body">
                            <h5 class="box-icon-classic-title"><a href="#">20+ Pizza Seçeneği</a></h5>
                            <p class="box-icon-classic-text">Klasik ve özel tariflerimizle geniş pizza menümüzden dilediğinizi seçebilirsiniz.</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-xl-4 wow fadeInUp" data-wow-delay=".2s">
                <article class="box-icon-classic">
                    <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
                        <div class="unit-left">
                            <div class="box-icon-classic-icon linearicons-leaf"></div>
                        </div>
                        <div class="unit-body">
                            <h5 class="box-icon-classic-title"><a href="#">Taze Malzemeler</a></h5>
                            <p class="box-icon-classic-text">Tüm yemeklerimizde günlük taze ve kaliteli malzemeler kullanıyoruz.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Our Team-->
<section class="section section-lg section-bottom-md-70 bg-default">
    <div class="container">
        <h3 class="oh"><span class="d-inline-block wow slideInUp" data-wow-delay="0s">Ekibimiz</span></h3>
        <div class="row row-lg row-40 justify-content-center">
            <div class="col-sm-6 col-lg-3 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration="1s">
                <!-- Team Modern-->
                <article class="team-modern"><a class="team-modern-figure" href="#"><img src="images/team-01-270x236.jpg" alt="" width="270" height="236" /></a>
                    <div class="team-modern-caption">
                        <h6 class="team-modern-name"><a href="#">Richard Peterson</a></h6>
                        <div class="team-modern-status">Baş Aşçı</div>
                        <ul class="list-inline team-modern-social-list">
                            <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                            <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                            <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                            <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-lg-3 wow fadeInLeft" data-wow-delay="0s" data-wow-duration="1s">
                <!-- Team Modern-->
                <article class="team-modern"><a class="team-modern-figure" href="#"><img src="images/team-02-270x236.jpg" alt="" width="270" height="236" /></a>
                    <div class="team-modern-caption">
                        <h6 class="team-modern-name"><a href="#">Amelia Lee</a></h6>
                        <div class="team-modern-status">Müdür</div>
                        <ul class="list-inline team-modern-social-list">
                            <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                            <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                            <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                            <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-lg-3 wow fadeInRight" data-wow-delay=".1s" data-wow-duration="1s">
                <!-- Team Modern-->
                <article class="team-modern"><a class="team-modern-figure" href="#"><img src="images/team-03-270x236.jpg" alt="" width="270" height="236" /></a>
                    <div class="team-modern-caption">
                        <h6 class="team-modern-name"><a href="#">Sam Peterson</a></h6>
                        <div class="team-modern-status">Baş Fırıncı</div>
                        <ul class="list-inline team-modern-social-list">
                            <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                            <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                            <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                            <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="col-sm-6 col-lg-3 wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                <!-- Team Modern-->
                <article class="team-modern"><a class="team-modern-figure" href="#"><img src="images/team-04-270x236.jpg" alt="" width="270" height="236" /></a>
                    <div class="team-modern-caption">
                        <h6 class="team-modern-name"><a href="#">Jane Smith</a></h6>
                        <div class="team-modern-status">Pizza Şefi</div>
                        <ul class="list-inline team-modern-social-list">
                            <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                            <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                            <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                            <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>


<!-- Our clients-->
<section class="section section-lg bg-default text-md-left">
    <div class="container">
        <div class="row row-60 justify-content-center flex-lg-row-reverse">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="offset-left-xl-70">
                    <h3 class="heading-3">Müşterilerimiz Ne Diyor</h3>
                    <div class="slick-quote">
                        <!-- Slick Carousel-->
                        <div class="slick-slider carousel-parent" data-autoplay="true" data-swipe="true" data-items="1" data-child="#child-carousel-5" data-for="#child-carousel-5" data-slide-effect="true">
                            <div class="item">
                                <!-- Quote Modern-->
                                <article class="quote-modern">
                                    <h5 class="quote-modern-text"><span class="q">PizzaHouse’da hem lezzet hem hizmet çok iyi. Fiyatlar da makul, herkese tavsiye ederim.</span></h5>
                                    <h5 class="quote-modern-author">Stephen Adams,</h5>
                                    <p class="quote-modern-status">Düzenli Müşteri</p>
                                </article>
                            </div>
                            <div class="item">
                                <!-- Quote Modern-->
                                <article class="quote-modern">
                                    <h5 class="quote-modern-text"><span class="q">Pizzalar taze ve doyurucu. Personel ilgili ve ortam rahat. Ailece sık sık geliyoruz.</span></h5>
                                    <h5 class="quote-modern-author">Sam Peterson,</h5>
                                    <p class="quote-modern-status">Düzenli Müşteri</p>
                                </article>
                            </div>
                            <div class="item">
                                <!-- Quote Modern-->
                                <article class="quote-modern">
                                    <h5 class="quote-modern-text"><span class="q">Kalite ve fiyat dengesi çok iyi. Teslimat da hızlı, siparişler zamanında geliyor.</span></h5>
                                    <h5 class="quote-modern-author">Jane McMillan,</h5>
                                    <p class="quote-modern-status">Düzenli Müşteri</p>
                                </article>
                            </div>
                            <div class="item">
                                <!-- Quote Modern-->
                                <article class="quote-modern">
                                    <h5 class="quote-modern-text"><span class="q">Hem restoranda yemek hem paket sipariş veriyoruz. Her iki durumda da memnunuz.</span></h5>
                                    <h5 class="quote-modern-author">Will Jones,</h5>
                                    <p class="quote-modern-status">Düzenli Müşteri</p>
                                </article>
                            </div>
                        </div>
                        <div class="slick-slider child-carousel" id="child-carousel-5" data-arrows="true" data-for=".carousel-parent" data-items="4" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-slide-to-scroll="1">
                            <div class="item"><img class="img-circle" src="images/team-5-83x83.jpg" alt="" width="83" height="83" />
                            </div>
                            <div class="item"><img class="img-circle" src="images/team-6-83x83.jpg" alt="" width="83" height="83" />
                            </div>
                            <div class="item"><img class="img-circle" src="images/team-7-83x83.jpg" alt="" width="83" height="83" />
                            </div>
                            <div class="item"><img class="img-circle" src="images/team-8-83x83.jpg" alt="" width="83" height="83" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7"><img src="images/wp-say-669x447.jpg" alt="" width="669" height="447" />
            </div>
        </div>
    </div>
</section>