<style>
    .section-banner {
        height: 60vh;
        max-height: 2421px;
        position: relative;
        opacity: 0%;
        transition: 0.5s;
    }

    .banner-on {
        opacity: 100% !important;
        transition: 0.5s;
    }

    .banner-header {
        transform: translateX(-200%);
        transition: 0.5s;
    }

    .banner-header-on {
        transform: translateX(0%);
        transition: 0.5s;
    }


    .banner-cover {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: #00000084;
        padding: 10px;
        padding-left: 50px;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
    }

    .banner-cover h1 {
        font-size: 4rem;
    }



    .banner-media {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #fff;
    }

    .banner-media img {
        width: 100%;
        height: 100%;
        object-fit: contain;

    }

    .banner-body {
        width: 100%;
        height: 100%;
        padding: 20px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: auto;
    }

    .social-image {
        overflow: hidden !important;
        background: transparent !important;
    }

    .social-image::after {
        height: 160%;
        width: 30px;
        content: "";
        background: rgba(255, 255, 255, 0.292);
        position: absolute;
        transform: rotate(45deg);
        top: -100px;
        left: -40px;
    }

    img {
        pointer-events: none;
    }

    .footer-section-1 img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }


    .section-product {
        max-width: 1500px;
        padding: 10px;
        background: var(--main-color);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        border-radius: 10px;
        padding-top: 20px;

    }

    .product {
        width: 270px;
        /*  height: 250px; */
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        background: rgb(255, 255, 255);
        border-radius: 5px;
        cursor: pointer;
        transition: .5s;
    }

    .product:hover {
        filter: drop-shadow(10px 10px rgb(66, 66, 66));
        transition: .5s;

    }

    .product-image {
        width: 100%;
        height: 240px;
        background: #343434;
        overflow: hidden;
        pointer-events: none;

    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
    }

    .product-label {
        width: 100%;
        height: 80px;
        font-family: 'Kanit', sans-serif;
        font-size: .9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background: var(--gray-200);
        color: #000;
    }

    .product-label p {
        margin-bottom: 0px;
    }

    .product-label>* {
        overflow: hidden !important;

    }

    .product-price {
        color: var(--main2-color);
    }

    .product-price {
        color: var(--main2-color);
    }

    .product-more-btn {
        border: 1px solid rgba(255, 255, 255, 0);
        color: rgba(255, 255, 255, 0.588);
    }

    .product-more-btn:hover {
        border: 1px solid rgb(255, 255, 255);
        color: white;

    }

    .container-section {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-direction: column;
        gap: 10px;
        padding-bottom: 40px;
    }

    .section-space {
        padding: 10px;
        background: var(--main-color);
        color: rgb(255, 255, 255);
        font-size: .8rem;
    }

    .space-item {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 20px;
    }

    .space-text {
        text-align: center;
    }

    .space-icon {
        font-size: 1.2rem;
    }

    .line {
        width: 30%;
        height: 3px;
        background: rgb(202, 202, 202);
        border-radius: 5px;
    }

    .line-sm {
        width: 25%;
        height: 1px;
        background: rgb(202, 202, 202);
        border-radius: 5px;
    }

    .original-price {
        text-decoration: line-through;
        color: var(--gray-500);
        font-size: .6rem;

    }

    .pro-price {
        font-size: .8rem;
        color: var(--yellow9);
    }


    .product-section {
        min-height: 60vh;
    }

    .product-section-box {
        width: 80%;

    }

    .product-section-box .nav-link {
        overflow: hidden;
    }

    .slider-image {
        cursor: all-scroll;
        border: 1px solid rgba(255, 255, 255, 0.114);
        height: 65vh;
        overflow: hidden;
        border-radius: 5px;

    }

    .slider-image:hover {
        border-radius: 10px;
        border: 1px dotted rgba(255, 255, 255, 0.114);

    }

    .banner-detail {
        max-width: 50%;
    }

    .small-image {
        width: 150px;
        height: 150px;

    }

    .small-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;

    }

    .carousel-item {
        background: #fff;
    }
    .btn-product-detail{
        padding: 10px 20px;
        border: 1px solid white;
        border-radius: 5px;
    }
    .btn-product-detail:hover{
        background: #2f2f2f;
    }
</style>

<?php
$label = '';
$loadMoreProduct_text = '';
$productName = '';
$productDescription = '';
$previewDescription = '';


if ($LANG == 'en-EN') {
    $label = "Products";
    $loadMoreProduct_text = 'Load More Products';
    $productName = $productData['product_name_eng'];
    $productDescription = $productData['description_eng'];
    $previewDescription = $productData['review_description_eng'];

    $btn_buy = "Buy now";
    $btn_contact = "Contact";
}

if ($LANG == 'th-TH') {
    $label = "อะไหล่";
    $loadMoreProduct_text = 'ดูสินค้าเพิ่มเติม';
    $productName = $productData['product_name'];

    $productDescription = $productData['description'];
    $previewDescription = $productData['review_description'];

    $btn_buy = "ซื้อเลย";
    $btn_contact = "ติดต่อเรา";
}
?>

<body>
    <main>
        <section class="section-banner">
            <div class="banner-cover">
                <h1 class="banner-header"><?= $productName ?></h1>
                <div class="banner-detail">
                    <div style="font-size: .5rem;"> <?= $this->Control_model->fullDateNoTimeEn($productData['create_date']) ?></div>
                </div>
            </div>
            <div class="banner-media">
                <?php if (strlen($productData['image_url']) > 0) { ?>
                    <img src="<?= base_url("/uploads/image/") . $productData['image_url'] ?>" alt="" />
                <?php } else { ?>
                    <img style="object-fit: contain; width: 100%; height: 100%;" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Image" />
                <?php } ?>
            </div>
        </section>

        <div class="container-section">

            <section class="section-space my-3">
                <div class="line"></div>
                <div class="space-item">
                    <div class="space-icon"><i class="fa-solid fa-gear"></i> </div>

                    <h3><?= $productName  ?></h3>
                    <!-- <?php print_r($productData) ?> -->

                    <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories. </div>
                </div>
                <div class="line"></div>

            </section>

            <section class="product-section d-block p-md-5 p-3" style="width: 100%;">
                <div class="container-fluid-lg ">
                    <div class="row">

                        <div class="col-xxl-12 col-xl-12 col-lg-12  fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="row g-4">
                                <div class="col-xl-6  fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="min-height: 300px;">
                                        <div class="carousel-indicators">
                                            <?php foreach ($articleImage as $key => $value) { ?>

                                                <button class="<?= $key == 0 ? "active" : "" ?>" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" aria-label=""></button>

                                            <?php } ?>
                                        </div>
                                        <div class="carousel-inner" style="height: 100%;">
                                            <?php if (count($articleImage) > 0) { ?>
                                                <?php foreach ($articleImage as $key => $value) { ?>

                                                    <div class="carousel-item slider-image <?= $key == 0 ? "active" : "" ?>">
                                                        <img style="object-fit: contain; width: 100%; height: 100%;" src="<?= base_url("/uploads/image/") . $value['image_url'] ?>" alt="Image" />
                                                    </div>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <img style="object-fit: contain; width: 100%; height: 100%;" src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg" alt="Image" />

                                            <?php } ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>



                                <div class="col-xl-6  fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="right-box-contain">
                                        <!-- <h6 class="offer-top">30% Off</h6> -->
                                        <h2 class="name"><?= $productName  ?></h2>

                                        <div class="procuct-contain">
                                            <?= $productDescription ?>
                                        </div>

                                        <div class="d-flex flex-column gap-2 mt-3 pt-3" style="font-size: .7rem; border-top:1px solid white">
                                            <span> Brand : <?= $productData['model_name'] ?></span>
                                            <span> Series : <?= $productData['series_name'] ?></span>
                                            <span> Year : <?= $productData['year'] ?></span>
                                            <?php

                                            $checkProPrice = $productData['price_pro'] > 0 ? 1 : 0;

                                            if ((int)$productData['price'] > 0) {  ?>
                                                <span> Price :
                                                    <?php if ($checkProPrice == 1) { ?>
                                                        <span style="font-size:1.2rem"> <?= number_format($productData['price_pro']) ?> ฿ </span>
                                                        <span style="text-decoration: line-through; opacity:50%; font-size:1.2rem;color:rgb(230, 33, 33);" >
                                                            <?= number_format($productData['price']) ?> ฿
                                                        </span>
                                                    <?php } ?>

                                                    <?php if ($checkProPrice == 0) { ?>

                                                        <span style="font-size:1.2rem">
                                                            <?= number_format($productData['price']) ?> ฿
                                                        </span>

                                                    <?php } ?>


                                                </span>
                                            <?php } ?>

                                            <?php $shopee_link = strlen($productData['shopee_link']) > 0  ? $productData['shopee_link'] : '' ?>

                                            <div class="d-flex gap-2 mt-3">
                                                    <a href="<?= $shopee_link ?>" target="_blank" class="btn-product-detail" style="background: var(--orange6);"><?= $btn_buy ?></a>
                                                    <a href="<?= base_url().$LANG ?>/contact" class="btn-product-detail"><?= $btn_contact ?></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <hr class="d-md-none d-sm-block w-75 my-5">

            <?php
            function getYouTubeVideoID($url)
            {
                // Regular expression pattern to match YouTube video IDs
                $pattern = '/(?:youtube\.com\/(?:[^\/]+\/[^\/]+\/|(?:v|e(?:mbed)?)\/|[^#]*[?](?:.*[&])?v=)|youtu\.be\/)([a-zA-Z0-9_-]+)/';

                // Check if the URL matches the pattern
                if (preg_match($pattern, $url, $matches)) {
                    // The video ID is in the first capture group
                    return $matches[1];
                } else {
                    // No match found
                    return null;
                }
            }

            $youtube_link_id = getYouTubeVideoID($productData['youtube_link']);
            ?>

            <div class="product-section-box m-0 mt-3 mt-sm-3 mt-md-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#file" type="button" role="tab" aria-controls="file" aria-selected="false">File</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <?= $productDescription ?>
                    </div>
                    <div class="tab-pane fade  p-3" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <span>

                            <?php if (strlen($productData['review_name_eng']) > 0) {  ?>
                                <div class="row row-sm px-2">
                                    <div class="col-12 d-flex align-items-center justify-content-center p-3 youtube-container flex-column">
                                        <?php if (isset($youtube_link_id)) { ?>
                                            <iframe width="560" height="315" id="ytplayerSide" src="https://www.youtube.com/embed/<?= $youtube_link_id ?>?autoplay=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                            <div>
                                                <?= $previewDescription  ?>
                                            </div>
                                        <?php } else { ?>
                                            <div>No link avaliable</div>
                                        <?php } ?>
                                    </div>

                                </div>
                            <?php } else { ?>
                                <span> No review avaliable</span>
                            <?php } ?>
                        </span>
                    </div>
                    <div class="tab-pane fade  p-3" id="file" role="tabpanel" aria-labelledby="file-tab">

                        <?php if (isset($articleFile) && count($articleFile) > 0) { ?>
                            <div class="row align-items-start justify-content-start px-3 gap-2 flex-column">
                                <?php foreach ($articleFile as $value) { ?>
                                    <div class="col-xl-4" id="card-file-<?= $value['id'] ?>">

                                        <div class="card mg-b-20">
                                            <div class="main-content-body main-content-body-contacts">
                                                <div class="main-contact-info-body">
                                                    <div class="media-list">
                                                        <div class="media">
                                                            <div class="media-body" style="overflow: hidden;">
                                                                <a style="font-size: .7rem;" target="_blank" href="<?= base_url("/uploads/file/") . $value['file_url'] ?>" alt="">
                                                                    <div class="d-flex align-items-center justify-content-start p-3" style="gap: 10px; color:black">
                                                                        <i class="far fa-file"></i> :
                                                                        <div class="file-url"> <?= strlen($value['file_name']) > 0 ?  $value['file_name'] : $value['file_url'] ?></div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="">No file avaliable</div>
                        <?php } ?>
                    </div>
                </div>
            </div>



            <nav aria-label="Page navigation example">


            <section class="section-space">

                <a class="f-center gap-2  p-3" href="<?= base_url($LANG . "/products/parts") ?>">
                    <div class="btn mt-1 btn-discovery product-more-btn"><?= $loadMoreProduct_text  ?> <i class="fa-solid fa-angle-right "></i></div>
                </a>
            </section>

        </div>


    </main>
</body>

<script>
    $(document).ready(function() {
        setTimeout(() => {
            $("body").addClass("page-on");
        }, 500);

        setTimeout(() => {
            $(".section-banner").addClass("banner-on");
        }, 500);

        setTimeout(() => {
            $(".banner-header").addClass("banner-header-on");
        }, 600);
        setTimeout(() => {
            $(".banner-detail").addClass("banner-on");
        }, 800);



    });
    $(document).ready(function() {

        const imageContainers = $('.carousel-item'); // Select all carousel items
        const scale = 1.8; // Adjust the scale factor as needed

        imageContainers.each(function() {
            const imageContainer = $(this);
            const zoomImage = imageContainer.find('img');

            imageContainer.on('mousemove', function(e) {
                const containerOffset = imageContainer.offset();
                const mouseX = e.pageX - containerOffset.left;
                const mouseY = e.pageY - containerOffset.top;

                const translateX = (imageContainer.width() / 2 - mouseX) * (scale - 1);
                const translateY = (imageContainer.height() / 2 - mouseY) * (scale - 1);

                zoomImage.css({
                    transform: `scale(${scale}) translate(${translateX}px, ${translateY}px)`
                });
            });

            imageContainer.on('mouseleave', function() {
                zoomImage.css({
                    transform: 'scale(1) translate(0, 0)'
                });
            });
        });
    });
</script>