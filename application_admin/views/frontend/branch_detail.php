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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="<?= base_url("/assets/fontawesome/all.min.js") ?>"></script>

    <title>Branch detail </title>

</head>
<style>
    .branch-image {
        width: 100%;
        height: 60vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .branch-image img {
        width: 90%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;

    }

    .btn-search-date {
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        transition: .5s;
    }

    .btn-search-date:hover {
        background: #7c7c7c;
        transition: .5s;
    }

    input {
        border: none !important;
        border-bottom: 1px solid black !important;
    }

    .dt-container {
        overflow: auto;
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
                <img class="b_img" src="https://picsum.photos/200/300/?blur" alt="">
            </section>

            <!--BREADCRUMB
            =========================================================================================================-->
            <section id="breadcrumb">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin.php/DashboardView') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin.php/DashboardView/Map') ?>">Map</a></li>
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
                            <h1 class="b_name"> <?= $mapData[0]['title'] ?> </h1>
                            <h5 class="ts-opacity__90">
                                <i class="fa fa-map-marker text-primary"></i>
                                <span class="b_address"> <?= $mapData[0]['address'] ?> </span>
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
                            <!--   <section id="actions">
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

                            </section> -->
                            <!--DETAILS

                            
                            =========================================================================================-->

                            <?php 
                            $total_http = count($cctvData['total_http']);
                            $total_https = count($cctvData['total_https']);
                            $total = count($cctvData['total']);


                            $avaliable_http = $cctvData['avaliable_http'];
                            $avaliable_https = $cctvData['avaliable_https'];
                            $total_avaliable =  $cctvData['avaliable_total'];


                            $issue_http =  count($cctvData['issue_http']);
                            $issue_https = count($cctvData['issue_https']);
                            $total_issue = count($cctvData['issue_https'])+count($cctvData['issue_http']);
                            ?>
                            
                            <section>
                                <h3>Details</h3>
                                <div class="ts-box">

                                    <dl class="ts-description-list__line mb-0">

                                        <dt>HTTP:</dt>
                                        <dd> <span class="total_http"><?= $total_http  ?></span> </dd>
                                        <dt>HTTPS:</dt>
                                        <dd> <span class="total_https"><?= $total_https  ?></span> </dd>
                                        <dt>Total CCTV:</dt>
                                        <dd> <span class="total"><?= $total ?></span> </dd>

                                        <hr>

                                        <dt>Status:</dt>
                                        <dd>Active</dd>

                                        <dt>HTTP:</dt>
                                        <dd> <span class="avaliable_http"><?= $avaliable_http ?></span> / <span class="total_http"><?= $total_http ?></span> </dd>
                                        <dt>HTTPS:</dt>
                                        <dd> <span class="avaliable_https"><?= $avaliable_https ?></span> / <span class="total_https"><?= $total_https ?></span> </dd>
                                        <dt>Total CCTV:</dt>
                                        <dd> <span class="total_avaliable"><?= $total_avaliable ?></span> / <span class="total"><?=  $total ?></span> </dd>

                                        <hr>

                                        <dt>Status:</dt>
                                        <dd>Issue</dd>

                                        <dt>HTTP:</dt>
                                        <dd> <span class="issue_http"><?= $issue_http ?></span> </dd>
                                        <dt>HTTPS:</dt>
                                        <dd> <span class="issue_https"><?= $issue_https ?></span> </dd>
                                        <dt>Total CCTV:</dt>
                                        <dd> <span class="total_issue"><?= $total_issue ?></span> </dd>

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
                                        <dd class="border-bottom pb-2 b_address"> Addr </dd>

                                        <dt><i class="fa fa-map-marker ts-opacity__30 mr-2"></i>Latitude:</dt>
                                        <br>
                                        <dd class="border-bottom pb-2 b_latitude"> 000 </dd>
                                        <dt><i class="fa fa-map-marker ts-opacity__30 mr-2"></i>longtitude:</dt>
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
                            <section>
                                <h3>Search</h3>
                                <div class="ts-box">

                                    <dl class="ts-description-list__line mb-0">
                                        <h3> Date</h3>

                                        <dd> <input type="text" class="col-12" placeholder="Start date" id="datepicker-start"> </dd>
                                        <dd> <input type="text" class="col-12" placeholder="End date" id="datepicker-end"></p>
                                        </dd>

                                    </dl>
                                    <button class="w-100 btn-search-date"> Search </button>
                                    <h3>Exports</h3>

                                    <div class="d-flex justify-content-between">
                                        <!--   <a href="#" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top" title="Add to favorites">
                                            <i class="far fa-star"></i>
                                        </a>
 -->
                                        <button id="export-pdf" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top" title="Print">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </button>

                                        <button id="export-excel" class="btn btn-light w-100 " data-toggle="tooltip" data-placement="top" title="Add to compare">
                                            <i class="fa-solid fa-file-excel"></i>
                                        </button>

                                        <!--  <a href="#" class="btn btn-light w-100" data-toggle="tooltip" data-placement="top" title="Share property">
                                            <i class="fa fa-share-alt"></i>
                                        </a> -->

                                    </div>
                                </div>
                            </section>

                            <!--QUICK INFO
                            =========================================================================================-->

                            <section id="quick-info">
                                <h3>CCTV Status</h3>
                                

                                <!--Quick Info-->
                                <div class="ts-quick-info ts-box">

                                    <div class="row no-gutters">
                                        <div class="col-sm-4">
                                            <div class="ts-quick-info__item text-success" data-bg-image="assets/img/icon-quick-info-shower.png">
                                                <h6>Total Available</h6>
                                                <figure class="total_avaliable"> <?= $total_avaliable ?> </figure>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="ts-quick-info__item text-success" data-bg-image="assets/img/icon-quick-info-bed.png">
                                                <h6>HTTP (Active)</h6>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <figure class="avaliable_http">  <?= $avaliable_http ?> </figure>
                                                    <!--  <figure >/</figure> 
                                                    <figure class="total_http">--</figure> -->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="ts-quick-info__item text-success" data-bg-image="assets/img/icon-quick-info-area.png">
                                                <h6>HTTPS (Active)</h6>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <figure class="avaliable_https">  <?= $avaliable_https ?> </figure>

                                                    <!-- <figure >/</figure> 
                                                    <figure class="total_https">--</figure> -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="ts-quick-info__item text-danger" data-bg-image="assets/img/icon-quick-info-bed.png">
                                                <h6>HTTP (Issue)</h6>
                                                <figure class="issue_http">  <?= $issue_http ?> </figure>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ts-quick-info__item text-danger" data-bg-image="assets/img/icon-quick-info-area.png">
                                                <h6> HTTPS (Issue)</h6>
                                                <figure class="issue_https">  <?= $issue_https ?> </figure>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="ts-quick-info__item text-danger" data-bg-image="assets/img/icon-quick-info-area.png">
                                                <h6> Total (Issue)</h6>
                                                <figure class="total_issue">  <?= $total_issue?> </figure>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </section>

                            <section class="overflow-hidden">
                                <div class=" w-100 d-flex justify-content-end ">
                                    <button id="toggle-filter" class="border border-bottom-1" data-state="0"> Status: Issue </button>
                                </div>
                                <!--  <span style="font-size: 1.2rem;">CCTV List</span> -->
                                <table id="cctvReport" class="display no-wrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Host ID</th>
                                            <th>Host</th>
                                            <th>Type</th>
                                            <th>Branch Name</th>
                                            <th>IP</th>
                                            <th>Status</th>


                                        </tr>
                                    </thead>
                                    <tbody id="cctvData">

                                        <?php foreach ($cctvData['total'] as $item) { ?>
                                            <tr>
                                                <td><?= $item['hostid'] ?></td>
                                                <td> <a href='<?= base_url() ?>admin.php/DashboardView/branch/<?= $item['branchid'] ?>/cctv/<?= $item['hostid'] ?>'> <u> <?= $item['host'] ?></u> </a></td>
                                                <td><?= $item['groupid']  === 23 ? "https" : "http" ?> </td>
                                                <td><?= $mapData[0]['title'] ?></td>
                                                <td><?= $item['ip'] ?></td>
                                                <td><?= $item['is_cctv_active']  == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Issue</span>' ?></td>
                                            </tr>

                                        <?php } ?>



                                    </tbody>
                                    <!--   <tfoot>
                                        <tr>
                                            <th>Host ID</th>
                                            <th>Host</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                          
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </section>


                            <!--MAP
                            =========================================================================================-->
                            <section id="map-location">
                                <div class="ts-box">

                                    <h3>Map</h3>
                                    <div class="ts-map ts-map__detail ts-border-radius__sm ts-shadow__sm" id="ts-map-simple" data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png" data-ts-map-zoom="12" data-ts-map-center-latitude="40.702411" data-ts-map-center-longitude="-73.556842" data-ts-map-scroll-wheel="0" data-ts-map-controls="0"></div>
                                </div>
                            </section>

                            <!--DESCRIPTION
                            =========================================================================================-->
                            <section id="description" class="ts-box">

                                <h3>Description</h3>

                                <p class="b_description">
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
                            <!--        <section id="features">

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

                            </section> -->




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

    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#datepicker-start").datepicker({
                dateFormat: "dd/mm/yy",
                maxDate: '0'
            });
            $("#datepicker-end").datepicker({
                dateFormat: "dd/mm/yy",
                maxDate: '0'
            });




        });

        $("#export-excel").prop("disabled", true)
        $("#export-pdf").prop("disabled", true)
    </script>
</body>

</html>