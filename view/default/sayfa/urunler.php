<?
//  هنا  بدنا بنجيب المنتجات بناء على التصنيف الذي يضغطه المستخدم
$urunler = $this->dbLangSelect("urun", "aktif = 1 AND sil = 0 AND baslik <> '' AND kid = $id", "resim", "", "ORDER BY sira DESC, id DESC");
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
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-2.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
            <div class="col-xxl-4 col-lg-6 col-md-8 mb-sm-10">
                <h2 class="br-title fw-normal mb-12">Ürünler</h2>
                <ul class="br-menu list-unstyled mb-0">
                    <li><a href="index.html">Anasayfa</a></li>
                    <li>Ürünler</li>
                </ul>
            </div>
            <div class="col-xxl-4 col-lg-3 col-md-2">
                <div class="br-img">
                    <img src="<?= $assetURL ?>img/breadcrumb/br-img-8.png" alt="Image" class="d-block mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container style-one pt-120 pb-90">
    <div class="row justify-content-center" style="row-gap: 30px;">
        <? if ($urunler) : ?>
            <?php foreach ($urunler as $urun) :

                $urun_image = $this->dbResimAl($urun["resim"], "urun", "400x336");
                $urun_baslik = $urun["baslik"];
                $urun_url = $this->BaseURL("urun_detay") . "/" . $urun["url"] . ".html";
            ?>

                <div class="col-xxl-3 col-xl-4 col-md-6">
                    <div
                        class="product-card br-hover-one style-one text-center position-relative z-1 round-20 mb-30  transition">
                        <div
                            class="product-img d-flex flex-column align-items-center justify-content-center mx-auto">
                            <a href="<?= $urun_url ?>">
                                <img src="<?= $urun_image ?>"
                                    alt="Ürün görseli" class="d-block mx-auto">
                            </a>
                        </div>
                        <h3 class="fs-24"><a href="<?= $urun_url ?>" class="text-title link-hover-primary"><?= $urun_baslik ?></a></h3>
                        <a href="<?= $urun_url ?>" class="btn style-four position-relative z-1 round-10">Ürünü
                            İncele</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <? else : ?>
            <div class="col-12">
                <div class="alert text-center text-white" style="background-color:#111828 ">
                    <h4 class="mb-0">Bu sayfanın içeriği güncellenmektedir.</h4>
                    <h4 class="mb-0">Lütfen daha sonra tekrar kontrol ediniz.</h4>
                </div>
            </div>
        <? endif; ?>
    </div>
</div>