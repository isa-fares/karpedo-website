<?php

/**
 * Breadcrumb bölümü – tasarım blog_detay ile uyumlu
 * $param: [ ["title" => "...", "href" => "..."], ... ] — son eleman mevcut sayfa (href yok)
 * @var array $param
 * @var string $lang
 * @var string|null $br_image sayfadan gelen sağ görsel URL (yoksa varsayılan)
 * @var string|null $br_class isteğe bağlı wrapper CSS sınıfı (sayfa özel stilleri)
 */
// BaseURL yerine theme URL sadece asset için (rule 8)
$assetURL = isset($assetURL) ? $assetURL : $this->themeURL;
$toplam = is_array($param) ? count($param) : 0;
$br_title = $toplam > 0 ? $param[$toplam - 1]["title"] : "";
$br_img_src = !empty($br_image) ? $br_image : ($assetURL . 'img/breadcrumb/br-img-2.png');
$br_extra_class = !empty($br_class) ? ' ' . $this->temizle($br_class) : '';
?>
<!-- ================================================ -->
<!-- Breadcrumb Area -->
<!-- ================================================ -->
<div class="breadcrumb-area position-relative z-1<?= $br_extra_class ?>">
    <img src="<?= $assetURL ?>img/breadcrumb/br-dot-shape.png" alt="Shape"
        class="br-bg-shape position-absolute top-0 start-0 w-100 h-100 z-n1">
    <img src="<?= $assetURL ?>img/top-zigzag-shape.svg" alt="Shape"
        class="br-top-shape position-absolute top-0 start-0 w-100 z-n1">
    <img src="<?= $assetURL ?>img/bottom-zigzag-shape.svg" alt="Shape"
        class="br-bottom-shape position-absolute bottom-0 start-0 w-100 z-n1">
    <div class="container style-one">
        <div class="row align-items-center justify-content-between">

            <div class="col-xxl-4 col-lg-6 col-md-8 mb-sm-10">
                <h2 class="br-title fw-normal mb-12"><?= $this->temizle($br_title) ?></h2>
                <ul class="br-menu list-unstyled mb-0">
                    <?php
                    if ($toplam > 0) {
                        $i = 0;
                        foreach ($param as $item) {
                            $i++;
                            $title = $item["title"] ?? "";
                            if ($i === $toplam) {
                                echo '<li>' . $this->cumleKisalt($title, 40) . '</li>';
                            } else {
                                $href = $item["href"] ?? "#";
                                echo '<li><a href="' . $this->temizle($href) . '">' . $this->temizle($title) . '</a></li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col-xxl-4 col-lg-3 col-md-2">
                <div class="br-img">
                    <img src="<?= $br_img_src ?>" alt="Image" class="d-block mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>