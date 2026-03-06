<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 */

// ============================================
// PAGE CONFIGURATION (tek dil - başlık yazıdan)
// ============================================
$sayfa = "blog_detay";

$table = "blog";
$veri = $this->dbLangSelectRow($table, array("id" => $id, "master_id" => $id), "ek_resim");
// ============================================
$baslik = $this->temizle($veri["baslik"]);
$blog_id = $this->getID($veri);
$detay = $this->temizle($veri["detay"]);
$resim = $this->dbResimAl($veri["ek_resim"], "blog", "1014x486");

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
// Breadcrumb: Anasayfa -> Blog -> Yazı başlığı
// ============================================
$br_param = [
    ["title" => $this->lang->header("index") ?: "Anasayfa", "href" => $this->langURL("index")],
    ["title" => "Blog", "href" => $this->langURL("blog")],
    ["title" => $baslik],

];
        $this->breadcrumb($br_param, $assetURL . 'img/breadcrumb/br-img-1.png');
        ?>




<!-- ================================================ -->
<!-- Blog Detay İçerik -->
<!-- ================================================ -->
<div class="container style-one ptb-120">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <div class="blog-desc">
                <div class="single-img round-20 mb-45">
                    <img src="<?= $resim ?>" alt="Image" class="round-20">
                </div>
                <div class="single-para">
                    <div class="content-detail">
                        <?= $detay ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->instaSlider(); ?>
</div>