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


    .section-product{
    max-width: 1500px;
    padding: 10px ;
    background: var(--main-color);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    border-radius: 10px;
    padding-top: 20px;

}
.product{
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
.product:hover{
    filter: drop-shadow(10px 10px var(--main2-color));
  transition: .5s;

}
.product-image{
    width: 100%;
    height: 240px;
    background: #000;
    overflow: hidden;
    pointer-events: none;
}
.product-image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.product-label{
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
.product-label > *{
  overflow: hidden !important;

}
.product-price{
    color: var(--main2-color);
}
.product-price{
    color: var(--main2-color);
}
.product-more-btn{
  border: 1px solid rgba(255, 255, 255, 0);
  color:rgba(255, 255, 255, 0.588);
}
.product-more-btn:hover{
  border: 1px solid rgb(255, 255, 255);
  color:white;

}
.container-section{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;
    gap: 10px;
    padding-bottom: 40px;
}

.section-space{
        padding: 10px;
        background: var(--main-color); 
        color: rgb(255, 255, 255);
        font-size: .8rem;
    }
    .space-item{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 20px;
    }
    .space-text{
        text-align: center;
    }
    .space-icon{
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
    .contact-item{
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        
    }

    .contact-item:hover{
        background: #505050;
    }


    .section-contect .contact-item{
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 30px;
    }

    .section-contect .contact-item svg{
      padding: 20px;
      border-radius: 50%;
      background: rgb(56, 56, 56);
      pointer-events: none;
    }

    .section-contect .contact-item:hover{
        background: #505050;
    }



    .btn{
        user-select: all;
    }
    .btn::selection{
        background: none;
    }
  </style>
<?php 
    $label = '';
    $loadMoreProduct_text = '';
    $contact = '';

    if($LANG == 'en-EN' ){
      $label = "Map";
      $loadMoreProduct_text = 'Open With Google Map';
      $contact = 'Contact';

    }

    if($LANG == 'th-TH'){
      $label = "แผนที่";
      $loadMoreProduct_text = 'เปิดใน Google Map';
      $contact = 'ช่องทางการติดต่อ';


    }
 ?>
  <body>
    <main>
  
      <div class="container-section">
   
                     
        <section class="section-space mt-3">
            <div class="line"></div>
            <div class="space-item">
                <div class="space-icon"><i class="fa-solid fa-address-card"></i> </div>

                <h3><?= $contact ?></h3>
                <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories.   </div>
            </div>
            <div class="line"></div>
         
        </section>

        <section class="section-contect row px-0 px-sm-5 gap-3 gap-md-0 align-item-center justify-content-center">
            <div class="contact-item col-12 col-md-4 p-3 "><i class="mx-3 fa-brands fa-google"></i>buddymotor333@gmail.com</div>

            <a class="contact-item col-12 col-md-4 p-3" href="http://line.me/ti/p/~@buddymotor" target="_blank">
                    <i class="mx-3 fa-brands fa-line"></i>@buddymotor
            </a>

            <div class="contact-item col-12 col-md-4 p-3 "><i class="mx-3 fa-solid fa-phone"></i>+66 96-2763280 </div>
        </section>
        <div class="line"></div>

        <section class="section-space mt-3">
            
            <div class="space-item">
                <div class="space-icon"><i class="fa-solid fa-map"></i> </div>

                <h3><?= $label ?></h3>
                <div class="space-text">Buddymotor - Auto Parts, Lighting, and Accessories.   </div>
            </div>
            
         
        </section>


        <section>
        
                
        
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.050032353521!2d100.4856988!3d6.994942399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d2961e98d883f%3A0x5c11f61e65e4aa49!2z4LmA4Lie4Li34LmI4Lit4LiZ4Lib4Liy4Lij4LmM4LiV4Li14LmJIFdlZWQgU2hvcA!5e1!3m2!1sth!2sth!4v1701182565654!5m2!1sth!2sth"
              width="1500" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

         </section>


            
        <section class="section-space">
          <div class="f-center gap-2  p-3">
              <a href="https://maps.app.goo.gl/V6zonSJEoQoSPcp1A" target="_blank" class="btn mt-1 btn-discovery product-more-btn"> <?= $loadMoreProduct_text ?>  <i class="fa-solid fa-angle-right "></i></a>
          </div>
      </section>


    </div>


    </main>
  </body>

  <script>

    

    $(document).ready(function () {
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
