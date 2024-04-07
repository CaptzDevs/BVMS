<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">


    <title>BVMS - Real Time Dashboard Moniter by ME-FI.com</title>

</head>

<body>

<!-- WRAPPER
=====================================================================================================================-->
<style>
    body{
        overflow: hidden;
    }
    #ts-primary-navigation{
        padding: .5rem;
        font-size: .2rem;
    }
    .navbar-brand{
        font-size: 1rem;
    }
/*     .ts-marker .ts-marker__feature > *{
        width: 10px;
        height: 10px;
        padding: 5px;
    } */
    .sidebar{
        width: 0px;
        height: 100vh;
        transition: .3s;
        opacity: 0%;
        height: 100vh;
        background: #ffffff;
        border-left: 1px solid rgba(0, 0, 0, 0.306);
        position: relative;
        overflow: auto;
        padding-bottom: 150px !important;
        font-size: .8rem !important;
    }
    .sidebar-active{
        width: 60%;
        transition: .3s;
        opacity: 100%;
    }

    .ts-marker__feature{
        pointer-events: none;
    }
    
    .sidebar-banner {
        width: 100%;
        height: 230px;
    }
    .sidebar-banner img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .sidebar h3{
        text-decoration: underline;
        margin-bottom: .5rem !important;
        padding-bottom:  0rem !important;
    }
    .btn-next{
        width: 100%;
        height: 100px;
        padding: 15px;
        color: rgb(0, 0, 0);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgb(135, 135, 135);
        border-radius: 5px;
    }
    .btn-next:hover{
        background: #1f8eee;
        color: #ffffff;
    }
    .collapse{
        font-size: .8rem;
    }
</style>
<div class="ts-page-wrapper ts-homepage" id="page-top">
<?php 

?>
    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    <header id="ts-header" class="fixed-top">

        <!-- SECONDARY NAVIGATION
        =============================================================================================================-->
        <!--PRIMARY NAVIGATION
        =============================================================================================================-->
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
            <div class="container">

                <!--Brand Logo-->
                <a class="navbar-brand" href="<?= base_url() ?>">
                    BVMS <i class='fa-solid fa-sparkles' style='width:30px'></i>
                </a>

                <!--Responsive Collapse Button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Collapsing Navigation-->
                <div class="collapse navbar-collapse" id="navbarPrimary">

<!--LEFT NAVIGATION MAIN LEVEL
=================================================================================================-->

<!--end Left navigation main level-->

<!--RIGHT NAVIGATION MAIN LEVEL
=================================================================================================-->
<ul class="navbar-nav ml-auto">

    <!--LOGIN (Main level)
    =============================================================================================-->
    <?php 
    
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/admin.php/Admin/Branchs') ?>"> Branch List</a>
    </li>

    <!--REGISTER (Main level)
    =============================================================================================-->
<!--     <li class="nav-item">
        <a class="nav-link text-dark" href="register.html">Register</a>
    </li> -->

    <!--SUBMIT (Main level)
    =============================================================================================-->
    <li class="nav-item login-button">
        <a class="btn btn-outline-primary btn-sm m-1 px-3" href="<?= base_url('/admin.php/Admin/login') ?>">
            <i class="fa fa-plus small mr-2"></i>
            Login
        </a>
    </li>

</ul>
<!--end Right navigation-->

</div>
                <!--end navbar-collapse-->
            </div>
            <!--end container-->
        </nav>
        <!--end #ts-primary-navigation.navbar-->

    </header>
    <!--end Header-->

    <!-- HERO MAP
    
    =================================================================================================================-->
    <section id="ts-hero" class=" mb-0">

        <!--Fullscreen mode-->
        <div class="ts-full-screen d-flex overflow-hidden">
            <!-- MAP
            =========================================================================================================-->
            <div class="ts-map w-100 ts-z-index__1">
                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                     data-ts-map-leaflet-provider="https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}"
                     data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>CartoDB</a>"
                     data-ts-map-zoom-position="topleft"
                     data-ts-map-scroll-wheel="1"
                     data-ts-map-zoom="12"
                     data-ts-map-center-latitude="7.0129342"
                     data-ts-map-center-longitude="100.4669778"
                     data-ts-locale="th-TH"
                     data-ts-currency="THB"
                     data-ts-unit="m<sup>2</sup>"
                     data-ts-display-additional-info="total_Total;available_Available;down_Down"
                  

                >
                </div>
            </div>



            <!-- RESULTS
            =========================================================================================================-->
                  <!-- RESULTS
            =========================================================================================================-->
            <section class="sidebar">
                <button class="px-3 pt-3 border-0 bg-transparent position-absolute top-0 left-0 text-white" id="closePannel">
                    X
                </button>
                <div class="sidebar-content">
                    

                </div>

            </section>
            <!--end ts-results-vertical-->

        </div>
        <!--end full-screen-->

    </section>
    <!--end ts-hero-->

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">

     <!--  -->

    </main>

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

    <footer id="ts-footer">

        <!--MAIN FOOTER CONTENT
        =============================================================================================================-->
        <section id="ts-footer-main">
            <div class="container">
                <div class="row">

                    <!--Brand and description-->
                    <div class="col-md-6">
                        <a href="#" class="brand">
                            BVMS
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

                    <!--Navigation-->
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

                    <!--Contact Info-->
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
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-main-->

        <!--SECONDARY FOOTER CONTENT
        =============================================================================================================-->
        <section id="ts-footer-secondary">
            <div class="container">

                <!--Copyright-->
                <div class="ts-copyright">(C) 2018 ThemeStarz, All rights reserved</div>

                <!--Social Icons-->
                <div class="ts-footer-nav">
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
                </div>
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
<script src="<?= base_url() ?>assets/js/dragscroll.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/js/leaflet.js"></script>
<script src="<?= base_url() ?>assets/js/leaflet.markercluster.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>
<!-- <script src="<?= base_url() ?>assets/js/map-leaflet.js"></script> -->
<!-- <script src="<?= base_url() ?>assets/js/fa_all.min.js"></script> -->


<script>
/*     setTimeout(() => {


        console.log("Init Event")

        $("a.ts-marker").click((e)=>{
            console.log(e.target.parentElement.dataset.tsId)   

            $(".sidebar").addClass("sidebar-active")
        })

     



    }, 1000); */

    $("#closePannel").click((e)=>{
            $(".sidebar").removeClass("sidebar-active")

        })

</script>

</body>
</html>
