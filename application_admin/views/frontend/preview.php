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
    width: 300px;
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
    width: 100%;
    color: var(--main2-color);
    font-size: .5rem;
    text-align: center;
    padding: 0px 10px;
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

  @media screen and (max-width: 992px) {


    .banner-detail {
      width: 70%;
      font-size: 18px;
    }
  }
</style>

<?php 
    $label = '';
    $loadMoreProduct_text = '';
    if($LANG == 'en-EN' ){
      $label = "Review";
      $loadMoreProduct_text = 'Load More Product';
    }

    if($LANG == 'th-TH'){
      $label = "รีวิว";
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

    <div class="container-section">

      <section class="section-space mt-3">
        <div class="line"></div>
        <div class="space-item">
          <div class="space-icon"><i class="fa-solid fa-gear"></i> </div>

          <h3> <?= $label ?></h3>
          <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories. </div>
        </div>
        <div class="line"></div>

      </section>

      <section class="section-product position-relative">

        <?php foreach ($reviewList as $value) { ?>
          <div class="product">
            <a style="width: 100%" href="<?= base_url($LANG.'/preview/') . $value['id'] ?>">

              <div class="product-image">
                  <img src="<?= base_url('/uploads/image/') . $value['image_url'] ?>" alt="">
              </div>
              <div class="product-label">
                <h5><?= $value['review_name_eng'] ?></h5>

                <div class="line-sm"></div>
                <div class="product-price">
                  <span><?= $this->Control_model->fullDateNoTimeEn($value['create_date']) ?>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>

        <!--  <div class="product">
                <div class="product-image">
                 <img src="https://360view.3dmodels.org/zoom/Tools/Rim_1000_0001.jpg" alt="">
                </div>
                 <div class="product-label">
                     <p>Preview Wheel</p>
                 <div class="line-sm"></div>
                    <div class="product-price">
                       31/10/2023
                    </div>
                 </div>
             </div>

             <div class="product">
                <div class="product-image">
                 <img src="https://360view.3dmodels.org/zoom/Tools/Rim_1000_0001.jpg" alt="">
                </div>
                 <div class="product-label">
                     <p>Preview Wheel</p>
                 <div class="line-sm"></div>
                    <div class="product-price">
                       31/10/2023
                    </div>
                 </div>
             </div>

             <div class="product">
                <div class="product-image">
                 <img src="https://360view.3dmodels.org/zoom/Tools/Rim_1000_0001.jpg" alt="">
                </div>
                 <div class="product-label">
                     <p>Spare Part</p>
                 <div class="line-sm"></div>
                    <div class="product-price">
                        3,000 ฿ 
                    </div>
                 </div>
             </div> -->

      </section>




      <section class="section-space">

        <div class="f-center gap-2  p-3">
          <div class="btn mt-1 btn-discovery product-more-btn">See Other Preview <i class="fa-solid fa-angle-right "></i></div>
        </div>
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