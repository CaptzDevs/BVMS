<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

  <title>BuddyMotor</title>
  <meta name="description" content="BuddyMotor: Description">
  <meta name="keywords" content="Cars,Spare Part">
  <link rel="icon" type="image/x-icon" href="<?= base_url("assets/img/LOGO-buddymotor.png") ?>">

  <link rel="stylesheet" href="<?= base_url('assets/css/root.css') ?>">
  <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/all.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url("assets/plugins/bootstrap-5.1.3/css/bootstrap.min.css") ?>" />


  <script src="<?= base_url("assets/plugins/fontawesome/all.min.js") ?>"></script>
  <script src="<?= base_url("assets/plugins/bootstrap-5.1.3/js/bootstrap.min.js") ?>"></script>
  <script src="<?= base_url("assets/plugins/jquery/jquery.min.js") ?>"></script>


</head>
<style>
  ::-webkit-scrollbar {
    width: 10px;
  }

  ::-webkit-scrollbar-track {
    background: var(--main-color);
  }

  ::-webkit-scrollbar-thumb {
    background: #2e2e2e;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: #000000;
  }

  :root {
    --main-color: rgb(21, 21, 21);
    --main2-color: rgb(11, 54, 118);
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    overflow-x: hidden;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
      Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif !important;
  }

  body {
    overflow-x: hidden;
    background: var(--main-color);
    min-height: 100vh;
    gap: 150px;
    transition: height 0s;
    position: relative;
    /* padding-top: 55px; */
    color: white;
    opacity: 0%;
  }

  header {
    width: 100%;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 5;
    /*  overflow: hidden; */
    background: #00000000;
    user-select: none;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    overflow: hidden;
  }

  main {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;
    flex: 1 0 auto;
    padding-bottom: 20px;
    gap: 10px;
    scroll-snap-type: y mandatory;
  }

  section {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
  }

  footer {
    width: 100%;
    height: auto;
    background: var(--main-color);
    color: rgba(255, 255, 255, 0.61);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 10px;
    padding-bottom: 20px;
    font-size: .6rem;
  }

  a {
    color: rgba(255, 255, 255);
    text-decoration: none;
  }

  a:hover {
    color: rgba(255, 255, 255);
    text-decoration: none;
  }


  footer a {
    color: rgba(255, 255, 255, 0.61);
    text-decoration: none;
  }

  footer a:hover {
    color: rgba(255, 255, 255, 0.61);
    text-decoration: underline;
  }

  footer .btn {
    color: rgba(255, 255, 255, 0.61);
    font-size: .8rem;

  }

  .header-logo {
    width: 50px;
    height: 50px;
    margin-left: 20px;
    font-weight: 700;
    overflow: hidden;
  }

  .header-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .header-menu {
    display: flex;
    align-items: center;
    justify-content: center;
    list-style: none;
    margin-bottom: 0;
  }

  .header-menu li {
    padding: 0px 20px;
  }

  .navbar {
    background: #00000000;
    padding-top: 0px;
    padding-bottom: 0px;
  }


  .nav-link {
    color: white;
    height: 100%;
    position: relative !important;
    font-size: 0.8rem;
  }

  .nav-item {
    position: relative;
  }

  .nav-item::after {
    content: "";
    width: 0%;
    height: 1px;
    position: absolute;
    left: 0;
    bottom: 0;
    background: rgb(255, 255, 255);
    transition: 0.5s;
  }


  .nav-link:hover,
  .nav-link:focus {
    color: rgb(166, 166, 166) !important;
  }


  .nav-item:hover::after {
    width: 100%;
    transition: 0.5s;
  }

  .nav-link a:focus {
    color: transparent;
  }

  .navbar-nav {
    margin-left: -60px;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
    /* remove the gap so it doesn't close */
  }

  .dropdown-menu {
    background: var(--main-color);
  }

  .dropdown-item {
    color: white !important;
    font-size: .8rem;
  }

  .dropdown-item:hover,
  .dropdown-item:focus {
    background: #303030;
  }

  .footer-bar {
    width: 100%;
    height: 300px;
    /*  max-height: 350px; */
    height: auto;
    border-radius: 10px;
    background: rgb(246, 248, 250);
    display: flex;
    align-items: flex-start;
    justify-content: center;
    overflow: hidden;
  }

  .section-banner {
    height: 100vh;
    max-height: 2421px;
    position: relative;
    opacity: 0%;
    transition: 0.5s;
  }

  .page-on {
    opacity: 100% !important;
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

  .banner-detail {
    opacity: 0%;
    overflow: visible;
    width: 30%;
    position: relative;
    padding-left: 10px;
    border-left: 2px solid white;
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
    object-fit: cover;
    overflow: hidden;
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

  .space-item h3 {
    text-align: center;
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

  .list-search{
    display: flex;
    align-items: center;
    justify-content: center;
    
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 10px;
    gap: 10px;

    
  }
  .list-search input{
    width: 80%;
    padding: 0px 10px;
    color: white;
    background: #00000000;
    text-align: right;
    border: none;
    outline: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.368);
  }

  .btn-lang{
    border: 1px solid  rgba(255, 255, 255, 0.368);
    border-radius: 5px;
  }
  @media screen and (max-width: 992px) {

    .navbar-brand {
      margin-left: -20px;
    }

    .navbar-toggler {
      padding: 0px;
      padding-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .navbar-nav {
      margin-left: 10px;
    }

    .banner-detail {
      width: 70%;
      font-size: 18px;
    }
    .list-search{
      position: relative;
    }
  }

  .nav-link::after {
    display: none;
  }
  h1{
    overflow: visible;
  }
</style>


  <?php 
  
    $menu_TH = array('หน้าหลัก','สินค้า',"โมเดล","อะไหล่",'รีวิวสินค้า','เกี่ยวกับเรา','ติดต่อ');
    $menu_EN = array("Home","Product",'Models','Parts',"Product Review","About us","Contact Us");

    $opening = "";
    if($LANG == 'en-EN' ){
      $opening = "Open Hours Mon-Fri";
      $menu_list = $menu_EN;
    }

    if($LANG == 'th-TH'){
      $opening = "เปิด จ-ศ";
      $menu_list = $menu_TH;
    }

  ?>

<div class="navbar-over d-flex align-items-end justify-content-end py-2 px-3 gap-3" style="flex-wrap: wrap;background: #1a1a1a; font-size: .6rem;">

  <div >
    <i class="fa-brands mx-1 fa-google"></i> buddymotor333@gmail.com
  </div>

  <div >
    <i class="fa-solid mx-1 fa-phone"></i> +66 96-2763280 
  </div>

  <div >
   <?=    $opening  ?> : 09:00 - 17:00 WIB
  </div>
  
</div>
<nav class="navbar navbar-expand-lg px-sm-0 px-lg-3 overflow-visible">

  <div class="container-fluid overflow-visible">

    <a class="navbar-brand" href="<?= base_url($LANG) ?>">
      <div class="header-logo">
        <img src="<?= base_url("assets/img/LOGO-buddymotor.png") ?>" alt="" />
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white">
        <i class="fa-solid fa-bars"></i>
      </span>
    </button>


    <div class="collapse navbar-collapse justify-content-center overflow-visible" id="navbarNav">

      <ul class="navbar-nav overflow-visible">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page">Product</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url($LANG) ?>"><?= $menu_list[0] ?> </a>
        </li>


        <li class="nav-item dropdown overflow-visible">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $menu_list[1] ?>
          </a>
          <ul class="dropdown-menu overflow-visible" aria-labelledby="navbarDropdown">
            <li><a href="<?= base_url($LANG."/products/models") ?>" class="dropdown-item" href="#"><?= $menu_list[2] ?></a></li>
            <!-- <li><a href="<?= base_url($LANG."/products/year") ?>" class="dropdown-item" href="#">Year</a></li> -->
            <li><a href="<?= base_url($LANG."/products/parts") ?>" class="dropdown-item" href="#"><?= $menu_list[3] ?></a></li>
            <!-- 
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item disabled" href="#">Something else here</a></li> -->
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="<?= base_url($LANG."/reviews") ?>"><?= $menu_list[4] ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url($LANG."/about") ?>"><?= $menu_list[5] ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url($LANG."/contact") ?>"> <?= $menu_list[6] ?> </a>
        </li>

        <?php 
            $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
            $actual_link = $LANG == "en-EN" ? str_replace('en-EN','th-TH',$actual_link) : str_replace('th-TH','en-EN',$actual_link);

          ?>
          
        <li class="list-search">
          <input type="text" placeholder="Search" id="searchData">
          <a class="d-flex gap-1 align-items-center justify-content-center nav-link btn-lang" href="<?= $actual_link ?>"> 
            <i class="fa-solid fa-globe"></i>
            <div> <?= $LANG == "en-EN" ? "EN" : "TH" ?> </div>
          </a>
        </li>

      </ul>




      <hr />
<!--   <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Product Preview</a>
                </li>
              </ul>  -->
    </div>
  </div>
</nav>