<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/switchery/dist/switchery.css" />

<!-- Quill css -->
<link href="<?= base_url() ?>assets/plugins/quill/quill.snow.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/plugins/quill/quill.bubble.css" rel="stylesheet">
<style>
    html {
        scroll-behavior: smooth;
    }

    .form-label {
        font-size: .8rem;

    }

    .btn-appointment {
        width: 100%;
        min-height: 50px;
        border-radius: 10px;
        padding: 0px 20px;
    }

    .btn-appointment-date {
        width: 100%;
        height: 38px;
        border-radius: 10px;
        padding: 0px 20px;
        border: none;
        background: var(--blue6);
        color: white;
    }

    .btn-appointment-date:hover {
        filter: drop-shadow(5px 5px var(--blue4));
    }

    .banner {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        padding: 20px;
    }

    .banner img {
        width: 50%;

    }

    @media (max-width: 576px) {
        .banner h1 {
            font-size: 1.5rem;
        }
    }

    @media (min-width: 992px) {
        .main-content {
            padding: 30px 0;
            padding-bottom: 20px;
            margin-top: 50px;
        }
    }

    img {
        pointer-events: none;
        user-select: none;
    }
</style>
<style>
    /* calendar point */
    .calendar-points {
        /*   width: 110%; */
        width: 100%;
        /*  max-width: 715px; */
        min-width: 250px;
        height: auto;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        flex-wrap: wrap;
        gap: 10px;
        padding-top: 10px;
    }

    .section-year {
        width: 100%;
        padding: 10px;
        height: auto;
        border-radius: 10px;
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 10px;


    }

    .calen-day {
        min-width: 140px;
        min-height: 70px;
        background: rgb(108, 108, 108);
        border-radius: 5px;
        font-size: .65rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 0px;
        cursor: pointer;
        transition: .5s;
        color: white;

    }

    .calen-day span {
        pointer-events: none;
        user-select: none;
    }

    .calen-day:hover {
        transition: .5s;
        /* background: rgba(52, 52, 52, 0.234) !important; */
        filter: drop-shadow(5px 5px rgb(47, 47, 47));
    }

    .color-none {
        transition: .5s;
        background: rgb(38, 38, 38) !important;
        color: rgba(255, 255, 255, 0.249);
        opacity: 10%;
        pointer-events: none;

    }

    .disabled-select-before {
        pointer-events: none;
        background: rgba(77, 77, 77, 0.514) !important;
    }

    .disabled-select {
        pointer-events: none;
        background: rgba(163, 163, 163, 0.514) !important;
        background: rgb(0, 0, 0) !important;
        opacity: 10%;
        color: rgba(255, 255, 255, 0.249);
        display: none;

    }

    .disabled-fix {
        pointer-events: none;
        background: rgba(163, 163, 163, 0.514) !important;
        background: rgb(242, 23, 23) !important;
        opacity: 70%;
        color: rgb(255, 255, 255);

    }

    .selected-date {
        transition: .5s;
        background: rgb(70, 70, 70) !important;
        /*  color: rgba(255, 255, 255, 0.249); */
        outline: 1px solid rgb(21, 106, 242);
        outline-offset: 5px;

    }

    .start-date-hl {
        background: rgb(154, 154, 154) !important;
        color: black;
    }

    .end-date-hl {
        background: var(--gray-300) !important;
        color: black;

    }

    #form_calendar {
        margin-top: 10px;
        padding: 10px;
        /*  background: rgb(26, 26, 26); */
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-direction: column;
        overflow: auto;
        overflow-x: hidden;
        /* filter: drop-shadow(10px 10px rgb(17, 17, 17)); */
        /* padding: 50px; */
        padding-bottom: 10px;
        margin-bottom: 150px;
    }

    .form-footer {
        width: 100%;
        position: sticky;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 5px;

    }

    .form-footer-btn {
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border: none;
        outline: none;
        background: var(--blue6);

        color: white;
    }

    .form-footer-btn:hover {

        filter: drop-shadow(5px 5px var(--blue4));
        color: white;
    }

    .form-footer-btn:disabled {
        background: rgba(44, 44, 44, 0.371);

    }

    .month-label-warper {
        width: 100%;
    }

    .month-label-section {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 5px;
        padding: 10px;
        cursor: pointer;
    }

    .month-label-color {
        width: 10px;
        height: 10px;
        pointer-events: none;
        border-radius: 10px;
    }

    .month-label-name {
        font-size: .5rem;
        pointer-events: none;

    }

    .hl-month {
        background: rgb(208, 208, 208) !important;
        transition: .5s;
        border-radius: 5px;
    }

    #btn_appointment_cancel:hover {
        filter: drop-shadow(5px 5px var(--red4)) !important;
    }

    @media (max-width: 992px) {
        .month-label-warper {
            width: 100%;
            gap: 5px;
        }

        .month-label-section {
            width: 100%;
            border: 1px solid black;
            padding: 10px;
            border-radius: 10px;
        }

        .month-label-color {
            width: 20px;
            height: 20px;
            pointer-events: none;
        }

        .month-label-name {
            font-size: .5rem;
            pointer-events: none;

        }



    }

    @media (max-width: 576px) {
        .banner {
            flex-wrap: wrap;
        }

        .calen-day {
            min-width: 105px;
            min-height: 50px;
        }

        .month-label-warper {
            width: 100%;
            gap: 5px;
        }

        .month-label-section {
            width: 100%;
            border: 1px solid black;
            padding: 10px;
            border-radius: 10px;
        }

        .month-label-color {
            width: 20px;
            height: 20px;
            pointer-events: none;
        }

        .month-label-name {
            font-size: 1rem;
            pointer-events: none;

        }

        .calen-day:hover {
            filter: drop-shadow(0px 0px rgb(47, 47, 47));

        }


        .selected-date {
            transition: .5s;
            background: rgb(47, 47, 47) !important;
            /*  color: rgba(255, 255, 255, 0.249); */
            outline: 0px solid rgb(21, 106, 242);
            outline-offset: 0px;

        }


    }

    .select2-container {
        width: 100% !important;
    }

    .form-group-db {
        row-gap: 10px;
    }

    .limitQueue {
        background: gray !important;
        opacity: 50%;
        pointer-events: none;
    }

    .limitQueue .queue-num {
        text-decoration: underline;
        font-weight: bold;
    }

    .appointment-detail {
        width: 100%;
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        flex-direction: column;
        padding: 20px;
        position: relative;
    }

    .detail-border {
        position: absolute;
        top: 15px;
        left: 0;
        width: 100%;
        height: 35px;
        background: #5c74f146;
        border-left: 5px solid #5c75f1c7;
    }

    .menu-list {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
    }

    .menu-item {
        width: 100%;
        padding: 10px;
        background: var(--blue5);
        border-radius: 10px;
        color: white;
        transition: .5s;
        font-size: .8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .menu-item:hover {
        color: white !important;
        text-decoration: none;
        filter: drop-shadow(5px 5px var(--blue7));
        transition: .5s;

    }

    .dropzone {
        border-radius: 10px;
    }

    .dropzone:hover {
        transition: .5s;
        filter: drop-shadow(10px 10px var(--blue4));
    }

    .file_uploaded {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border-left: 3px solid var(--blue4);
        padding: 10px;
        margin: 10px 0px;
    }

    .file_uploaded:hover {
        background: var(--blue6);
        border-radius: 10px;
        color: white;
    }
    .lbl-category{
        padding: 15px 10px;
        background: var(--blue4);
        position: absolute;
        top: 0;
        right: 0;
        color: white;
        border-bottom-left-radius: 5px;
    }
    .main-content-label{
        padding : 10px 5px;
        border-left: 5px solid black;
        margin-bottom: 20px;
        padding-bottom: 30px;
    }
    .date-create{
        margin-top: -45px;
        margin-left: 15px;
        margin-bottom: 20px;
    }
    .container-description p{
        margin-bottom: 0px;
    }
    .btn-description-copy{
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 10px;
        border: 1px solid black;
        border-radius: 10px;
        cursor: pointer;
}
    .btn-description-copy:hover{
        background: #000;
        color: white;
    }
</style>


<!--/main-header-->



<!--Main Content-->
<div class="main-content px-0 hor-content">
    <div class="container">
        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"></h3>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url("/Client") ?>">หน้าหลัก</a></li>
                <li class="breadcrumb-item active" aria-current="page">บทความ</li>
            </ol>
        </div>
        <!--Page Header-->

        <section class="banner">
            <img src="<?= base_url('/assets/img/svg/Checklist-pana.svg') ?>" alt="">
            <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                <h2>Article</h2>
                <h2><?= $articleData['article_name'] ?></h2>
                <!--  <div class="menu-list">

                    <?php if ($appointment_section == '1' && $edit == '0') { ?>
                        <a href="<?= base_url('/Client/Form?type=company') ?>" class="menu-item">เปลี่ยนไปทำนัดตรวจสุขภาพบริษัทคู่สัญญา <i class="fas fa-reply"></i> </a>
                        <?php } ?>
                    <?php if ($appointment_section == '2' && $edit == '0') { ?>
                    <a href="<?= base_url('/Client/Form?type=general') ?>" class="menu-item">เปลี่ยนไปทำนัดตรวจสุขภาพทั่วไป<i class="fas fa-reply"></i> </a>
                    <?php } ?>
                </div> -->


                <!--   <div class="appointment-detail">
                        <div class="detail-border"></div>
                    <span class="mb-2">เงื่อนไขการทำนัด</span>
                        <ul>
                            <li> ลูกค้าจะต้องทำการนัดล่วงหน้า 1 วัน</li>
                            <li> ในแต่ละวันสามารถรองรับการนัดได้เพียง 30 ราย โดยดูได้จาก<br>ปฎิทินในแต่ละวันจะมีตัวเลขระบุไว้ เช่น 5/30 แสดงว่ามีการนัดแล้ว 5 ราย</li>
                            <li> การยกเลิกการนัดจะต้องยกเลิกอย่างน้อย 1 วันก่อนถึงวันนัด</li>
                        </ul>
                    </div> -->
            </div>
        </section>

        <!-- Calendar point -->
        <?php
        $month_section_color = array("red6", "orange6", "yellow6", 'lime6', "green6", 'teal6', 'cyan6', "blue6", "indigo6", "violet6", 'purple', 'grape6');

        $bd = $edit ? $articleData['expire_date'] : '';
        $bd  = explode(' ', $bd);
        $bd  = explode('-', $bd[0]);

        $article_name = $edit ? $articleData['article_name'] : '';
        $description = $edit ? $articleData['description'] : '';
        $price = $edit ? $articleData['price'] : '';

            $currentYear = date('Y');
            $maxYear =  $currentYear;
            $range = 80;

            $current_date = new DateTime();
            $get_date = explode(' ',$articleData['expire_date']);
            $end_date = new DateTime(	$get_date[0] );
            
            // Calculate the difference between the two dates
            $interval = $current_date->diff($end_date);
            
            // Get the remaining days as an integer
            $remaining_days = $interval->days+1;
          


        ?>
        <div class="row row-sm form-appointment">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                    <div class="lbl-category"> 
                    <?php foreach ($categoryListData as $value) {
                           if ($value['id'] == $articleData['category_id']) {echo  $value['category_name'] ;}
                       ?>
                       <?php } ?>
                    </div>
                        <h1 class="main-content-label mg-b-5" >
                            <?= $articleData['article_name']  ?>
                        </h1>
                        <div class="date-create"><?= $this->Control_model->fullDateNoTime($articleData['create_date']) ?></div>
                        <p class="mg-b-20">ตั้งแต่วันนี้ถึง 
                        <span style="color:var(--blue8);text-decoration:underline"><?= $this->Control_model->fullDateNoTime($articleData['expire_date']) ?> </span> 
                        <br>
                        <span style="font-size: .7rem;"> (  <?= "อีก ".$remaining_days." วัน" ?> )</span> </p>

                        <div class="row row-sm">
                                <div class="col-12" >
                                       ราคา : <span style="color:var(--yellow8)"> <?= number_format($articleData['price'] , 2, '.', "");  ?> ฿</span>
                                </div>
                        </div>

                        <form class="mt-3 form-appointment" id="form_article" data-parsley-validate="" onsubmit="return false">
                            <hr style="width: 100%;">
                            <div class="row row-sm mb-3">
                                <div class="col-md-12">
                                    <div class="btn-description-copy">
                                        คัดลอก
                                    </div>
                                    <h3>
                                        รายละเอียด
                                    </h3>
                                    <div class="container-description">
                                        <?= $articleData['description'] ?>
                                    </div>

                                </div>
                            </div>


                            <hr style="width: 100%;">
                        </form>
                    </div>

                    <?php if (isset($articleImage) && count($articleImage) > 0) { ?>

                        
                        <div class="row align-items-start justify-content-start px-3">
                                <?php foreach ($articleImage as $value) { ?>
                                <div class="col-xl-4">
                                    <div class="card mg-b-20">
                                        <div class="main-content-body main-content-body-contacts">
                                            <div class="main-contact-info-body">
                                                <div class="media-list">
                                                    <a target="_blank" href="<?= base_url("/uploads/image/") . $value['image_url'] ?>">
                                                    <div class="media">
                                                        <div class="media-body ">
                                                            <img style="max-width: 80%;" src="<?= base_url("/uploads/image/") . $value['image_url'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                </a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                                <?php } ?>
                            </div>
                    <?php } ?>

                        <hr width="100%">

                        <?php if (isset($articleFile) && count($articleFile) > 0) { ?>

                        
                        <div class="row align-items-start justify-content-start px-3">
                                <?php foreach ($articleFile as $value) { ?>
                                <div class="col-xl-12">
                                    <div class="card mg-b-20">
                                        <div class="main-content-body main-content-body-contacts">
                                            <div class="main-contact-info-body" >
                                                <div class="media-list">
                                                    <div class="media mb-0">
                                                        <div class="media-body" style="overflow: hidden;" >
                                                            <a  style="font-size: .7rem; " target="_blank" href="<?= base_url("/uploads/file/") . $value['file_url'] ?>" alt="">
                                                            <i class="far fa-file"></i>  :  <?= $value['file_url'] ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!--/Row-->






</div>
</div>
</div>
<!--Main Content-->

<!--footer-->