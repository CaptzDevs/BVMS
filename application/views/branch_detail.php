<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->


    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <title>MyHouse - Advanced Real Estate HTML Template by ThemeStarz</title>

</head>
<style>
    .branch-image {
        width: 100%;
        height: 40vh;
        border-radius: 20px;
        overflow: hidden;
    }

    .branch-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<body>

    <!-- WRAPPER
    =================================================================================================================-->
    <div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">

        <!--*********************************************************************************************************-->
        <!--HEADER **************************************************************************************************-->
        <!--*********************************************************************************************************-->


        <!--*********************************************************************************************************-->
        <!-- MAIN ***************************************************************************************************-->
        <!--*********************************************************************************************************-->

        <main id="ts-main">



            <section class="branch-image">
                <img class="b_img" src="" alt="">
            </section>

            <!--BREADCRUMB
            =========================================================================================================-->
            <section id="breadcrumb">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/Dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('/Dashboard/Map') ?>">Map</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Branch</li>
                        </ol>
                    </nav>
                </div>
            </section>

            <!--PAGE TITLE
            =========================================================================================================-->
            <section id="page-title">
                <div class="container">

                    <div class="d-block d-sm-flex justify-content-between">

                        <!--Title-->
                        <div class="ts-title mb-0">
                            <h1 class="b_name">Branch Name</h1>
                            <h5 class="ts-opacity__90">
                                <i class="fa fa-map-marker text-primary"></i>
                                <span class="b_location"> Location </span>
                            </h5>
                        </div>

                        <!--Price-->
                        <h3>
                            <span class="badge badge-primary p-2 font-weight-normal ts-shadow__sm">Active</span>
                        </h3>

                    </div>

                </div>
            </section>

            <!--GALLERY CAROUSEL
            =========================================================================================================-->
            <section id="gallery-carousel">

                <div class="owl-carousel ts-gallery-carousel ts-gallery-carousel__multi" data-owl-dots="1" data-owl-items="3" data-owl-center="1" data-owl-loop="1">

                    <!--Slide-->
                    <div class="slide">
                        <div class="ts-image" data-bg-image="assets/img/img-detail-01.jpg">
                            <a href="assets/img/img-detail-01.jpg" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                        </div>
                    </div>

                    <!--Slide-->
                    <div class="slide">
                        <div class="ts-image" data-bg-image="assets/img/img-detail-02.jpg">
                            <a href="assets/img/img-detail-02.jpg" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                        </div>
                    </div>

                    <!--Slide-->
                    <div class="slide">
                        <div class="ts-image" data-bg-image="assets/img/img-detail-05.jpg">
                            <a href="assets/img/img-detail-03.jpg" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                        </div>
                    </div>

                    <!--Slide-->
                    <div class="slide">
                        <div class="ts-image" data-bg-image="assets/img/img-detail-04.jpg">
                            <a href="assets/img/img-detail-04.jpg" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                        </div>
                    </div>

                    <!--Slide-->
                    <div class="slide">
                        <div class="ts-image" data-bg-image="assets/img/img-detail-03.jpg">
                            <a href="assets/img/img-detail-05.jpg" class="ts-zoom popup-image"><i class="fa fa-search-plus"></i>Zoom</a>
                        </div>
                    </div>

                </div>

            </section>

            <!--CONTENT
            =========================================================================================================-->
            <section id="content">
                <div class="container">
                    <div class="row flex-wrap-reverse">


                        <!--LEFT SIDE
                        =============================================================================================-->
                        <div class="col-md-5 col-lg-4">


                            <!--ACTIONS
                        =============================================================================================-->
                            <section id="actions">
                                <h3>Action</h3>

                                <div class="d-flex justify-content-between">

                                    <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Add to favorites">
                                        <i class="far fa-star"></i>
                                    </a>

                                    <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Print">
                                        <i class="fa fa-print"></i>
                                    </a>

                                    <a href="#" class="btn btn-light mr-2 w-100" data-toggle="tooltip" data-placement="top" title="Add to compare">
                                        <i class="fa fa-exchange-alt"></i>
                                    </a>

                                    <a href="#" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top" title="Share property">
                                        <i class="fa fa-share-alt"></i>
                                    </a>

                                </div>

                            </section>
                            <!--DETAILS
                            =========================================================================================-->
                            <section>
                                <h3>Details</h3>
                                <div class="ts-box">

                                    <dl class="ts-description-list__line mb-0">

                                        <dt>ID:</dt>
                                        <dd>#</dd>
                                        <dt>Status:</dt>
                                        <dd>Active</dd>

                                        <dt>Total:</dt>
                                        <dd>248</dd>

                                        <dt>HTTP:</dt>
                                        <dd>3</dd>

                                        <dt>HTTPS:</dt>
                                        <dd>2</dd>

                                    </dl>

                                </div>
                            </section>

                            <!--CONTACT THE AGENT
                            =========================================================================================-->


                            <!--LOCATION
                        =============================================================================================-->
                            <section id="location">
                                <h3>Location</h3>

                                <div class="ts-box">

                                    <dl class="ts-description-list__line mb-0">

                                        <dt><i class="fa fa-map-marker ts-opacity__30 mr-2"></i>Address:</dt>
                                        <dd class="border-bottom pb-2 b_location"> Addr </dd>

                                        <dt><i class="fa fa-phone-square ts-opacity__30 mr-2"></i>Latitude:</dt>
                                        <br>
                                        <dd class="border-bottom pb-2 b_latitude"> 000 </dd>
                                        <dt><i class="fa fa-phone-square ts-opacity__30 mr-2"></i>longtitude:</dt>
                                        <br>
                                        <dd class="border-bottom pb-2 b_longtitude">000</dd>


                                 <!--        <dt><i class="fa fa-envelope ts-opacity__30 mr-2"></i>Email:</dt>
                                        <dd class="border-bottom pb-2"><a href="#">hello@property.com</a></dd>

                                        <dt><i class="fa fa-globe ts-opacity__30 mr-2"></i>Website:</dt>
                                        <dd><a href="#">www.property.com</a></dd> -->

                                    </dl>

                                </div>

                            </section>


                        </div>
                        <!--end col-md-4-->

                        <!--RIGHT SIDE
                        =============================================================================================-->
                        <div class="col-md-7 col-lg-8">

                            <!--QUICK INFO
                            =========================================================================================-->
                            <section id="quick-info">
                                <h3>CCTV Status</h3>

                                <!--Quick Info-->
                                <div class="ts-quick-info ts-box">

                                    <!--Row-->
                                    <div class="row no-gutters">

                                        <!--Bathrooms-->
                                        <div class="col-sm-4">
                                            <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-shower.png">
                                                <h6>Total</h6>
                                                <figure>2</figure>
                                            </div>
                                        </div>

                                        <!--Bedrooms-->
                                        <div class="col-sm-4">
                                            <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-bed.png">
                                                <h6>HTTP</h6>
                                                <figure>3</figure>
                                            </div>
                                        </div>

                                        <!--Area-->
                                        <div class="col-sm-4">
                                            <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-area.png">
                                                <h6>HTTPS</h6>
                                                <figure>248</figure>
                                            </div>
                                        </div>

                                        <!--Garages-->
                                        <!-- <div class="col-sm-3">
                                            <div class="ts-quick-info__item" data-bg-image="assets/img/icon-quick-info-garages.png">
                                                <h6>Garages</h6>
                                                <figure>1</figure>
                                            </div>
                                        </div> -->

                                    </div>
                                    <!--end row-->

                                </div>
                                <!--end ts-quick-info-->

                            </section>

                                <!--MAP
                            =========================================================================================-->
                            <section id="map-location">

                                <h3>Map</h3>

                                <div class="ts-map ts-map__detail ts-border-radius__sm ts-shadow__sm" id="ts-map-simple" 
                                data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png" 
                                data-ts-map-zoom="12"
                                data-ts-map-center-latitude="40.702411"
                                 data-ts-map-center-longitude="-73.556842"
                                  data-ts-map-scroll-wheel="0" 
                                  data-ts-map-controls="0"></div>
                            </section>

                            <!--DESCRIPTION
                            =========================================================================================-->
                            <section id="description">

                                <h3>Description</h3>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dictum ac augue et suscipit.
                                    Vivamus ac tellus ut massa bibendum aliquam vitae ac diam. Aenean in enim volutpat,
                                    accumsan erat non, porta massa. Nulla ac porta orci. Quisque condimentum fermentum
                                    isl, lacinia tempor erat venenatis non. Integer ut malesuada est, nec pulvinar magna.
                                    Vestibulum tincidunt malesuada mi eget mattis. Phasellus quis purus porta, auctor dolor
                                    sed, eleifend tortor. Vestibulum placerat tristique turpis, eu suscipit nulla elementum
                                    porttitor. Duis eu varius libero.
                                </p>

                            </section>

                            <!--FEATURES
                            =========================================================================================-->
                            <section id="features">

                                <h3>Features</h3>

                                <ul class="list-unstyled ts-list-icons ts-column-count-4 ts-column-count-sm-2 ts-column-count-md-2">
                                    <li>
                                        <i class="fa fa-bell"></i>
                                        Door Bell
                                    </li>
                                    <li>
                                        <i class="fa fa-wifi"></i>
                                        Wi-Fi
                                    </li>
                                    <li>
                                        <i class="fa fa-utensils"></i>
                                        Restaurant Nearby
                                    </li>
                                    <li>
                                        <i class="fa fa-plug"></i>
                                        230V Plugs
                                    </li>
                                    <li>
                                        <i class="fa fa-wheelchair"></i>
                                        Accessible
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        Phone
                                    </li>
                                    <li>
                                        <i class="fa fa-train"></i>
                                        Train Station
                                    </li>
                                    <li>
                                        <i class="fa fa-key"></i>
                                        Secured Key
                                    </li>
                                </ul>

                            </section>

                        


                            <!--FLOOR PLANS
                            =========================================================================================-->
                    <!--         <section id="floor-plans">

                                <h3>Floor Plans</h3>

                                <a href="#collapse-floor-1" class="ts-box d-block mb-2 py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-floor-1">
                                    1st Floor
                                    <div class="collapse" id="collapse-floor-1">
                                        <img src="assets/img/img-floor-plan-01.jpg" alt="" class="w-100">
                                    </div>
                                </a>

                                <a href="#collapse-floor-2" class="ts-box d-block py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-floor-2">
                                    2nd Floor
                                    <div class="collapse" id="collapse-floor-2">
                                        <img src="assets/img/img-floor-plan-02.jpg" alt="" class="w-100">
                                    </div>
                                </a>

                            </section>
 -->
                            <!--VIDEO
                        =============================================================================================-->

                            <!--   <section id="video">

                            <h3>Video</h3>

                            <div class="embed-responsive embed-responsive-16by9 rounded ts-shadow__md">
                                <iframe src="https://player.vimeo.com/video/9799783?color=ffffff&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>

                        </section> -->

                            <!--AMENITIES
                            =========================================================================================-->
                       <!--      <section id="amenities">

                                <h3>Amenities</h3>

                                <ul class="ts-list-colored-bullets ts-text-color-light ts-column-count-3 ts-column-count-md-2">
                                    <li>Air Conditioning</li>
                                    <li>Swimming Pool</li>
                                    <li>Central Heating</li>
                                    <li>Laundry Room</li>
                                    <li>Gym</li>
                                    <li>Alarm</li>
                                    <li>Window Covering</li>
                                    <li>Internet</li>
                                </ul>

                            </section> -->

                        </div>
                        <!--end col-md-8-->

                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>

            <!--SIMILAR PROPERTIES
        =============================================================================================================-->

        </main>
        <!--end #ts-main-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->

        <footer id="ts-footer">

            <!--MAIN FOOTER CONTENT
            =========================================================================================================-->
          <!--   <section id="ts-footer-main">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <a href="#" class="brand">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                            <p class="mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat tempor sapien.
                                In lobortis posuere tincidunt. Curabitur malesuada tempus ligula nec maximus. Nam tortor
                                arcu,
                                tincidunt quis molestie non, sagittis dignissim ligula. Fusce est ipsum, pharetra in felis
                                ac,
                                lobortis volutpat diam.
                            </p>
                            <a href="#" class="btn btn-outline-dark mb-4">Contact Us</a>
                        </div>

                        <div class="col-md-2">
                            <h4>Navigation</h4>
                            <nav class="nav flex-row flex-md-column mb-4">
                                <a href="#" class="nav-link">Home</a>
                                <a href="#" class="nav-link">Listing</a>
                                <a href="#" class="nav-link">About Us</a>
                                <a href="#" class="nav-link">Sign In</a>
                                <a href="#" class="nav-link">Register</a>
                                <a href="#" class="nav-link">Submit Property</a>
                            </nav>
                        </div>

                        <div class="col-md-4">
                            <h4>Contact</h4>
                            <address class="ts-text-color-light">
                                2590 Rocky Road
                                <br>
                                Philadelphia, PA 19108
                                <br>
                                <strong>Email: </strong>
                                <a href="#" class="btn-link">office@example.com</a>
                                <br>
                                <strong>Phone:</strong>
                                +1 215-606-0391
                                <br>
                                <strong>Skype: </strong>
                                real.estate1
                            </address>
                        </div>

                    </div>
                </div>
            </section> -->
            <!--end ts-footer-main-->

            <!--SECONDARY FOOTER CONTENT
            =========================================================================================================-->
            <section id="ts-footer-secondary">
                <div class="container">

                    <!--Copyright-->
                    <div class="ts-copyright"> Copyright © 2024 - Developed by ME-FI.com</div>

                    <!--Social Icons-->
             <!--        <div class="ts-footer-nav">
                        <nav class="nav">
                            <a href="#" class="nav-link">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </nav>
                    </div> -->
                    <!--end ts-footer-nav-->

                </div>
                <!--end container-->
            </section>
            <!--end ts-footer-secondary-->

        </footer>
        <!--end #ts-footer-->

    </div>
    <!--end page-->

    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/leaflet.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>


</body>

</html>