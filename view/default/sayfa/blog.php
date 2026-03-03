<?php

/**
 * Blog List Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$sayfa = $this->lang->genel("blog_baslik");
$baslik = $this->lang->genel("blog_baslik");
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang);

// ============================================
// DATA PREPARATION
// ============================================

// Get all blog posts (without limit for pagination)
// ============================================
// DATA PREPARATION
// ============================================

// Get all blog posts (single query)
$all_blogs = $this->dbLangSelect(
    "blog",
    "aktif = 1 AND sil = 0 AND baslik <> ''",
    "resim",
    "",
    "ORDER BY sira DESC, id DESC"
);

// Pagination setup
$sayfaLimit = 6;
list($gecerli, $sayfaLimit, $toplamSayfa, $sayfa, $showlist) = $this->sayfalama($all_blogs, $sayfaLimit);

// Get paginated blogs from the already fetched data (no second query!)
$blogs = array_slice($all_blogs, $gecerli, $sayfaLimit);


// ============================================
// PAGE META DATA
// ============================================


// ============================================
// URL CONSTANTS
// ============================================
$urls = [
    'index' => $this->BaseURL($this->lang->link('index'), $lang, 1),
    'blog' => $this->BaseURL($this->lang->link('blog'), $lang, 1),
];
?>
