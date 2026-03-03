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
<main>
    <section class="page-hero-ss" style="padding-top: 100px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-content text-center">
                        <h3 class="page-title"><a href="<?= $this->BaseURL($this->lang->link("blog"), $lang, 1); ?>"><i class="fa-regular fa-arrow-left"></i><?= $this->lang->genel("diger_bloglar") ?></a><br><?= $baslik ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-details-ss pb-80">
        <div class="container">

            <div class="blog-details-wrapper">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-9">

                        <div class="blog-post-main mb-70">
                            <div class="blog-post-item">
                                <div class="post-thumbnail" style="display:flex; justify-content: center ;">
                                    <img src="<?= $resim ?>" alt="<?= $baslik ?>">
                                </div>
                                <div class="content-detail">
                                    <?= $detay ?>

                                </div>
                            </div>
                            <div class="entry-footer">
                                <div class="social-share">
                                    <span><?= $this->lang->genel("paylas") ?></span>
                                    <a target="_blank"
                                        href="https://twitter.com/intent/tweet?text=<?= urlencode($this->lang->genel('makale_onerisi')) ?>&url="
                                        onclick="this.href+= encodeURIComponent(window.location.href)"><i
                                            class="fa-brands fa-x-twitter"></i></a>
                                    <a target="_blank"
                                        href="https://www.linkedin.com/sharing/share-offsite/?url="
                                        onclick="this.href+= encodeURIComponent(window.location.href)"><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u="
                                        onclick="this.href+= encodeURIComponent(window.location.href)"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send?text=<?= urlencode($this->lang->genel('makale_onerisi') . ': ') ?>"
                                        onclick="this.href+= encodeURIComponent(window.location.href)"><i
                                            class="fa-brands fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
</main>