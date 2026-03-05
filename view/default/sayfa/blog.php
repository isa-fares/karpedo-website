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
//  
// ============================================
$sayfa = "blog";
$baslik = "Blog";
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
    $instagram_url = $this->ayarlar("ins") ?: "https://www.instagram.com/karpedo.kurumsal";
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
                             <img src="<?= $assetURL ?>img/breadcrumb/br-img-7.png" alt="Image" class="d-block mx-auto">
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
                             <img src="<?= $assetURL ?>img/breadcrumb/br-img-2.png" alt="Image" class="d-block mx-auto">
                         </div>
                     </div>
                 </div>
             </div>
         </div>



         <div class="container style-one ptb-120">
             <div class="row justify-content-center">
                <?php foreach($blogs as $blog):
                    $blog_image = $this->dbResimAl($blog["resim"], "blog", "480x320");
                    $blog_title = $blog["baslik"];
                    $blog_date = date("d", strtotime($blog["tarih"]));
                    $blog_month = date("M", strtotime($blog["tarih"]));
                    $blog_year = date("Y", strtotime($blog["tarih"]));
                    $blog_url = $this->getURL($blog, "blog_detay");
                    ?>
                 <div class="col-xl-4 col-md-6">
                     <div class="blog-card style-two img-hover-zoom round-20 mb-30">
                         <div class="br-hover position-absolute"></div>
                         <div class="blog-img position-relative img-zoom overflow-hidden round-15">
                             <a href="<?= $blog_url ?>">
                                 <img src="<?= $blog_image ?>" alt="Image"
                                     class="position-absolute top-0 start-0 w-100 h-100 round-15 transition">
                                 <img src="<?= $blog_image ?>" alt="Image" class="round-15 transition">
                             </a>
                             <a href="<?= $blog_url ?>"
                                 class="blog-date fs-14 position-absolute d-flex flex-column align-items-center justify-content-center bg-white round-10 text-para transition">
                                 <span class="fs-20 fw-semibold text-title d-block"><?= $blog_date ?></span>
                                 <?= $blog_month ?>
                             </a>
                         </div>
                         <div class="blog-info">
                             <h3 class="fs-24"><a href="<?= $blog_url ?>"
                                     class="text-title link-hover-secondary transition"><?= $blog_title ?></a></h3>
                                 <a href="<?= $blog_url ?>" class="btn style-five position-relative z-1 round-10">Devamını
                                     Oku</a>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>
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
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/2.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/3.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/4.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/5.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/6.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/7.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/8.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/9.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/10.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/11.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/12.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/13.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
                 <div class="swiper-slide">
                     <a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"
                         class="insta-card style-two position-relative round-20">
                         <img src="<?= $assetURL ?>img/instagram/14.jpg" alt="Image" class="round-20">
                         <span
                             class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                                 class="ri-instagram-line"></i></span>
                     </a>
                 </div>
             </div>
         </div>