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

  .banner-detail {
    opacity: 0%;
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
    height: 0%;
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

  }


  .product-image {
    width: 100%;
    height: 240px;
    background: #000;
    overflow: hidden;
    pointer-events: none;
  }

  .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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


  a {
    color: white;
  }

  .section-article {
    max-width: 1400px;

  }

  .section-article img {
    width: 100%;
    height: 100%;
    max-height: 300px;
    object-fit: contain;
  }

  @media screen and (max-width: 992px) {


    .banner-detail {
      width: 70%;
      font-size: 18px;
    }
  }

  .section-social {
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

  .social-image-container {
    width: 100px !important;
    height: 100px !important;
  }

  @media screen and (max-width: 692px) {
    .section-social {
      flex-wrap: wrap;
    }
  }

  .about-label{
    border-left: 1px solid white;
    padding-left: 10px;
    font-size: 1rem;
    margin-bottom: 10px;
  }
  .about-text{
    font-size: .8rem;
  }
</style>
<?php
$label = '';
$loadMoreProduct_text = '';
if ($LANG == 'en-EN') {
  $label = "About Us";
  $loadMoreProduct_text = 'Load More Product';
}

if ($LANG == 'th-TH') {
  $label = "เกี่ยวกับเรา";
  $loadMoreProduct_text = 'ดูสินค้าเพิ่มเติม';
}
?>

<body>
  <main>
    <section class="section-banner">
      <div class="banner-cover">
        <h1 class="banner-header"><?= $label ?></h1>
        <p class="banner-detail">
        Buddymotor - Auto Parts, Lighting, and Accessories.
        </p>
      </div>
      <div class="banner-media">
        <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
      </div>
    </section>

    <div class="container-section pb-0">

      <section class="section-space mt-3">
        <div class="line"></div>
        <div class="space-item">
          <div class="space-icon"><i class="fa-solid fa-gear"></i> </div>

          <h3><?= $label ?> ( BUDDYMOTOR )</h3>
          <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories. </div>
        </div>
        <div class="line"></div>

      </section>

    </div>
    <section class="section-article row d-flex align-items-start px-3 px-md-5 mb-3 " style="border-bottom: 1px solid rgba(255, 255, 255, 0.504); padding-bottom : 150px ">
      <div class="col-lg-12 col-md-12">
        <img src="<?= base_url('assets/img/LOGO-buddymotor.png') ?>" alt="" />
      </div>
      <div class="col-lg-12 col-md-12">

        <h3>BUDDYMOTOR</h3>
        Buddymotor - Auto Parts, Lighting, and accessories
        <div class="about-text">
          
        <br><br>
        <div class="about-label"> About Us: </div>
          Established in 1993, Buddymotor is a trusted partner of Motorzoom Indonesia, a pioneer in crafting high-quality auto parts, lighting, and accessories for the automotive industry in Southeast Asia. With nearly three decades of experience, we've become a leading provider of top-notch products and exceptional service.
        <br><br>
        <div class="about-label"> Our Expertise: </div>
          With almost 30 years in the industry, Buddymotor has been a forefront manufacturer of car parts for various vehicles. We supply original parts to esteemed automotive companies like Wu-Ling Motors, UD Trucks, and Honda in Indonesia, solidifying our reputation as a reliable manufacturer.
        <br><br>
        <div class="about-label"> Our Mission: </div>
          We're dedicated to enhancing driving experiences by offering high-quality auto parts, innovative lighting, and stylish accessories. Our goal is to provide products that improve vehicle performance and overall driving satisfaction.
        <br><br>
        <div class="about-label"> Our Vision: </div>
          We aspire to be the top automotive solutions provider in Southeast Asia, known for cutting-edge products, outstanding customer service, and unwavering commitment to quality. We continuously innovate and expand our offerings to become the preferred choice for auto enthusiasts and businesses.
        <br><br>
        <div class="about-label"> Why Choose Us: </div>
          - Quality Assurance: With over 28 years of experience, we guarantee superior product quality and performance.<br>
          - Customer-Centric Approach: Our dedicated team provides personalized service, prompt responses, and expert advice.<br>
          - Competitive Pricing: We offer competitive prices without compromising on quality, ensuring excellent value for money.<br>
          - Timely Delivery: Our efficient manufacturing and logistics guarantee timely product delivery.
          
        </div>
      </div>

      </div>

    </section>

    <!--   <div class="col-md-12 col-lg-4 mt-sm-2 mt-md-0 footer-section-1">

      <h4 class="overflow-hidden">
        <img src="<?= base_url('assets/img/LOGO-buddymotor.png') ?>" alt="" /> BuddyMotor
      </h4>
      <span style="font-size: 0.6rem">

        Buddymotor - Auto Parts, Lighting, and Accessories
        About Us:
        Established in 1993, Buddymotor is a trusted partner of Motorzoom Indonesia,
        a pioneer in crafting high-quality auto parts, lighting, and accessories for the automotive industry in Southeast Asia.
        With nearly three decades of experience, we've become a leading provider of top-notch products and exceptional service.


      </span>

    </div> -->

    <div class="px-3 py-5">


      <a href="http://line.me/ti/p/~@buddymotor" target="_blank">
        <div class="btn text-white mt-1">
          <i class="fa-brands fa-line"></i> Line : @buddymotor
        </div>
      </a>
      <div class="btn text-white mt-1 contact-item">
        <i class="fa-solid fa-phone"></i> Tel : +66 96-2763280 
      </div>

      <div class="btn text-white mt-1 contact-item">
        <i class="fa-brands fa-google"></i> Mail : buddymotor333@gmail.com
      </div>
    </div>
<!--     <div class="container-section">
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