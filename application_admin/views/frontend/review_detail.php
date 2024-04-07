<style>
    .section-banner {
        height: 50vh;
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
    }

    .banner-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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

    .slider-image {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 250px;
    }

    .slider-image img {
        width: 80%;
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
</style>


<?php 
    $label = '';
    $loadMoreProduct_text = '';
    $productName = '';
    $productDescription = '';
    $previewDescription = '';


    if($LANG == 'en-EN' ){
      $label = "Products";
      $loadMoreProduct_text = 'See other review';
      $previewDescription = $reviewData['description_eng'];

      
    }

    if($LANG == 'th-TH'){
      $label = "อะไหล่";
      $loadMoreProduct_text = 'ดูรีวิวอื่นๆ';
      
      $previewDescription = $reviewData['description'];


    }
 ?>

<body>
    <main>
        <section class="section-banner">
            <div class="banner-cover">
                <h1 class="banner-header"><?= $reviewData['review_name_eng'] ?></h1>
                <p class="banner-detail">
                Buddymotor - Auto Parts, Lighting, and Accessories.
                <div style="font-size: .5rem;"> <?= $this->Control_model->fullDateNoTimeEn($reviewData['create_date']) ?></div>
                </p>
            </div>
            <div class="banner-media">
                <img src="<?= base_url("/uploads/image/") . $reviewData['image_url'] ?>" alt="" />
            </div>
        </section>
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

            $youtube_link_id = getYouTubeVideoID($reviewData['youtube_link']);
            ?>
        <div class="container-section">

            <section class="section-space my-3">
                <div class="line"></div>
                <div class="space-item">
                    <div class="space-icon"><i class="fa-solid fa-gear"></i> </div>

                    <h3><?= $reviewData['review_name_eng'] ?></h3>
                    <!-- <?php print_r($reviewData) ?> -->

                    <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories. </div>
                </div>
                <div class="line"></div>

            </section>

            <section class="product-section" >
                <div class="container-fluid-lg px-3">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12  fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="row g-4  align-items-center justify-content-center">
                                <div class="col-xl-12  fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="product-left-box">
                                        <div class="row g-sm-4 g-2 align-items-center justify-content-center">

                                            <div class="col-12">
                                                <div class="product-main no-arrow slick-initialized slick-slider">
                                                    <div class="slick-list draggable">
                                                        <div class="slick-track" style="opacity: 1; width: 100%;">
                                                            <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                                <div class="slider-image">
                                                                <?php if (isset($youtube_link_id)) { ?>
                                                            <iframe width="560" height="315" id="ytplayerSide" src="https://www.youtube.com/embed/<?= $youtube_link_id ?>?autoplay=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                        <?php } else { ?>
                                                            <div>No link avaliable</div>
                                                        <?php } ?>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--  <div class="col-12">
                                                <div class="left-slider-image left-slider no-arrow slick-top slick-initialized slick-slider">

                                                    <div class="slick-list draggable">
                                                        <div class="slick-track" style="opacity: 1; width: 96px; transform: translate3d(0px, 0px, 0px);">
                                                            <div class="slick-slide slick-current slick-active" tabindex="0" style="width: 96px;" data-slick-index="0" aria-hidden="false">
                                                                <div class="sidebar-image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 px-3  fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="right-box-contain  mt-3 " style="font-size: .8rem;">
                                        <!-- <h6 class="offer-top">30% Off</h6> -->

                                        <?php if(strlen($previewDescription) > 0 ){ ?>
                                        Description : 
                                        <div class="procuct-contain">
                                            <?= $previewDescription ?>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <hr class="d-md-none d-sm-block w-75 my-5">

          






            <section class="section-space">

                <a class="f-center gap-2  p-3" href="<?= base_url($LANG."/reviews") ?>">
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
</script>