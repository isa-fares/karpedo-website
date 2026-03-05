<?php
/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 * @var $katurl string
 */

$table = "sayfa";
$sayfa = "kurumsal";
$type = Request::GETURL("type", null);
if ($type == "subpage"){
    $table = "alt_sayfa";
}

$this->langZorunluSayfa($id, $table, $sayfa, "aktif = 1 and kid = 1 and baslik <> ''");
$veri = $this->dbLangSelectRow($table,array("id"=>$id, "master_id"=>$id), "resim");
$getID = $this->getID($veri);
$baslik = $this->temizle($veri["baslik"]);
$this->sayfaBaslik = $this->temizle($veri["baslik"])." - ".$this->ayarlar("title_".$lang);
$boyut = $this->getimageinfo("sayfa", "", "big");
$ek_boyut = $this->getimageinfo("sayfa", "", "ek");
$resim = $this->dbResimAl($veri["resim"],"sayfa", $boyut);
$sidebar = $this->dbLangSelect("sayfa", "aktif = 1  and baslik <> '' and kid = 1");
//$resimler = $this->sorgu("SELECT *, baslik as baslik_tr FROM dosyalar WHERE type = 'sayfa' and tur = 'resim' and aktif = 1 and data_id = $getID and sil <> 1 ORDER BY sira ASC");

if (empty($type)){
    $alt_sayfalar = $this->dbLangSelect('alt_sayfa', 'aktif = 1 and kid = '.$id);
}


if (!empty($resim)){
    $this->ogResim = $resim;
}

$this->ogBaslik = $this->sayfaBaslik;
$this->ogUrl = $this->fullUrl;

?>


<!-- page-title -->
<div class="cmt-page-title-row">
    <div class="cmt-page-title-row-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title page-baslik"><?=$baslik?></h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Go to Shiftler." href="javascript:;" class="home">
                                    <i class="themifyicon ti-home"></i> &nbsp;Anasayfa</a>
                                </span>
                        <span class="cmt-bread-sep">&nbsp;--&nbsp;</span>
                        <span>
                                    <a title="Go to Shiftler." href="javascript:;" class="home">&nbsp;Kurumsal</a>
                                </span>
                        <span class="cmt-bread-sep">&nbsp;--&nbsp;</span>
                        <span><?=$baslik?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-title end -->

<!-- içerik start -->
<div class="main-site">
    <div class="sidebar cmt-sidebar-left cmt-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 content-area order-lg-2">
                    <article class="cmt-service-single-content-area">
                        <div class="cmt-service-featured-wrapper cmt-featured-wrapper mb-30">
                            <? if (is_array($resimler)):?>
                            <section class=" service-section  cmt-bgcolor-white clearfix">
                                <div class="row slick_slider alt-slider slick-arrows-style2" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":true,"dots":false, "autoplay":true, "infinite":true,
                                "responsive":
                                        [{"breakpoint":1100,"settings":{"slidesToShow": 3}} , {"breakpoint":992,"settings":{"slidesToShow": 2}},{"breakpoint":630,"settings":{"slidesToShow": 1}}]}'>
                                    <?
                                    foreach ($resimler as $res):
                                    $t = $this->dbResimAl($res["dosya"], "sayfa", "770x340", true);
                                    ?>
                                    <div class="col-12">
                                        <div class="cmt_single_image-wrapper">
                                            <img class="img-fluid" src="<?=$t?>" alt="<?=$this->temizle($res["baslik"])?>">
                                        </div>
                                    </div>
                                    <?endforeach;?>
                                </div>
                            </section>
                            <? endif;?>
                        </div>
                        <div class="cmt-service-title  mb-30">
                            <h3><?=$baslik?></h3>
                            <?=$this->detay($veri)?>
                        </div>
                    </article>
                         <?if ($id == 4):?>
                        <section class="cmt-row bottom-zero-padding-section clearfix" style="padding: 0 0 0;">
                            <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="featured-imagebox featured-imagebox-post style2 box-shadow align-items-center">
                                                    <div class="featured-thumbnail haber-resim">
                                                        <img class="img-fluid" src="<?=$assetURL?>images/yonetim/ykb1.jpg" alt="">
                                                    </div>
                                                    <div class="featured-content text-left" style="padding: 12px 15px 8px;">
                                                        <div class="post-title featured-title">
                                                            <h3 style="text-align: center; margin-bottom: 0px;"><a href="javascript:;">Yönetim Kurulu Başkanı</a></h3>
                                                            <p style="margin-bottom: 0px; text-align: center;"><span>Ali Bayram SARICA</span></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="featured-imagebox featured-imagebox-post style2 box-shadow align-items-center">
                                            <div class="featured-thumbnail haber-resim">
                                                <img class="img-fluid" src="<?=$assetURL?>images/yonetim/ykb2.jpg" alt="">
                                            </div>
                                            <div class="featured-content text-left" style="padding: 12px 15px 8px;">
                                                <div class="post-title featured-title">
                                                    <h3 style="text-align: center; margin-bottom: 0px;"><a href="javascript:;">Yönetim Kurulu Üyesi</a></h3>
                                                    <p style="margin-bottom: 0px; text-align: center;"><span>Ruşen Ali  SARICA</span></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="featured-imagebox featured-imagebox-post style2 box-shadow align-items-center">
                                            <div class="featured-thumbnail haber-resim">
                                                <img class="img-fluid" src="<?=$assetURL?>images/yonetim/ykb3.jpg" alt="">
                                            </div>
                                            <div class="featured-content text-left" style="padding: 12px 15px 8px;">
                                                <div class="post-title featured-title">
                                                    <h3 style="text-align: center; margin-bottom: 0px;"><a href="javascript:;">Yönetim Kurulu Üyesi</a></h3>
                                                    <p style="margin-bottom: 0px; text-align: center;"><span>Deniz SARICA</span></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="featured-imagebox featured-imagebox-post style2 box-shadow align-items-center">
                                            <div class="featured-thumbnail haber-resim">
                                                <img class="img-fluid" src="<?=$assetURL?>images/yonetim/ykb4.jpg" alt="">
                                            </div>
                                            <div class="featured-content text-left" style="padding: 12px 15px 8px;">
                                                <div class="post-title featured-title">
                                                    <h3 style="text-align: center; margin-bottom: 0px;"><a href="javascript:;">Yönetim Kurulu Üyesi</a></h3>
                                                    <p style="margin-bottom: 0px; text-align: center;"><span>Alican  SARICA</span></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="featured-imagebox featured-imagebox-post style2 box-shadow align-items-center">
                                            <div class="featured-thumbnail haber-resim">
                                                <img class="img-fluid" src="<?=$assetURL?>images/yonetim/ykb5.jpg" alt="">
                                            </div>
                                            <div class="featured-content text-left" style="padding: 12px 15px 8px;">
                                                <div class="post-title featured-title">
                                                    <h3 style="text-align: center; margin-bottom: 0px;"><a href="javascript:;">Yönetim Kurulu Üyesi</a></h3>
                                                    <p style="margin-bottom: 0px; text-align: center;"><span>Ergün SARICA</span></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="featured-imagebox featured-imagebox-post style2 box-shadow align-items-center">
                                            <div class="featured-thumbnail haber-resim">
                                                <img class="img-fluid" src="<?=$assetURL?>images/yonetim/ykb6.jpg" alt="">
                                            </div>
                                            <div class="featured-content text-left" style="padding: 12px 15px 8px;">
                                                <div class="post-title featured-title">
                                                    <h3 style="text-align: center; margin-bottom: 0px;"><a href="javascript:;">Yönetim Kurulu Üyesi</a></h3>
                                                    <p style="margin-bottom: 0px; text-align: center;"><span>İbrahim SARICA</span></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?endif;?>
                </div>
                <div class="col-lg-4 widget-area sidebar-left">
                    <?php
                    $this->sidebar(array(
                        "sql" => $sidebar,
                        'table'=>"sayfa",
                        "id" => $id,
                        "page" => $sayfa,
                        "lang" => $lang,
                        "katurl"=>$katurl,
                    ));
                    ?>
                  <?php
                    $this->files(array(
                        "type" => $table,
                        'data_id' => $id,
                    ));
                     ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- İçerik End -->
