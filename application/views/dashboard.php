<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/jquery.scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/leaflet.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

    <title>MyHouse - Advanced Real Estate HTML Template by ThemeStarz</title>

</head>

<body>

<!-- WRAPPER

=====================================================================================================================-->
<div class="ts-page-wrapper ts-homepage" id="page-top">

    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    <header id="ts-header" class="fixed-top">

        <!-- SECONDARY NAVIGATION
        =============================================================================================================-->
        <nav id="ts-secondary-navigation" class="navbar p-0">
            <div class="container justify-content-end justify-content-sm-between">

                <!--Left Side-->
          
                <!--Right Side-->
         
                <!--end navbar-nav-->
            </div>
            <!--end container-->
        </nav>

        <!--PRIMARY NAVIGATION
        =============================================================================================================-->
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
            <div class="container">

                <!--Brand Logo-->
                <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                    <img src="assets/img/logo.png" alt="">
                </a>

                <!--Responsive Collapse Button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Collapsing Navigation-->
                <div class="collapse navbar-collapse" id="navbarPrimary">

                    <!--LEFT NAVIGATION MAIN LEVEL
                    =================================================================================================-->
                    <ul class="navbar-nav">

                        <!--HOME (Main level)
                        =============================================================================================-->
                        <li class="nav-item ts-has-child">

                            <!--Main level link-->
                            <a class="nav-link active" href="#">
                                Home
                                <span class="sr-only">(current)</span>
                            </a>

                            <!-- List (1st level) -->
                            <ul class="ts-child">

                                <!-- MAP (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Map</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <!-- OPENSTREETMAP (2nd level level)
                                        =============================================================================-->
                                        <li class="nav-item ts-has-child">

                                            <a href="#" class="nav-link">OpenStreetMap</a>

                                            <!--List (3rd level) -->
                                            <ul class="ts-child">

                                                <li class="nav-item">
                                                    <a href="index-map-leaflet-fullscreen.html" class="nav-link">Full Screen</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-leaflet-form-bottom.html" class="nav-link">Form Bottom</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-leaflet-half-map.html" class="nav-link">Half Map</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-leaflet-left-results.html" class="nav-link">Left Results</a>
                                                </li>

                                            </ul>

                                        </li>
                                        <!--end OpenStreetMap-->

                                        <!-- MAPBOX (2nd level level)
                                        =============================================================================-->
                                        <li class="nav-item ts-has-child">

                                            <a href="#" class="nav-link">MapBox</a>

                                            <!--List (3rd level) -->
                                            <ul class="ts-child">

                                                <li class="nav-item">
                                                    <a href="index-map-mapbox-fullscreen.html" class="nav-link">Full Screen</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-mapbox-form-bottom.html" class="nav-link">Form Bottom</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-mapbox-half-map.html" class="nav-link">Half Map</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-mapbox-left-results.html" class="nav-link">Left Results</a>
                                                </li>

                                            </ul>

                                        </li>
                                        <!--end MapBox-->

                                        <!-- GOOGLE (2nd level level)
                                        =============================================================================-->
                                        <li class="nav-item ts-has-child">

                                            <a href="#" class="nav-link">Google</a>

                                            <!--List (3rd level) -->
                                            <ul class="ts-child">

                                                <li class="nav-item">
                                                    <a href="index-map-google-fullscreen.html" class="nav-link">Full Screen</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-google-form-bottom.html" class="nav-link">Form Bottom</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-google-half-map.html" class="nav-link">Half Map</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-google-left-results.html" class="nav-link">Left Results</a>
                                                </li>

                                            </ul>

                                        </li>
                                        <!--end Google-->

                                        <!-- HERE (2nd level level)
                                        =============================================================================-->
                                        <li class="nav-item ts-has-child">

                                            <a href="#" class="nav-link">Here</a>

                                            <!--List (3rd level) -->
                                            <ul class="ts-child">

                                                <li class="nav-item">
                                                    <a href="index-map-here-fullscreen.html" class="nav-link">Full Screen</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-here-form-bottom.html" class="nav-link">Form Bottom</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-here-half-map.html" class="nav-link">Half Map</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-here-left-results.html" class="nav-link">Left Results</a>
                                                </li>

                                            </ul>

                                        </li>
                                        <!--end Here-->

                                        <!-- BING (2nd level level)
                                        =============================================================================-->
                                        <li class="nav-item ts-has-child">

                                            <a href="#" class="nav-link">Bing</a>

                                            <!--List (3rd level) -->
                                            <ul class="ts-child">

                                                <li class="nav-item">
                                                    <a href="index-map-bing-fullscreen.html" class="nav-link">Full Screen</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-bing-form-bottom.html" class="nav-link">Form Bottom</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-bing-half-map.html" class="nav-link">Half Map</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="index-map-bing-left-results.html" class="nav-link">Left Results</a>
                                                </li>

                                            </ul>

                                        </li>
                                        <!--end Bing-->

                                    </ul>
                                    <!--end List (2nd level)-->

                                </li>
                                <!--end MAP (1st level)-->

                                <!-- SLIDER (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Slider</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="index-slider.html" class="nav-link">Slider Default</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="index-slider-fullscreen.html" class="nav-link">Full Screen</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="index-slider-form-vertical.html" class="nav-link">Vertical Form</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="index-slider-form-horizontal.html" class="nav-link">Horizontal Form</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end SLIDER (1st level)-->

                                <!-- IMAGE (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Image</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="index-image-form-horizontal-dark.html" class="nav-link">Horizontal Form</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="index-image-form-vertical-light.html" class="nav-link">Vertical Form</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="index-image-fullscreen.html" class="nav-link">Full Screen</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="index-video-background.html" class="nav-link">Video Background</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end SLIDER (1st level)-->

                            </ul>
                            <!--end List (1st level) -->

                        </li>
                        <!--end HOME nav-item-->

                        <!--LISTING (Main level)
                        =============================================================================================-->
                        <li class="nav-item ts-has-child">

                            <!--Main level link-->
                            <a class="nav-link" href="#">Listing</a>

                            <!-- List (1st level) -->
                            <ul class="ts-child">

                                <!-- CATEGORY ICONS (1st level)
                                =====================================================================================-->
                                <li class="nav-item">

                                    <a href="listing-category-icons.html" class="nav-link">Category Icons</a>

                                </li>
                                <!--end CATEGORY ICONS (1st level)-->

                                <!-- GRID (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Grid</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="listing-grid-3-columns.html" class="nav-link">Grid 3 Columns</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="listing-grid-4-columns.html" class="nav-link">Grid 4 Columns</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="listing-grid-mixed.html" class="nav-link">Mixed</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="listing-grid-sidebar-left.html" class="nav-link">Sidebar Left</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="listing-grid-sidebar-right.html" class="nav-link">Sidebar Right</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end GRID (1st level)-->

                                <!-- LIST (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">List</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="listing-list-sidebar-left.html" class="nav-link">Sidebar Left</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="listing-list-sidebar-right.html" class="nav-link">Sidebar Right</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="listing-list-compact-sidebar.html" class="nav-link">Compact with Sidebar</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end LIST (1st level)-->

                                <!-- PROPERTY (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Property</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="detail-01.html" class="nav-link">Property Detail v1</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="detail-02.html" class="nav-link">Property Detail v2</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="detail-03.html" class="nav-link">Property Detail v3</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end PROPERTY (1st level)-->

                            </ul>
                            <!--end List (1st level) -->

                        </li>
                        <!--end LISTING nav-item-->

                        <!--PAGES (Main level)
                        =============================================================================================-->
                        <li class="nav-item ts-has-child">

                            <!--Main level link-->
                            <a class="nav-link" href="#">Pages</a>

                            <!-- List (1st level) -->
                            <ul class="ts-child">

                                <!-- AGENCY (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Agency</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="agencies-list.html" class="nav-link">Agencies List</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="agency-detail.html" class="nav-link">Agency Detail</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end AGENCY (1st level)-->

                                <!-- AGENTS (1st level)
                                =====================================================================================-->
                                <li class="nav-item ts-has-child">

                                    <a href="#" class="nav-link">Agents</a>

                                    <!--List (2nd level) -->
                                    <ul class="ts-child">

                                        <li class="nav-item">
                                            <a href="agencies-list.html" class="nav-link">Agents List</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="agent-detail-01.html" class="nav-link">Agent Detail v1</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="agent-detail-02.html" class="nav-link">Agent Detail v2</a>
                                        </li>

                                    </ul>
                                    <!--end List (2nd level) -->

                                </li>
                                <!--end LIST (1st level)-->

                                <!-- EDIT PROPERTY (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="edit-property.html" class="nav-link">Edit Property</a>
                                </li>
                                <!--end EDIT PROPERTY (1st level)-->

                                <!-- FAQ (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <!--end FAQ (1st level)-->

                                <!-- LOGIN (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="login.html" class="nav-link">Login</a>
                                </li>
                                <!--end LOGIN (1st level)-->

                                <!-- PRICING (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <!--end PRICING (1st level)-->

                                <!-- REGISTER (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="register.html" class="nav-link">Register</a>
                                </li>
                                <!--end REGISTER (1st level)-->

                                <!-- SUBMIT (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="submit.html" class="nav-link">Submit Property</a>
                                </li>
                                <!--end SUBMIT (1st level)-->

                                <!-- SUBMIT PREVIEW (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="preview.html" class="nav-link">Submit Preview</a>
                                </li>
                                <!--end SUBMIT PREVIEW (1st level)-->

                                <!-- SUBMITTED (1st level)
                                =====================================================================================-->
                                <li class="nav-item">
                                    <a href="submitted.html" class="nav-link">Submitted</a>
                                </li>
                                <!--end SUBMITTED(1st level)-->

                            </ul>
                            <!--end List (1st level) -->

                        </li>
                        <!--end PAGES nav-item-->

                        <!--ABOUT US (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link" href="about-us.html">About Us</a>
                        </li>
                        <!--end ABOUT US nav-item-->

                        <!--CONTACT (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link mr-2" href="contact.html">Contact</a>
                        </li>
                        <!--end CONTACT nav-item-->

                    </ul>
                    <!--end Left navigation main level-->

                    <!--RIGHT NAVIGATION MAIN LEVEL
                    =================================================================================================-->
                    <ul class="navbar-nav ml-auto">

                        <!--LOGIN (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">Login</a>
                        </li>

                        <!--REGISTER (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="register.html">Register</a>
                        </li>

                        <!--SUBMIT (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm m-1 px-3" href="submit.html">
                                <i class="fa fa-plus small mr-2"></i>
                                Add Property
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
        <div class="ts-full-screen ts-has-horizontal-results w-1001 d-flex1 flex-column1">

            <!-- MAP
            =========================================================================================================-->
            <div class="ts-map ts-shadow__sm">

                <!-- FORM
                =====================================================================================================-->
                <div class="ts-form__map-search ts-z-index__2">
                    <!--Form-->
                    <form class="ts-form">

                        <!--Collapse button-->
                        <a href=".ts-form-collapse" data-toggle="collapse" class="ts-center__vertical justify-content-between">
                            <h5 class="mb-0">Search Filter</h5>
                        </a>

                        <!--Form-->
                        <div class="ts-form-collapse ts-xs-hide-collapse collapse show">

                            <!--Keyword-->
                            <div class="form-group my-2 pt-2">
                                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Address, City or ZIP">
                            </div>

                            <!--Category-->
                            <select class="custom-select my-2" id="type" name="category">
                                <option value="">Type</option>
                                <option value="1">Apartment</option>
                                <option value="2">Villa</option>
                                <option value="3">Land</option>
                                <option value="4">Garage</option>
                            </select>

                            <!--Status-->
                            <select class="custom-select my-2" id="status" name="status">
                                <option value="">Status</option>
                                <option value="1">Sale</option>
                                <option value="2">Rent</option>
                            </select>

                            <!--Max Price-->
                            <select class="custom-select my-2" id="price" name="price">
                                <option value="">Max Price</option>
                                <option value="5000">$5,000</option>
                                <option value="10000">$10,000</option>
                                <option value="50000">$50,000</option>
                                <option value="100000">$100,000</option>
                                <option value="100000>">> $100,000</option>
                            </select>

                            <!--Submit button-->
                            <div class="form-group mt-2 mb-3">
                                <button type="submit" class="btn btn-primary w-100" id="search-btn">Search</button>
                            </div>

                            <!--More Options Button-->
                            <a href="#more-options-collapse" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="more-options-collapse">
                                <i class="fa fa-plus-circle ts-text-color-primary mr-2 ts-visible-on-collapsed"></i>
                                <i class="fa fa-minus-circle ts-text-color-primary mr-2 ts-visible-on-uncollapsed"></i>
                                More Options
                            </a>

                            <!--Hidden Form-->
                            <div class="collapse" id="more-options-collapse">

                                <!--Padding-->
                                <div class="pt-4">

                                    <!--Row-->
                                    <div class="form-row">

                                        <!--Bedrooms-->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="bedrooms">Bedrooms</label>
                                                <input type="number" class="form-control" id="bedrooms" name="bedrooms" min="0">
                                            </div>
                                        </div>

                                        <!--Bathrooms-->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="bathrooms">Bathrooms</label>
                                                <input type="number" class="form-control" id="bathrooms" name="bathrooms" min="0">
                                            </div>
                                        </div>

                                    </div>
                                    <!--end row-->

                                    <!--Checkboxes-->
                                    <div id="features-checkboxes" class="w-100">
                                        <h6 class="mb-3">Features</h6>

                                        <div class="">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_1" name="features[]" value="ch_1">
                                                <label class="custom-control-label" for="ch_1">Air conditioning</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_2" name="features[]" value="ch_2">
                                                <label class="custom-control-label" for="ch_2">Bedding</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_3" name="features[]" value="ch_3">
                                                <label class="custom-control-label" for="ch_3">Heating</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_4" name="features[]" value="ch_4">
                                                <label class="custom-control-label" for="ch_4">Internet</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_5" name="features[]" value="ch_5">
                                                <label class="custom-control-label" for="ch_5">Microwave</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_6" name="features[]" value="ch_6">
                                                <label class="custom-control-label" for="ch_6">Smoking
                                                    allowed</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_7" name="features[]" value="ch_7">
                                                <label class="custom-control-label" for="ch_7">Terrace</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_8" name="features[]" value="ch_8">
                                                <label class="custom-control-label" for="ch_8">Balcony</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_9" name="features[]" value="ch_9">
                                                <label class="custom-control-label" for="ch_9">Iron</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_10" name="features[]" value="ch_10">
                                                <label class="custom-control-label" for="ch_10">Hi-Fi</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_11" name="features[]" value="ch_11">
                                                <label class="custom-control-label" for="ch_11">Beach</label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ch_12" name="features[]" value="ch_12">
                                                <label class="custom-control-label" for="ch_12">Parking</label>
                                            </div>

                                        </div>
                                        <!--end ts-column-count-3-->

                                    </div>
                                    <!--end #features-checkboxes-->

                                </div>
                                <!--end Padding-->
                            </div>
                            <!--end more-options-collapse-->

                        </div>
                        <!--end ts-form-collapse-->

                    </form>
                    <!--end ts-form-->
                </div>
                <!--end ts-form__map-search-->

                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                     data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                     data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>CartoDB</a>"
                     data-ts-map-zoom-position="bottomright"
                     data-ts-map-scroll-wheel="1"
                     data-ts-map-zoom="13"
                     data-ts-map-center-latitude="40.702411"
                     data-ts-map-center-longitude="-73.556842"
                     data-ts-locale="en-US"
                     data-ts-currency="USD"
                     data-ts-unit="m<sup>2</sup>"
                     data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms"
                >
                </div>

            </div>

            <!-- RESULTS
            =========================================================================================================-->
            <div id="ts-results" class="ts-results__horizontal scrollbar-inner dragscroll">
                <div class="ts-results-wrapper"></div>
            </div>

        </div>
        <!--end full-screen-->

    </section>
    <!--end ts-hero-->

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->



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

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/sly.min.js"></script>
<script src="assets/js/dragscroll.js"></script>
<script src="assets/js/jquery.scrollbar.min.js"></script>
<script src="assets/js/leaflet.js"></script>
<script src="assets/js/leaflet.markercluster.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/map-leaflet.js"></script>

</body>
</html>
