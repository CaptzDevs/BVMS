<style>
  .slide-car {
    width: 100%;
    max-width: 1530px;
    height: 710px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 0px;
    margin-bottom: 0px;
    padding: 30px;
    transition: 1s;
    /* background: #f7f7f7; */
  }



  .slide-car-off {
    width: 0% !important;
    padding: 0px;
    overflow: hidden;
  }


  .slide-car-item {
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.5s ease-out;
    object-fit: cover;
  }

  .slide-car-model {
    height: 100%;
    clip-path: polygon(25% 0%, 100% 0%, 76% 100%, 0% 100%);
    position: absolute;
    top: 0px;
    left: 0px;
    filter: brightness(10%);
    background: #ffff;

  }

  .slide-car-model img {
    width: 100%;
    max-width: 700px;
    height: 100%;
  /*   transform: scaleX(-1);
    -webkit-transform: scaleX(-1); */
    object-fit: cover;
  }

  .slide-car-model-active {
    height: 100%;
    clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);
    position: absolute;
    top: 0px;
    left: 0px;
    filter: brightness(100%);
    background: #ffff;
  }

  .slide-car-model-active img {
    width: 100%;
    max-width: 700px;
    height: 100%;
/*     transform: scaleX(-1);
    -webkit-transform: scaleX(-1); */
    object-fit: cover;

  }

  .slide-cover {
    width: 70%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0;
    background: rgb(0, 0, 0);
    background: linear-gradient(90deg,
        rgba(0, 0, 0, 0.556) 0%,
        rgba(255, 255, 255, 0) 80%);
    z-index: 999;
    clip-path: polygon(0 0%, 95% 0%, 78.5% 100%, 0% 100%);
    
  }


  h1 {
    overflow: hidden;
  }

  .btn-control-slide {
    padding: 10px 20px;
    background: transparent;
    color: white;
    border: 1px solid transparent;
    cursor: pointer;
  }


  .btn-control-slide:hover {
    clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
    background: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
  }

  .section-search {
    width: 100%;
    height: 100vh;
    background: #f7f7f7;
    color: #000000;
    display: flex;
    align-items: center;
    justify-content: center;
  }



  .search-input {
    border: none;
    border-bottom: 1px solid black;
    outline: none;
    background: transparent;
    border-radius: 0px;
    text-align: right;
    padding-right: 10px;
    color: #000000;
  }

  .search-image-set img {}

  .section-overview {
    width: 100%;
    height: 600px;
    background: var(--main-color);
    padding: 50px;
    padding-top: 20px;
    padding-bottom: 0;
  }

  .overview {
    width: 1000px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .overview-stack {
    width: 80%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 20px;
    cursor: pointer;
  }

  .overview-stack-item {
    width: 100%;
    height: 100%;
    overflow: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: relative;
  }

  .overview-main {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: relative;
    cursor: pointer;
  }

  .overview-main img,
  .overview-stack img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: 0.5s;
  }

  .overview-main img:hover,
  .overview-stack img:hover {
    transform: scale(1.2, 1.2);
    transition: 0.5s;
  }

  .overview-label {
    width: 100%;
    padding: 10px;
    overflow: hidden;
    position: absolute;
    bottom: 0px;
    left: 0px;
    backdrop-filter: blur(5px);
    max-height: 120px;
    font-size: 0.8rem;
    background: #ffffff94;
  }

  .overview-stack .overview-label {
    max-height: 80px;
    font-size: 0.5rem;
  }

  .section-product {
    max-width: 1500px;
    padding: 10px;
    background: var(--main-color);
    /*   display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap; */
    gap: 20px;
    border-radius: 10px;
    padding-top: 20px;
  }





  .product {
    width: 100%;
    height: 300px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
    background: rgb(255, 255, 255);
    border-radius: 5px;
    cursor: pointer;
    filter: drop-shadow(5px 5px rgb(47, 47, 47));

    transition: filter .5s;
  }

  .product:hover {
    filter: drop-shadow(10px 10px rgb(66, 66, 66));

  }



  .product-label {
    width: 100%;
    height: 80px;
    font-family: "Kanit", sans-serif;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background: var(--gray-200);
  }

  .product-price {
    color: var(--main2-color);
  }

  .product-image::-webkit-scrollbar {
    width: 0px;
  }

  .slide-car-name {
  
      font-size: 1.5rem;
    }


  @media screen and (max-width: 1220px) {


    .slide-car {
      width: 100%;
      height: 100vh;
      max-height: 500px;
    }

    .slide-car-model {
      width: 100%;
      height: 100%;
      clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%) !important;
      position: absolute;
      top: 0px;
      left: 0px;
      filter: brightness(100%) !important;
      left: 0px !important;

    }
    .slide-car-name{
      font-size: 1rem;
    }

    .slide-car-model-active {
      width: 100%;
      height: 100%;
      clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%) !important;
      position: absolute;
      top: 0px;
      left: 0px;
      filter: brightness(100%);
      left: 0px !important;

    }

    .slide-cover {
      width: 100%;
      justify-content: flex-end !important;
      padding-bottom: 5px;
      color: #000000;
      padding-top: 30px;
      gap: 10px;

    }

    .slide-car-name{
      font-size: .6rem;
      width: 100%;
      background: #ffff;
      padding: 10px;
      position: absolute;
      top: 10px;
      left: 0px;
    }
    .slide-car-model img {
      max-width: none;
    }
    .btn-control-slide{
      font-size: .6rem;
      padding: 5px 10px;
      clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
      background: rgb(255, 255, 255);
      color: rgb(0, 0, 0);
  
    }

    .btn-more{
      font-size: .6rem;
      padding: 5px !important;
    }



    .btn-next,
    .btn-prev {
      color: black;
    }
  }

  @media screen and (max-width: 992px) {



    /*  .slide-car-name{
        display: none !important;
      } */

    .overview {
      flex-direction: column;
      flex-wrap: wrap;
    }

    .overview-stack {
      width: 100%;
      flex-direction: row;
      flex-wrap: wrap;

    }

    .overview-stack-item {
      width: 80%;
    }

    .section-overview {
      padding: 0px;
      width: 100%;
      height: 20%;
    }

    .overview-main .product-image {
      width: 80%;
      justify-content: center;
    }

    .product {
      width: 100%;
      height: 300px;
    }

    .section-product {
      padding: 0px;
      flex-direction: column;
    }

    .product-image {
      height: 300px !important;
    }

    .sub-ig-image {
      width: 80%;
    }

    .section-social .product {
      height: 100%;
    }

    .social-image::after {
      display: none;
    }
    .section-search {
      align-items: flex-start;
    }
  }

  @media screen and (max-width: 692px) {

    .slide-car {
      width: 100%;
      height: 100vh;
      max-height: 500px;
    }

    .section-social {
      flex-wrap: wrap;
    }

    .section-social .product {
      width: 100%;
    }

    .social-image {
      width: 100%;
      height: 100px;
    }
    .banner-cover{
      padding-left: 10px;
    }
    .banner-header-on{
      font-size: 2.2rem !important;
    }
    .btn-more{
      font-size: .6rem;
      padding: 5px !important;
    }

    .btn-control-slide{
      font-size: .6rem;
      padding: 5px 10px;
      clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
      background: rgb(255, 255, 255);
      color: rgb(0, 0, 0);
  
    }
    .slide-car-name{
      background: #ffff;
      padding: 10px;
      position: absolute;
      top: 10px;
      left: 0px;
    }
 
  }


  @media screen and (max-width: 480px) {

    .slide-car {
      width: 100%;
      height: 80vh;
      max-height: 380px;
    }

    .section-search {
      align-items: flex-start;
    }



  }


  .product-more-btn {
    border: 1px solid rgba(255, 255, 255, 0);
    color: rgba(255, 255, 255, 0.588);
  }

  .product-more-btn:hover {
    border: 1px solid rgb(255, 255, 255);
    color: white;
  }
  form{
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: visible;
  }
  form button{
    overflow: visible;
  }
  .btn-more{
    border: 1px solid white;
    background: #fff;
    padding: 10px;
    border-radius: 5px;
    color: #000000;
}
.btn-more:hover{
  color: #000000;
  box-shadow: 5px 5px #c9c8cd;
}
</style>

<?php 
    $label = '';
    $loadMoreProduct_text = '';
    $social = '';
    $shopingOnline = '';
    $search = "";
    $learnMore = "";
    $slideName = "";

    $searchLabel = "";
    if($LANG == 'en-EN' ){
      $loadMoreProduct_text = 'See Other Product';
      $social = 'Social Media Stories';
      $shopingOnline = 'Online Shop Highlight';
      $search = "Making it easy to find your dream. Enter your keyword and browse the best parts car.";
      $searchLabel = "Search Product";
      $learnMore = "Learn More";
      $slideName = "slide_name_eng";

    }

    if($LANG == 'th-TH'){
      $loadMoreProduct_text = 'ดูสินค้าอื่นๆ';
      $social = 'สตอรี่';
      $shopingOnline = 'ช่องทางการซื้อขายออนไลน์';
      $search = "ค้นหาสินค้าที่ต้องการ";
      $searchLabel = "ค้นหาสินค้า โมเดล อะไหล่";
    $learnMore = "ดูเพิ่มเติม";
    $slideName = "slide_name";



    }
 ?>

<body>
  <!--   <header>

        <div class="header-logo">
            <img src="./assets/img/LOGO-buddymotor.png" alt="">
        </div>

        <ul class="header-menu">
            <li>Product</li>
            <li>Feature</li>
            <li>Origin</li>
            <li>Contact</li>
        </ul>
    </header> -->



  <main>
    <section class="section-banner">
      <div class="banner-cover">
        <h1 class="banner-header">BUDDYMOTOR</h1>
        <p class="banner-detail">
        Buddymotor - Auto Parts, Lighting, and Accessories
Established in 1993, Buddymotor is a trusted partner of Motorzoom Indonesia.
        </p>
      </div>
      <div class="banner-media">
        <!--    <img
            src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          /> -->
        <video width="1124" height="710" playsinline="" webkit-playsinline="" autoplay loop="true" src="<?= base_url('/assets/video/OSRAM LEDdriving Working & Driving Lights in action!.mp4') ?>" preload="metadata" style="width: 100%; height: 100%; object-fit: cover;" muted="muted"></video>
    
      </div>
    </section>

   <!--  <section class="slide-car slide-car-off">
      <div class="slide-cover d-flex align-items-center justify-content-center flex-column">
        <h1 class="slide-car-name"> Honda Civic LX sedan 2019</h1>
        <div class="control-slide d-flex align-items-center justify-content-center gap-2">
          <button id="btn-prev" class="btn-control-slide btn-prev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button id="btn-next" class="btn-control-slide btn-next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <div class="slide-car-model-active slide-car-item" data-index="0" style="left: 55%">
        <img src="https://360view.3dmodels.org/zoom/Honda/Honda_Civic_Mk10f_sedan_LX_2019_1000_0001.jpg" alt="" />
        <span class="d-none"> Honda Civic LX sedan 2019 </span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="1" style="left: 20%">
        <img src="https://360view.3dmodels.org/zoom/Honda/Honda_Civic_Mk10_LX_2016_1000_0001.jpg" alt="" />
        <span class="d-none">Honda Civic LX 2016</span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="2" style="left: -14%">
        <img src="https://cdn.3dmodels.org/wp-content/uploads/Honda/378_Honda_CR-V_Mk6_RS_ePHEV_2023/Honda_CR-V_Mk6_RS_ePHEV_2023_1000_0001.jpg" alt="" />
        <span class="d-none">Honda CR- RS ePHEV 2023</span>
      </div>
    </section> -->

<!-- 
    <section class="slide-car slide-car-off">
      <div class="slide-cover d-flex align-items-center justify-content-center flex-column">
        <h1 class="slide-car-name"> Honda Civic LX sedan 2019</h1>
        <div class="control-slide d-flex align-items-center justify-content-center gap-2">
          <button id="btn-prev" class="btn-control-slide btn-prev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button id="btn-next" class="btn-control-slide btn-next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <div class="slide-car-model-active slide-car-item" data-index="0" style="left: 55%">
        <img src="<?= base_url("/assets/img/carslide/pngwing.com4.png") ?>" alt="" />
        <span class="d-none"> Honda Civic LX sedan 2019 </span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="1" style="left: 20%">
        <img src="<?= base_url("/assets/img/carslide/pngwing.com1.png") ?>" alt="" />

        <span class="d-none">Honda Civic LX 2016</span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="2" style="left: -14%">
        <img src="<?= base_url("/assets/img/carslide/pngwing.com5.png") ?>" alt="" />

        <span class="d-none">Honda CR- RS ePHEV 2023</span>
      </div>
    </section>
 -->



 <section class="slide-car slide-car-off">
      <div class="slide-cover d-flex align-items-center justify-content-center flex-column">
        <h1 class="slide-car-name"> <?= $slideData[0]['slide_name_eng'] ?> </h1>
        <div class="control-slide d-flex align-items-center justify-content-center gap-2">
          <button id="btn-prev" class="btn-control-slide btn-prev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button id="btn-next" class="btn-control-slide btn-next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>

        <div class="control-slide d-flex align-items-center justify-content-center gap-2">
          <a target="_blank" href="<?= $slideData[0]['shopee_link'] ?> " id="shopee_link" class="btn-more">
              Shop Now
          </a>
          <a target="_blank" href="<?= $slideData[0]['learnmore_link'] ?> " id="learn_more_link" class="btn-more">
              <?= $learnMore ?>
          </a>
        </div>

      </div>

      <?php 
      $pos = 55;
      $countSlide = count($slideData);
      foreach($slideData as $key => $value){
        $isActive = $key  == 0 ? "-active" : "";
        $countSlide -= 1;

        ?>
      
      <div class="slide-car-model<?= $isActive ?> slide-car-item" data-index="<?= $key ?>" style="left: <?= $pos ?>%">
          <img src="<?= base_url("/uploads/image/").$value['image_url'] ?>" alt="" />
          <span class="d-none">
                <?= $value[$slideName] ."._.".$value['shopee_link']. "._.".$value['learnmore_link']  ?>
            </span>

      </div>
      <?php 
        $pos -= 30;
    
    } ?>
   
    </section>

 <!-- old2 -->
<!--  <section class="slide-car slide-car-off">
      <div class="slide-cover d-flex align-items-center justify-content-center flex-column">
        <h1 class="slide-car-name"> shop for isuzu dmax parts 2023</h1>
        <div class="control-slide d-flex align-items-center justify-content-center gap-2">
          <button id="btn-prev" class="btn-control-slide btn-prev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button id="btn-next" class="btn-control-slide btn-next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <div class="slide-car-model-active slide-car-item" data-index="0" style="left: 55%">
        <img src="<?= base_url("/assets/img/slides/slide1.jpg") ?>" alt="" />
        <span class="d-none"> shop for isuzu dmax parts 2023 </span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="1" style="left: 20%">
        <img src="<?= base_url("/assets/img/slides/slide2.jpg") ?>" alt="" />

        <span class="d-none">shop for hilux vigo parts 2023</span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="2" style="left: -15%">
        <img src="<?= base_url("/assets/img/slides/slide3.jpg") ?>" alt="" />

        <span class="d-none">Shop for offorad ligthings by Osram</span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="3" style="left: -55%">
        <img src="<?= base_url("/assets/img/slides/slide4.jpg") ?>" alt="" />

        <span class="d-none">shop parts for Hino</span>
      </div>
    </section> -->

<!-- old -->
<!--     <section class="slide-car slide-car-off">
      <div class="slide-cover d-flex align-items-center justify-content-center flex-column">
        <h1 class="slide-car-name"> Honda Civic LX sedan 2019</h1>
        <div class="control-slide d-flex align-items-center justify-content-center gap-2">
          <button id="btn-prev" class="btn-control-slide btn-prev">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <button id="btn-next" class="btn-control-slide btn-next">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <div class="slide-car-model-active slide-car-item" data-index="0" style="left: 55%">
        <img src="<?= base_url("/assets/img/carslide/pngwing.com1.png") ?>" alt="" />
        <span class="d-none"> Honda Civic LX sedan 2019 </span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="1" style="left: 20%">
        <img src="<?= base_url("/assets/img/carslide/pngwing.com2.png") ?>" alt="" />

        <span class="d-none">Honda Civic LX 2016</span>
      </div>

      <div class="slide-car-model slide-car-item" data-index="2" style="left: -14%">
        <img src="<?= base_url("/assets/img/carslide/pngwing.com3.png") ?>" alt="" />

        <span class="d-none">Honda CR- RS ePHEV 2023</span>
      </div>
    </section> -->


    <section class="section-search">
      <div class="d-flex row align-items-start justify-content-center">
        <div class="col-md-6 d-flex flex-column p-5 align-items-center align-items-sm-center align-items-lg-start ">
          <h1><?= $searchLabel ?></h1>
          <span> <?=  $search ?>
          </span>

          <div class="d-flex align-items-center gap-3 mt-5">
            <form action="<?= base_url($LANG."/search") ?>">
            <input class="search-input" type="text" placeholder="Search" name="q" id="searchData" required>
            <button class="border-0" style="background: transparent;"><i class="fa-solid fa-magnifying-glass"></i></button>
            
            </form>
          </div>
        </div>
        <div class="col-md-6 search-image-set">
          <img style="transform: scaleX(-1) translateX(0px)" src="https://cdn.3dmodels.org/wp-content/uploads/Honda/268_Honda_Civic_Mk10f_sedan_LX_2019/Honda_Civic_Mk10f_sedan_LX_2019_600_0005.jpg" alt="" />
        </div>
      </div>
    </section>

    <section class="section-space mt-3">
      <div class="line"></div>
      <div class="space-item">
        <div class="space-icon"> <i class="fa-regular fa-images"></i> </div>

        <h3><?= $social ?></h3>

        <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories. </div>
      </div>
      <div class="line"></div>

    </section>

    <section class="section-overview">
      <div class="overview">
        <div class="overview-stack">
          <div class="overview-stack-item">
            <div class="product-image">

              <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cyvt2vdLhC0/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                <div style="padding:16px;"> <a href="https://www.instagram.com/p/Cyvt2vdLhC0/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                    <div style=" display: flex; flex-direction: row; align-items: center;">
                      <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                      </div>
                      <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                        </div>
                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                        </div>
                      </div>
                    </div>
                    <div style="padding: 19% 0;"></div>
                    <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                            <g>
                              <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                              </path>
                            </g>
                          </g>
                        </g>
                      </svg></div>
                    <div style="padding-top: 8px;">
                      <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                        View this post on Instagram</div>
                    </div>
                    <div style="padding: 12.5% 0;"></div>
                    <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                      <div>
                        <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                        </div>
                        <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                        </div>
                        <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                        </div>
                      </div>
                      <div style="margin-left: 8px;">
                        <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                        </div>
                        <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                        </div>
                      </div>
                      <div style="margin-left: auto;">
                        <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                        </div>
                        <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                        </div>
                        <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                        </div>
                      </div>
                    </div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                      </div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                      </div>
                    </div>
                  </a>
                  <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                    <a href="https://www.instagram.com/p/Cyvt2vdLhC0/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Porsche (@porsche)</a>
                  </p>
                </div>
              </blockquote>
              <script async src="//www.instagram.com/embed.js"></script>
            </div>

          </div>
          <div class="overview-stack-item">
            <div class="product-image">

              <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cyfn8j3Kktr/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                <div style="padding:16px;"> <a href="https://www.instagram.com/p/Cyfn8j3Kktr/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                    <div style=" display: flex; flex-direction: row; align-items: center;">
                      <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                      </div>
                      <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                        </div>
                        <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                        </div>
                      </div>
                    </div>
                    <div style="padding: 19% 0;"></div>
                    <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                            <g>
                              <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                              </path>
                            </g>
                          </g>
                        </g>
                      </svg></div>
                    <div style="padding-top: 8px;">
                      <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                        View this post on Instagram</div>
                    </div>
                    <div style="padding: 12.5% 0;"></div>
                    <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                      <div>
                        <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                        </div>
                        <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                        </div>
                        <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                        </div>
                      </div>
                      <div style="margin-left: 8px;">
                        <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                        </div>
                        <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                        </div>
                      </div>
                      <div style="margin-left: auto;">
                        <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                        </div>
                        <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                        </div>
                        <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                        </div>
                      </div>
                    </div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                      </div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                      </div>
                    </div>
                  </a>
                  <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                    <a href="https://www.instagram.com/p/Cyfn8j3Kktr/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Porsche (@porsche)</a>
                  </p>
                </div>
              </blockquote>
              <script async src="//www.instagram.com/embed.js"></script>
            </div>
          </div>

        </div>

        <div class="overview-main">
          <div class="product-image">

            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cy0OQbfMFIt/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
              <div style="padding:16px;"> <a href="https://www.instagram.com/p/Cy0OQbfMFIt/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                  <div style=" display: flex; flex-direction: row; align-items: center;">
                    <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                    </div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                      </div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                      </div>
                    </div>
                  </div>
                  <div style="padding: 19% 0;"></div>
                  <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                          <g>
                            <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                            </path>
                          </g>
                        </g>
                      </g>
                    </svg></div>
                  <div style="padding-top: 8px;">
                    <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                      View this post on Instagram</div>
                  </div>
                  <div style="padding: 12.5% 0;"></div>
                  <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                    <div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                      </div>
                      <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                      </div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                      </div>
                    </div>
                    <div style="margin-left: 8px;">
                      <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                      </div>
                      <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                      </div>
                    </div>
                    <div style="margin-left: auto;">
                      <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                      </div>
                      <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                      </div>
                      <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                      </div>
                    </div>
                  </div>
                  <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                    </div>
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                    </div>
                  </div>
                </a>
                <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                  <a href="https://www.instagram.com/p/Cy0OQbfMFIt/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Porsche (@porsche)</a>
                </p>
              </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>

          </div>
        </div>


      </div>

    </section>


    <div class="container-section sub-ig-image">

      <section class="section-product position-relative">

        <div class="product">
          <div class="product-image">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cw-ianBOtgo/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
              <div style="padding:16px;"> <a href="https://www.instagram.com/p/Cw-ianBOtgo/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                  <div style=" display: flex; flex-direction: row; align-items: center;">
                    <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                    </div>
                  </div>
                  <div style="padding: 19% 0;"></div>
                  <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                          <g>
                            <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                          </g>
                        </g>
                      </g>
                    </svg></div>
                  <div style="padding-top: 8px;">
                    <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div>
                  </div>
                  <div style="padding: 12.5% 0;"></div>
                  <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                    <div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                      <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                    </div>
                    <div style="margin-left: 8px;">
                      <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                      <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                    </div>
                    <div style="margin-left: auto;">
                      <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                      <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                      <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                    </div>
                  </div>
                  <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                  </div>
                </a>
                <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/Cw-ianBOtgo/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Porsche (@porsche)</a></p>
              </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
            <script async src="//www.instagram.com/embed.js"></script>
          </div>

        </div>

        <div class="product">
          <div class="product-image">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CxNPY68uyJ_/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
              <div style="padding:16px;"> <a href="https://www.instagram.com/p/CxNPY68uyJ_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                  <div style=" display: flex; flex-direction: row; align-items: center;">
                    <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                    </div>
                  </div>
                  <div style="padding: 19% 0;"></div>
                  <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                          <g>
                            <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                          </g>
                        </g>
                      </g>
                    </svg></div>
                  <div style="padding-top: 8px;">
                    <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div>
                  </div>
                  <div style="padding: 12.5% 0;"></div>
                  <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                    <div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                      <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                    </div>
                    <div style="margin-left: 8px;">
                      <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                      <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                    </div>
                    <div style="margin-left: auto;">
                      <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                      <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                      <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                    </div>
                  </div>
                  <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                  </div>
                </a>
                <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CxNPY68uyJ_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Porsche (@porsche)</a></p>
              </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
            <script async src="//www.instagram.com/embed.js"></script>
          </div>

        </div>

        <div class="product">
          <div class="product-image">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CxlQm67paQs/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
              <div style="padding:16px;"> <a href="https://www.instagram.com/p/CxlQm67paQs/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                  <div style=" display: flex; flex-direction: row; align-items: center;">
                    <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                    <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                      <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                    </div>
                  </div>
                  <div style="padding: 19% 0;"></div>
                  <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                          <g>
                            <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                          </g>
                        </g>
                      </g>
                    </svg></div>
                  <div style="padding-top: 8px;">
                    <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div>
                  </div>
                  <div style="padding: 12.5% 0;"></div>
                  <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                    <div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                      <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                      <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                    </div>
                    <div style="margin-left: 8px;">
                      <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                      <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                    </div>
                    <div style="margin-left: auto;">
                      <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                      <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                      <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                    </div>
                  </div>
                  <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                  </div>
                </a>
                <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CxlQm67paQs/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Porsche (@porsche)</a></p>
              </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
            <script async src="//www.instagram.com/embed.js"></script>
          </div>

        </div>



      </section>



    <!--   <section class="section-space">

        <a class="f-center gap-2  p-3" href="<?= base_url($LANG."/products") ?>">
          <div class="btn mt-1 btn-discovery product-more-btn"><?= $loadMoreProduct_text ?> <i class="fa-solid fa-angle-right "></i></div>
        </a>
      </section>

    </div>


    <section class="section-space mt-3">
      <div class="line"></div>
      <div class="space-item">
        <div class="space-icon"><i class="fa-solid fa-bag-shopping"></i></div>

        <h3><?= $shopingOnline ?></h3>
        <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories. </div>
      </div>
      <div class="line"></div>

    </section> -->

<!-- 
    <div class="container-section">
      <section class="section-social  position-relative ">
        <div class="product social-image-container overflow-hidden ">
          <div class="product-image social-image rounded">
            <img src="https://www.teknovidia.com/wp-content/uploads/2022/04/Logo-Shopee.jpg" alt="" />
          </div>
        </div>

        <div class="product social-image-container overflow-hidden ">
          <div class="product-image social-image rounded">
            <img src="data:image/png;base64,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" alt="" />
          </div>
        </div>

        <div class="product social-image-container overflow-hidden ">

          <div class="product-image social-image rounded">
            <img src="https://www.dumbchat.ai/wp-content/uploads/2022/06/220120-47456-1.jpg" alt="" />
          </div>
        </div>

        <div class="product social-image-container overflow-hidden ">

          <div class="product-image social-image rounded">
            <img src="https://play-lh.googleusercontent.com/74iMObG1vsR3Kfm82RjERFhf99QFMNIY211oMvN636_gULghbRBMjpVFTjOK36oxCbs=w240-h480-rw" alt="" />
          </div>
        </div>

        <div class="product social-image-container overflow-hidden ">

          <div class="product-image social-image rounded">
            <img src="https://play-lh.googleusercontent.com/Ui_-OW6UJI147ySDX9guWWDiCPSq1vtxoC-xG17BU2FpU0Fi6qkWwuLdpddmT9fqrA" alt="" />
          </div>
        </div>




      </section>

        <section class="section-space">
          <div class="f-center gap-2 p-3">
            <div class="btn mt-1 btn-discovery">
              See Other Product <i class="fa-solid fa-angle-right"></i>
            </div>
          </div>
        </section>
    </div> -->
  </main>
</body>


<script>
  $(document).ready(function() {
    setTimeout(() => {
      $("body").addClass("page-on");
    }, 500);


    if (document.body.clientWidth <= 992) {

      $(".slide-car-name").text('<?= $slideData[count($slideData)-1]['slide_name_eng'] ?>');

    }



    setTimeout(() => {
      $(".section-banner").addClass("banner-on");
    }, 500);

    setTimeout(() => {
      $(".banner-header").addClass("banner-header-on");
    }, 600);
    setTimeout(() => {
      $(".banner-detail").addClass("banner-on");
    }, 800);

    if ($(window).scrollTop() >= 400) {

      $(".slide-car-off").removeClass('slide-car-off')
    }

    $(window).on('scroll', (e) => {
      if ($(window).scrollTop() >= 400) {

        $(".slide-car-off").removeClass('slide-car-off')
      }
    })
  });

  let slidePos = [60, 55, 20, -15,-55];
  let slidePosBack = [20, -15,-55];

  $("#btn-prev").click((e) => {
    $("#btn-next").prop("disabled", true);
    $("#btn-prev").prop("disabled", true);

    let slideItems = $(`.slide-car-item`).length;
    let nextElem = `<div class="slide-car-model slide-car-item" data-index="${-1}" style="left: 55%; 
          transform:translateX(50%); z-index:0">
              <img src="${
                $(`.slide-car-item[data-index="${slideItems - 1}"] img`)[0].src
              }"
                  alt="">
                  <span class="d-none">${
                    $(`.slide-car-item[data-index="${slideItems - 1}"] span`)[0]
                      .innerText
                  }</span>
          </div>`;

    for (let i = slideItems - 1; i >= 0; i--) {
      console.log(i, slidePosBack[i]);
      $(`.slide-car-item[data-index="${i}"]`)[0].style.left =
        slidePosBack[i] + "%";
    }

    $(`.slide-car-item[data-index="${0}"]`)[0].classList.add("slide-car-model");
    $(`.slide-car-item[data-index="${0}"]`)[0].classList.remove(
      "slide-car-model-active"
    );
    
    $(`.slide-car-item[data-index="${slideItems - 1}"]`)[0].style.zIndex = "-1";

    if (document.body.clientWidth >= 992) {

      $(`.slide-car-item[data-index="${slideItems - 1}"]`)[0].style.transform = "translateX(-60%)";
    }

    $(`.slide-car-item`).each((i, item) => {
      item.dataset.index = +item.dataset.index + 1 == slideItems ? 0 : +item.dataset.index + 1;
      item.style.zIndex = item.dataset.index + 1;
    });

    setTimeout(() => {
      $(".slide-car")[0].insertAdjacentHTML("beforeend", nextElem);
      $(`.slide-car-item[data-index="${-1}"]`)[0].classList.remove(
        "slide-car-model"
      );
      $(`.slide-car-item[data-index="${-1}"]`)[0].classList.add(
        "slide-car-model-active"
      );
    }, 10);

    setTimeout(() => {
      $(`.slide-car-item[data-index="${-1}"]`)[0].style.transform = "translateX(0%)";
    }, 20);

    
    let slideDetail = $(`.slide-car-item[data-index="${0}"] span`)[0].innerText
    slideDetail = slideDetail.split("._.");

    if (document.body.clientWidth <= 992) {

       slideDetail = $(`.slide-car-item[data-index="${slideItems-1}"] span`)[0].innerText
      slideDetail = slideDetail.split("._.");
    }


    $(".slide-car-name").text(slideDetail[0]);
     $("#shopee_link").attr('href',slideDetail[1]);
     $("#learnmore_link").attr('href',slideDetail[2]); 

    /*   let fullCarName = ''
      let i = 0

      let renderText = setInterval(() => {
        fullCarName += carName[i];
        $(".slide-car-name").text(carName);

        i++;
        if(i == carName.length){
          clearInterval(renderText)
        }
      }, 30); */

    setTimeout(() => {


      $(`.slide-car-item[data-index="${0}"]`).remove();
      $(`.slide-car-item[data-index="${-1}"]`)[0].dataset.index = 0;

      $("#btn-next").prop("disabled", false);
      $("#btn-prev").prop("disabled", false);
    }, 500);
  });

  $("#btn-next").click((e) => {

    $("#btn-next").prop("disabled", true);
    $("#btn-prev").prop("disabled", true);
    let slideItems = $(`.slide-car-item`).length;
    let nextElem = `<div class="slide-car-model slide-car-item" data-index="${slideItems}" style="left: -40%; z-index:${
    slideItems - 1
  }">
              <img src="${$(`.slide-car-item[data-index="${0}"] img`)[0].src}"
                  alt="">
                  <span class="d-none">${
                    $(`.slide-car-item[data-index="${0}"] span`)[0].innerText
                  }</span>
          </div>`;

    $(".slide-car")[0].insertAdjacentHTML("beforeend", nextElem);

    setTimeout(() => {
      $(`.slide-car-item[data-index="${slideItems}"]`)[0].style.left = "-14%";
    }, 10);

    $(`.slide-car-item[data-index="${1}"]`)[0].classList.remove(
      "slide-car-model"
    );
    $(`.slide-car-item[data-index="${1}"]`)[0].classList.add(
      "slide-car-model-active"
    );

    for (let i = 1; i < slideItems; i++) {
      $(`.slide-car-item[data-index="${i}"]`)[0].style.left = slidePos[i] + "%";
    }

    $(`.slide-car-item[data-index="${0}"]`)[0].style.transform = "translateX(40%)";


    let slideDetail = $(`.slide-car-item[data-index="${1}"] span`)[0].innerText
    slideDetail = slideDetail.split("._.");


    if (document.body.clientWidth <= 992) {
       slideDetail = $(`.slide-car-item[data-index="${0}"] span`)[0].innerText
       slideDetail = slideDetail.split("._.");

    }
    let fullCarName = ''
    let i = 0

    $(".slide-car-name").text(slideDetail[0]);
     $("#shopee_link").attr('href',slideDetail[1]);
     $("#learnmore_link").attr('href',slideDetail[2]); 


    /*   let renderText = setInterval(() => {
        fullCarName += carName[i];
        $(".slide-car-name").text(carName);
        i++;
        if(i == carName.length){
          clearInterval(renderText)
        }
      }, 30); */

    setTimeout(() => {
      $(`.slide-car-item[data-index="${0}"]`)[0].classList.add("slide-car-model");
      $(`.slide-car-item[data-index="${0}"]`)[0].classList.remove(
        "slide-car-model-active"
      );

      $(`.slide-car-item[data-index="${0}"]`).remove();


      $(`.slide-car-item`).each((i, item) => {
        item.dataset.index =
          item.dataset.index == 0 ? slideItems - 1 : item.dataset.index - 1;
        item.style.zIndex = item.dataset.index;
      });



      $("#btn-next").prop("disabled", false);
      $("#btn-prev").prop("disabled", false);
    }, 500);
  });
</script>