<?php
/**
 * Instagram galeri slider bölümü (rule 12: dosyalar, type = galeri)
 * @var array|null $foto_galeri verilmezse bileşen içinde çekilir
 */
if (!isset($foto_galeri) || !is_array($foto_galeri)) {
    $foto_galeri = $this->dbLangSelect("dosyalar", "aktif = 1 AND sil = 0 AND type = 'galeri'", "resim", "", "ORDER BY sira asc, id asc");
}
?>
<!-- ================================================ -->
<!-- Instagram Slider -->
<!-- ================================================ -->
<div class="insta-slider-three swiper pb-120">
    <div class="swiper-wrapper">
        <?php foreach ($foto_galeri as $foto):
            $foto_url = $this->dbResimAl($foto["dosya"], "galeri", "1350x1688");
        ?>
            <div class="swiper-slide">
                <a href="<?= $this->ayarlar("ins") ?>" target="_blank"
                    class="insta-card style-two position-relative round-20">
                    <img src="<?= $foto_url ?>" alt="Image" class="round-20">
                    <span
                        class="bg_primary d-flex flex-column align-items-center justify-content-center rounded-circle position-absolute transition"><i
                            class="ri-instagram-line"></i></span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
