<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/root.css') ?>" />
    
  <script src="<?= base_url("/assets/fontawesome/all.min.js") ?>"></script>

  </head>
  <style>
    ::-webkit-scrollbar {
      width: 10px;
      height: 10px;
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
    html {
      overflow: hidden;
    }
    body {
      overflow-x: hidden;
      background: var(--main-color);
      min-height: 100vh;
      gap: 150px;
      transition: height 0s;
      position: relative;
      color: white;
    }

    header {
      width: 100%;
      height: 55px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      user-select: none;
      padding: 0px 10px;
      background: #232323;
    }

    main {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      flex: 1 0 auto;
    }
    nav {
      width: 200px;
      margin-top: 10px;
      padding: 10px;
      background: #202020;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
    }
    section {
      border-radius: 10px;
      margin-bottom: 30px;
      
    }
    a{
        color: white;
    }

    .content {
      width: 100%;
      max-width: 1400px;
      height: 90vh;
      margin-top: 10px;
      padding: 0px 10px;
      padding-bottom: 0px;
      padding-bottom: 30px;
      gap: 10px;
      position: relative;
    }

    footer {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      font-size: .8rem;
    }

    .banner {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid rgba(255, 255, 255, 0.418);
      border-radius: 5px;
      padding: 30px;
    }
    .banner-1 {
      width: 30%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 40px;
    }
    
    .banner-2 {
      width: 60%;
      height: 100%;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      flex-direction: column;
      gap: 20px;
      font-size: 0.8rem;
      overflow: visible;
    }
    .banner-2 h1{
      font-size : 1.3rem;
    }
    img {
      width: 100%;
      height: 100%;
      max-width: 300px;
      height: 300px;
      object-fit: contain;
    }
    .overview-status {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .overview-status-item {
      width: 100%;
      background: #1e1e1e;
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
      flex-direction: column;
      padding: 20px 15px;
      border-radius: 10px;
      gap: 10px;
    }

    .overview-status-item label {
      width: 100%;
      overflow: hidden;
    }

    .overview-status-item-detail {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-radius: 10px;
    }

    .btn-map{
      width: 100%;
      height: 50px;
      background: var(--green8);
      border: 1px solid rgba(255, 255, 255, 0.418);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: .5s;
      cursor: pointer;
    }
    
    .btn-map:hover{
      filter: drop-shadow(10px 10px var(--green4));
      transition: .5s;

    }

    .status-online-circle {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: var(--green4);
    }
    .service{
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
    .service-item{
      width: 100%;
      height: 150px;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      flex-direction: column;
      gap: 10px;
      padding: 10px 20px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.418);
      
    }
    .service-item label {
      font-size: .8rem;
      
    }

    .service-item svg{
      padding-right: 10px;
    }
    

    .service-description{
        font-size: .6rem;
        opacity: 80%;
    }

    .map {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid rgba(255, 255, 255, 0.418);

    }

  </style>
  <body>
    <header>BVMS</header>
    <main>
      <nav style="font-size: .8rem;">
        <i class="fa-solid fa-camera-cctv"></i>
        Dashboard
      </nav>
      <section class="content">
        <section class="banner">
          <div class="banner-1">
            <img src="<?= base_url('/assets/img/Design stats.gif') ?>" alt="" />
          </div>
          <div class="banner-2">
            <h1>Bosch Video Management System (BVMS) </h1>
            <span>
              Modular and resilient security system that aggregates and delivers
              consolidated data to security operators in a structured and
              efficient manner.
            </span>
            <div class="overview-status">
              <div class="overview-status-item">
                <label>Http</label>
                <div class="overview-status-item-detail">
                  <div class="status-online-circle"></div>
                  <div><span class="http"></span> / <span class="http_total"></span> unit</div>
                </div>
              </div>
              <div class="overview-status-item">
                <label>Https</label>
                <div class="overview-status-item-detail">
                  <div class="status-online-circle"></div>
                  <div><span class="https"></span> / <span class="https_total"></span> unit</div>
                </div>
              </div>

              <div class="overview-status-item">
                <label>All</label>
                <div class="overview-status-item-detail">
                  <div class="status-online-circle"></div>
                  <div><span class="available_total"></span> / <span class="cctv_total"></span> unit</div>
                </div>
              </div>
            </div>
            <a href="<?= base_url('/Dashboard/map')  ?>" class="btn-map"> View Map </a>
          </div>
        </section>

        <section class="service">
          <div class="service-item">
              <label> 
              <i class="fa-solid fa-map-location-dot"></i>
                <span> Interactive map </span>
            </label>
            <div class="service-description">
              <div> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa necessitatibus  </div>
            </div>
          </div>

          <div class="service-item">
            <label> 
              <i class="fa-solid fa-code-branch"></i>
              <span> Branch Management </span>
          </label>
          <div class="service-description">
            <div> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa necessitatibus  </div>
          </div>
        </div>

        <div class="service-item">
          <label> 
          <i class="fa-solid fa-camera-cctv"></i>
            <span> CCTV Report </span>
        </label>
        <div class="service-description">
          <div> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa necessitatibus  </div>
        </div>
      </div>

        </section>
   
        <section class="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16692.671207364867!2d100.48495670312657!3d6.999456705540803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d28337b1e9d09%3A0xdc67358676705908!2z4LmA4LiL4LmH4LiZ4LiX4Lij4Lix4LilIOC4q-C4suC4lOC5g-C4q-C4jeC5iA!5e1!3m2!1sth!2sth!4v1710699442974!5m2!1sth!2sth"
            width="1400"
            height="650"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </section>

        <footer>Copyright © 2024 - Developed by ME-FI.com</footer>
      </section>
      <!-- Content -->
    </main>
  </body>
  
  <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
</html>
