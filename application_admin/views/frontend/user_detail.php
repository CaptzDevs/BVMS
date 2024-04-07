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
        .banner {
            flex-wrap: wrap;
        }

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
        padding: 10px 20px;
        position: relative;
        font-size: .7rem;

    }

    .detail-error {
        background: #f15c5c46;
        border-left: 5px solid #f15c5cc7;
    }

    .detail-success {
        background: #5cf17246;
        border-left: 5px solid #5cf16dc7;
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
        padding: 20px;
        background: var(--blue5);
        border-radius: 10px;
        color: white;
        transition: .5s;
    }

    .menu-item:hover {
        color: white !important;
        text-decoration: none;
        filter: drop-shadow(5px 5px var(--blue7));
        transition: .5s;

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
                <li class="breadcrumb-item active" aria-current="page"> <?= $title ?></li>
            </ol>

        </div>
        <!--Page Header-->
        <?php
        function check_userData($type = NULL)
        {
            if (
                $_SESSION['fname'] &&
                $_SESSION['lname'] &&
                $_SESSION['tel'] &&
                $_SESSION['email'] &&
                $_SESSION['birthdate'][0] != '0'
            ) {
                return true;
            } else {
                return false;
            }
        }
        $checkUserData = check_userData();

        ?>

        <section class="banner">
            <img src="<?= base_url('/assets/img/svg/user-detail.svg') ?>" alt="">
            <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                <h2>User Detail</h2>
                <h2><?= $title ?></h2>


                <div class="appointment-detail <?= $checkUserData ? "detail-success" : "detail-error" ?>">
                    <div class="detail-border"></div>

                    <?php if (!$checkUserData) { ?>
                        <span>กรุณากรอกข้อมูลส่วนตัวให้ครบถ้วนทุกช่อง จึงสามารถทำนัดตรวจสุขภาพได้ </span>
                    <?php } else { ?>
                        <span>ข้อมูลส่วนตัวครบถ้วนแล้ว สามารถทำนัดตรวจสุขภาพได้ </span>
                        
                    <?php  } ?>

                    
                </div>
                <?php if ($checkUserData) { ?>
                <hr width="100%">
                        <div class="menu-list ">
                            <a href="<?= base_url('/Client/form?type=general') ?>" class=" menu-item">ทำนัดตรวจสุขภาพทั่วไป</a>
                            <a href="<?= base_url('/Client/form?type=company') ?>" class=" menu-item">ทำนัดตรวจสุขภาพบริษัทคู่สัญญา</a>

                        </div>
                    <?php  } ?>

            </div>
        </section>

        <!-- Calendar point -->
        <?php
        $m_th_full = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม",);
        $month_section_color = array("red6", "orange6", "yellow6", 'lime6', "green6", 'teal6', 'cyan6', "blue6", "indigo6", "violet6", 'purple', 'grape6');
        ?>



        <!-- Row -->
        <?php

        $prename = $edit ? $userData['prename'] : $_SESSION['pname'];
        $bd = $edit ? $userData['birthdate'] : $_SESSION['birthdate'];
        $bd  = explode('-', $bd);
        $fname = $edit ? $userData['fname'] : $_SESSION['fname'];
        $lname = $edit ? $userData['lname'] : $_SESSION['lname'];
        $email = $edit ? $userData['email'] : $_SESSION['email'];
        $tel = $edit ? $userData['tel'] : $_SESSION['tel'];

        $disabled = $edit ? '' : 'disabled';
        ?>
        <div class="row row-sm form-appointment align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5" style="font-size: 1rem;">
                            <?= $title ?>
                        </div>
                        <!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
                        <form class="mt-3 form-appointment " id="form_userDetail" data-parsley-validate="" onsubmit="return false">
                            <div class="row row-sm d-flex">
                                <?php $prenameArr = array("เด็กชาย", "เด็กหญิง", "นาย", "นาง", "นางสาว"); ?>

                                <?php if ($edit) { ?>
                                    <div class="col-lg-2 col-md-12 mt-3">

                                        <div class="form-group mb-0">
                                            <label class="form-label">คำนำหน้า <span class="tx-danger"></span></label>
                                            <div class="row">
                                                <div class="parsley-select col-lg-12 col-md-12" id="slWrapper-prename">
                                                    <select name="prename" class="form-control select2 select-nosearch" data-parsley-class-handler="#slWrapper-prename" data-parsley-errors-container="#slErrorContainer_prename" data-placeholder="วัน " required="">
                                                        <option value="-1" disabled selected> คำนำหน้า </option>
                                                        <?php

                                                        $selected = '';


                                                        foreach ($prenameArr as $key => $value) {
                                                            if ($key + 1 == $prename) {
                                                                $selected = 'selected';
                                                            } else {
                                                                $selected  = '';
                                                            }
                                                        ?>
                                                            <option <?= $selected ?> value="<?= $key + 1 ?>"> <?= $value ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                    <div id="slErrorContainer_prename"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-lg-5 col-md-12 mt-3">
                                    <div class="form-group mg-b-0">
                                        <label class="form-label">ชื่อ: <span class="tx-danger"></span></label>
                                        <input class="form-control" <?= $disabled  ?> name="fname" placeholder="ชื่อ" required="" type="text" value="<?= $edit ? $fname : $prenameArr[$prename] . ' ' . $fname ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">นามสกุล: <span class="tx-danger"></span></label>
                                        <input class="form-control" <?= $disabled  ?> name="lname" placeholder="นามสกุล" required="" type="text" value="<?= $lname ?>">
                                    </div>
                                </div>
                            </div>

                            <?php
                            $m_th_full = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                            $currentYear = date('Y');
                            $maxYear =  $currentYear - 10;
                            $range = 80;

                            ?>
                            <div class="row row-sm">
                                <div class="col-12 ">
                                    <div class="form-group ">
                                        <label class="form-label">วัน/เดือน/ปีเกิด <span class="tx-danger"></span></label>
                                        <div class="row  form-group-db">
                                            <div class="parsley-select col-lg-4 col-md-4" id="slWrapper-date">

                                                <select <?= $disabled  ?> name="db-date" id="db-date" class="form-control select2" data-parsley-class-handler="#slWrapper-date" data-parsley-errors-container="#slErrorContainer_date" data-placeholder="วัน " required="">
                                                    <option value="0" disabled selected> วัน </option>

                                                    <?php for ($i = 1; $i <= 31; $i++) {
                                                        $selected = '';
                                                        if ($i == (int) $bd[2]) {
                                                            $selected = 'selected';
                                                        }
                                                    ?>

                                                        <option <?= $selected ?> value="<?= $i ?>"> <?= $i ?> </option>

                                                    <?php } ?>
                                                </select>
                                                <div id="slErrorContainer_date"></div>
                                            </div>

                                            <div class="parsley-select col-lg-4 col-md-4" id="slWrapper-month">
                                                <select <?= $disabled  ?> name="db-month" id="db-month" class="form-control select2" data-parsley-class-handler="#slWrapper-month" data-parsley-errors-container="#slErrorContainer_month" data-placeholder="เดือน" required="">
                                                    <option value="0" disabled selected> เดือน </option>
                                                    <?php for ($i = 1; $i <= 12; $i++) {
                                                        $selected = '';

                                                        if ($i == (int) $bd[1]) {
                                                            $selected = 'selected';
                                                        }
                                                    ?>
                                                        ?>
                                                        <option <?= $selected ?> value="<?= $i ?>"> <?= $m_th_full[$i] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div id="slErrorContainer_month"></div>
                                            </div>

                                            <div class="parsley-select col-lg-4 col-md-4" id="slWrapper-year">
                                                <select <?= $disabled  ?> name="db-year" id="db-year" class="form-control select2" data-parsley-class-handler="#slWrapper-year" data-parsley-errors-container="#slErrorContainer_year" data-placeholder="ปี" required="">
                                                    <option value="0" disabled selected> ปี </option>
                                                    <?php for ($i = $maxYear; $i > $maxYear - $range; $i--) {
                                                        $selected = '';

                                                        if ($i == (int) $bd[0]) {
                                                            $selected = 'selected';
                                                        }
                                                    ?>
                                                        <option <?= $selected ?> value="<?= $i ?>"> <?= ((int) $i) + 543 ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div id="slErrorContainer_year"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">เบอร์โทร: <span class="tx-danger"></span></label>
                                        <input class="form-control" name="tel" id="tel" placeholder="000-000-0000" required="" type="text" value="<?= $tel ?>" <?= $disabled  ?>>
                                    </div>
                                </div>
                            </div>

                            <?php if ($_SESSION['register_type'] == '1') { ?>
                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">อีเมล: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="email" placeholder="อีเมล" required="" type="email" value="<?= $email ?>" <?= $disabled  ?>>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if ($edit && $_SESSION['register_type'] == '1') { ?>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">รหัสผ่าน: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="password" id="password" type="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">ยืนยันรหัสผ่าน: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="confirm-password" id="confirm-password" type="password" data-parsley-equalto="#form_userDetail input[name='password']">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <hr style="width: 100%;">
                            <input type="text" name="id" value="<?= $userData['id'] ?>" hidden>

                            <?php if ($edit) { ?>
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn btn-main-primary btn-appointment" id="btn_save_detail" type="submit">บันทึกข้อมูล</button>
                                </div>
                            <?php } ?>
                        </form>
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