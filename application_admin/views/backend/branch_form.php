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

    .btn-delete-image,
    .btn-delete-file,
    .btn-edit-file {
        cursor: pointer;
    }

    .btn-delete-article {
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

    .btn-delete-article:hover {
        background: var(--red4);
    }

    .dropdown-toggle::after {
        display: none;
    }
    #example2_length{
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
                <li class="breadcrumb-item"><a href="<?= base_url("admin.php/Admin/Branchs") ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Branch</li>
            </ol>
        </div>
        <!--Page Header-->

        <section class="banner">
            <!-- <img src="<?= base_url('/assets_admin/img/svg/Checklist-pana.svg') ?>" alt=""> -->
            <div class="d-flex align-items-md-center align-items-center justify-content-center flex-column flex">
                <h2>Branch</h2>
                <h2><?= $edit ? "Edit Branch" : "Add New Branch" ?></h2>

            </div>
        </section>

        <!-- Calendar point -->

        <?php

        $branch_id = $edit ? $productData['id'] : '';
        $branch_name = $edit ? $productData['branch_name'] : '';
        $description = $edit ? $productData['description'] : '';
        $location = $edit ? $productData['branch_location'] : '';
        $address = $edit ? $productData['branch_address'] : '';
        $image = $edit ? $productData['branch_image'] : '';


        ?>
<!-- Button trigger modal -->
    <?php if($edit){ ?>
        <div class=" w-100 d-flex align-items-end justify-content-end p-3">
            <button type="button" id="openModalCCTV" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add CCTV 
            </button>
        </div>
    <?php } ?>

    <!-- Modal -->
    <div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content " >
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CCTV </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <button id="checkAll" class=" float-right">Check/Uncheck All</button>
            <div class="table-responsive" id="tableData">
	
				</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary bg-black-7" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="saveBranchCCTV">Save changes</button>
        </div>
        </div>
    </div>
    </div>
        <div class="row row-sm form-appointment">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">

                        <?php if ($edit) { ?>
                            <div class="btn-delete-article" data-id="<?= $branch_id ?>">
                                Delete Branch
                            </div>
                        <?php } ?>

                        <div class="main-content-label mg-b-5" style="font-size: 1rem;">
                            Branch Detail
                        </div>
                        <!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
                        <form class="mt-3 form-appointment" id="form_article" data-parsley-validate="" onsubmit="return false">
                            <div class="form-group ">

                                <div class="col-lg-12 col-md-12 px-0">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">Branch Name <span class="tx-danger"></span></label>
                                        <input class="form-control" id="branch_name" name="branch_name" placeholder="Branch Name" required="" type="text" value="<?= $branch_name ?>">
                                    </div>
                                </div>
                            </div>



                            <?php
                            $m_th_full = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                            $currentYear = date('Y');
                            $maxYear =  $currentYear;
                            $range = 80;

                            ?>





                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Location ( Latitude Longitude ) <span class="tx-danger"></span></label>
                                        <input class="form-control" placeholder="Latitude Longitude"
                                         id="branch_location" name="branch_location" required="" value="<?= $location ?>" type="text">
                                    </div>
                                </div>

                            </div>

                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label"> Address <span class="tx-danger"></span></label>
                                        <input class="form-control" placeholder="Address"
                                         id="branch_address" name="branch_address" value="<?= $address ?>" type="text">
                                    </div>
                                </div>

                            </div>


                            <div class="row row-sm mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">
                                        Description
                                    </label>
                                    <textarea id="summernote" name="description">
                                            <?= $description ?>
                                        </textarea>
                                </div>

                            </div>

                            <!--    <a target="_blank" class="file_uploaded" href="<?= base_url("/uploads/file/") ?>">
                                     ดูใบส่งตัวที่อัพโหลด
                             </a> -->
                            <?php if (strlen($image) > 0) {

                            ?>
                                <label class="form-label">
                                    Branch Image
                                </label>
                                <div class="d-flex align-items-center justify-content-center border p-3 my-3 border-black rounded-10">
                                    <img class="rounded" width="200" src="<?= base_url("/uploads/image/") . $image ?>" alt="">
                                </div>

                            <?php } ?>
                            <div class="row">
                                <div class="col-xl-12 col-sm-12">
                                    <div class="dropzone mb-2" id="dz-image">
                                        <div class="dz-message" data-dz-message><span>Add Image <i class="fas fa-image"></i> <?= $edit ? "" : "" ?> </span></div>
                                    </div>

                                </div>
                                <div class="col-xl-6 col-sm-12 d-none">
                                    <div class="dropzone mb-2" id="dz-file">
                                        <div class="dz-message" data-dz-message><span>Add File <i class="far fa-file"></i> <?= $edit ? "" : "" ?> </span></div>
                                    </div>
                                </div>
                            </div>



                            <hr style="width: 100%;">


                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-main-primary btn-appointment" id="<?= $edit ? 'btn_edit_appointment' : 'btn_save_appointment' ?>" type="submit"><?= $edit ? "Save Edit Data" : 'Save Data' ?> </button>
                            </div>
                        </form>
                    </div>

                    <?php if (isset($articleImage) && count($articleImage) > 0) { ?>
                        <h3 class="px-4">Product Image</h3>
                        <div class="row align-items-start justify-content-start px-3">
                            <?php foreach ($articleImage as $value) { ?>
                                <div class="col-xl-4" id="card-image-<?= $value['id'] ?>">
                                    <div class="card mg-b-20">
                                        <div class="main-content-body main-content-body-contacts">
                                            <div class="main-contact-info-header m-0 px-1" style="padding-bottom: 10px;">
                                                <div class="media">

                                                    <div class="media-body px-3 px-lg-0" style="margin-left: 10px;">

                                                        <nav class="d-flex justify-content-between nav">
                                                            <div class="nav-link btn-delete-image" data-id="<?= $value['id'] ?>"><i class="fas fa-ban"></i> Delete</div>

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
                    <?php } ?>

                    <hr width="100%">

                    <?php if (isset($articleFile) && count($articleFile) > 0) { ?>

                        <h3 class="px-4">File</h3>
                        <div class="row align-items-start justify-content-start px-3">
                            <?php foreach ($articleFile as $value) { ?>
                                <div class="col-xl-4" id="card-file-<?= $value['id'] ?>">

                                    <div class="card mg-b-20">
                                        <div class="main-content-body main-content-body-contacts">
                                            <div class="main-contact-info-header m-0 px-1" style="padding-bottom: 10px;">
                                                <div class="media">

                                                    <div class="media-body px-3 px-lg-0">

                                                        <nav class="nav">
                                                            <div class="nav-link btn-delete-file" data-id="<?= $value['id'] ?>"><i class="fas fa-ban"></i> Delete</div>
                                                            <div class="nav-link btn-edit-file" data-id="<?= $value['id'] ?>"><i class="fas fa-pen"></i> Rename</div>

                                                        </nav>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="main-contact-info-body">
                                                <div class="media-list">
                                                    <div class="media">
                                                        <div class="media-body" style="overflow: hidden;">
                                                            <a style="font-size: .7rem; " target="_blank" href="<?= base_url("/uploads/file/") . $value['file_url'] ?>" alt="">
                                                                <div class="d-flex align-items-center justify-content-center" style="gap: 10px;">
                                                                    <i class="far fa-file"></i> :
                                                                    <div class="file-url" data-id="<?= $value['id'] ?>"> <?= strlen($value['file_name']) > 0 ?  $value['file_name'] : $value['file_url'] ?></div>
                                                                </div>
                                                            </a>
                                                            <input type="text" class="file-name d-none" data-id="<?= $value['id'] ?>" value="<?= strlen($value['file_name']) > 0 ?  $value['file_name'] : $value['file_url'] ?>">
                                                            <button class="file-name-save d-none" data-id="<?= $value['id'] ?>"> Save </button>
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