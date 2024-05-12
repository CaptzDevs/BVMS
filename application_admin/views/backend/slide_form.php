<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

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
    .btn-delete-image , .btn-delete-file , .btn-edit-file{
        cursor: pointer;
    }
    .btn-delete-article{
        padding: 15px 10px;
        background: var(--red6);
        position: absolute;
        top: 10px;
        right: 10px;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        font-size: .8rem;

    }
    .btn-delete-article:hover{
        background: var(--red4);
    }
        .dropdown-toggle::after{
        display: none;
    }
</style>


<!--/main-header-->



<!--Main Content-->
<div class="main-content px-0 hor-content" style="margin-top: 100px;">
    <div class="container">
        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"></h3>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url("/Admin/Slides") ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Slide</li>
            </ol>
        </div>
        <!--Page Header-->

        <section class="banner">
            <!-- <img src="<?= base_url('/assets/img/svg/Checklist-pana.svg') ?>" alt=""> -->
            <div class="d-flex align-items-md-center align-items-center justify-content-center flex-column flex">
                <h2>Slide</h2>
                <h2><?= $edit ? "Edit Slide" : "Add New Slide" ?></h2>
        
            </div>
        </section>

        <!-- Calendar point -->

        <?php

        $slide_id = $edit ? $slideData['id'] : '';
        $slide_name = $edit ? $slideData['slide_name'] : '';
        $slide_name_eng = $edit ? $slideData['slide_name_eng'] : '';
        $description = $edit ? $slideData['description'] : '';
        $description_eng = $edit ? $slideData['description_eng'] : '';
        $shopee_link = $edit ? $slideData['shopee_link'] : '';

        ?>

        <div class="row row-sm form-appointment">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                   
                    <?php if($edit){ ?>
                        <div class="btn-delete-article" data-id="<?=$slide_id ?>"> 
                        Delete Slide 
                    </div>
                        <?php } ?>

                        <div class="main-content-label mg-b-5" style="font-size: 1rem;">
                            Slide Detail
                        </div>
                        <!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
                        <form class="mt-3 form-appointment" id="form_article" data-parsley-validate="" onsubmit="return false">
                            <div class="form-group ">

                                <div class="col-lg-12 col-md-12 px-0">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Slide Name <span class="tx-danger"></span></label>
                                        <input class="form-control" id="slide_name" name="slide_name" placeholder="Slide Name" required="" type="text" value="<?= $slide_name ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">

                                <div class="col-lg-12 col-md-12 px-0">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Slide Name [English] <span class="tx-danger"></span></label>
                                        <input class="form-control" id="slide_name_eng" name="slide_name_eng" placeholder="Slide Name [English]" required="" type="text" value="<?= $slide_name_eng ?>">
                                    </div>
                                </div>
                                </div>


                            <?php
                            $m_th_full = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                            $currentYear = date('Y');
                            $maxYear =  $currentYear;
                            $range = 80;

                            ?>
                 

                            <div class="row row-sm mb-3 d-none">
                                <div class="col-md-12">
                                    <label class="form-label">
                                        Description
                                    </label>
                                        <textarea id="summernote" name="description">
                                            <?= $description ?>
                                        </textarea>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label class="form-label">
                                        Description (English)
                                    </label>
                                        <textarea id="summernote_eng" name="description_eng">
                                            <?= $description_eng ?>
                                        </textarea>
                                </div>
                            </div>



                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Link Shop now<span class="tx-danger"></span></label>
                                        <input class="form-control" placeholder="Shopee Link " id="shopee_link" name="shopee_link"  value="<?= $shopee_link ?>" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Learn More Link<span class="tx-danger"></span></label>
                                        <input class="form-control" placeholder="Learn More Link" id="learnmore_link" name="learnmore_link"  value="<?= $shopee_link ?>" type="text">
                                    </div>
                                </div>
                            </div>
                            
                            

                            <?php if($edit){ ?>
                            <div class="col-12 d-flex justify-content-center py-5">
                                    <img style="width: 50%;" src="<?= base_url("/uploads/image/") . $slideData['image_url'] ?>" alt="">
                            </div>
                            <?php } ?>


                            <div class="row">
                                <div class="col-xl-12 col-sm-12">
                                    <div class="dropzone mb-2" id="dz-image">
                                        <div class="dz-message" data-dz-message><span>Add  Image <i class="fas fa-image"></i> <?= $edit ? "" : "" ?> </span></div>
                                    </div>

                                </div>
                            </div>


                            <hr style="width: 100%;">
                     

                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-main-primary btn-appointment" 
                                id="<?= $edit ? 'btn_edit_appointment' : 'btn_save_appointment' ?>" type="submit"><?= $edit ? "Save Edit Data" : 'Save Data' ?> </button>
                            </div>
                        </form>
                    </div>

                 <!--    <?php if (isset($articleImage) && count($articleImage) > 0) { ?>
                        <h3 class="px-4">Slide Image</h3>
                        <div class="row align-items-start justify-content-start px-3">
                                <?php foreach ($articleImage as $value) { ?>
                                <div class="col-xl-4" id="card-image-<?= $value['id'] ?>">
                                    <div class="card mg-b-20" >
                                        <div class="main-content-body main-content-body-contacts">
                                            <div class="main-contact-info-header m-0 px-1" style="padding-bottom: 10px;">
                                                <div class="media">

                                                    <div class="media-body px-3 px-lg-0" style="margin-left: 10px;">

                                                        <nav class="d-flex justify-content-between nav">
                                                            <div class="nav-link btn-delete-image" data-id="<?= $value['id'] ?>" ><i class="fas fa-ban"></i> Delete</div>
                                                           
                                                        </nav>
                                                        
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="main-contact-info-body">
                                                <div class="media-list">
                                                    <div class="media">
                                                        <div class="media-body ">

                                                            <img style="width: 50%;" src="<?= base_url("/uploads/image/") . $value['image_url'] ?>" alt="">

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                    <?php } ?> -->

                        <hr width="100%">


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