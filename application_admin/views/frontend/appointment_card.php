<style>
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
        flex-wrap: wrap;
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


    @media (max-width: 576px) {
        .banner img {
            width: 100%;
        }
    }

    .status-wait {
        background: var(--yellow4);
        border-radius: 5px;
    }

    .status-reject {
        background: var(--red4);
        border-radius: 5px;
    }

    .status-success {
        background: var(--green4);
        border-radius: 5px;
    }

    .btn-app-cancel,
    .btn-app-edit {
        border-radius: 5px;
    }

    select {
        cursor: pointer;
    }

    .lds-ring-login {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        .lds-ring-login div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 14px;
            height: 14px;
            margin: 8px !important;
            border: 5px solid #fff;
            border-radius: 50%;
            animation: lds-ring-login 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #fff transparent transparent transparent;
        }
        .btn-app-cancel {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-app-cancel i {
            pointer-events: none;
        }
        .btn-print-card {
            border-radius: 5px;
            background: var(--blue4);
            color: white;
            border: #fff 1px solid;
        }
        .after_header_print {
            display: none;
        }
        @page {
        size: A4;
        margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
            }
            .horizontal-main,.main-img-user, .datebeforapp , .status-list , .before_header_print , .main-footer
            {
                    display: none;
            }
            .after_header_print{
                display: block;
            }
        }
      
     
</style>


<!--/main-header-->



<!--Main Content-->
<div class="main-content px-0 hor-content">
    <div class="container">
        <!--Page Header-->
        <div class="page-header p-0">
            <h3 class="page-title"></h3>
            <ol class="breadcrumb mb-0">
                <!--      <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Appointment</li> -->
            </ol>
        </div>
        <!--Page Header-->
        <?php if ($_SESSION['role'] == '2') { ?>

            <section class="banner">
                <?php if (count($appointmentData) > 0) { ?>
                    <img src="<?= base_url('/assets/img/svg/appointment2.svg') ?>" alt="">
                    <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                        <h2>Appointment Card</h2>
                        <h2>บัตรนัด</h2>
                        <?php if (isset($appointment_id)) { ?>
                            <a href="<?= base_url('/Client/Card/') . $_SESSION['id'] ?>" class="menu-item mt-2" style="text-align: center;">ดูบัตรนัดทั้งหมด</a>
                        <?php } ?>
                        <hr width="100%">
                        <div class="menu-list ">
                            <a href="<?= base_url('/Client/form?type=general') ?>" class=" menu-item">ทำนัดตรวจสุขภาพทั่วไป</a>
                            <a href="<?= base_url('/Client/form?type=company') ?>" class=" menu-item">ทำนัดตรวจสุขภาพบริษัทคู่สัญญา</a>

                        </div>
                    </div>
                <?php } else { ?>
                    <img src="<?= base_url('/assets/img/svg/noAppointment.svg') ?>" alt="">
                    <div class="main-content-body main-content-body-contacts d-flex align-items-center justify-content-center flex-column p-5" style="gap: 20px;">
                        <h2>ยังไม่มีรายการนัด</h2>
                        <span>หรือรายการนัดนี้ถูกยกเลิกไปแล้ว</span>
                        <hr width="100%">
                        <div class="menu-list ">
                            <a href="<?= base_url('/Client/form?type=general') ?>" class=" menu-item">ทำนัดตรวจสุขภาพทั่วไป</a>
                            <a href="<?= base_url('/Client/form?type=company') ?>" class=" menu-item">ทำนัดตรวจสุขภาพบริษัทคู่สัญญา</a>
                           <!--  <a href="<?= base_url('/Client/Card/') . $_SESSION['id'] ?>" class="menu-item mt-2" style="text-align: center;">ดูบัตรนัดทั้งหมด</a> -->

                        </div>
                    </div>
                <?php } ?>


            </section>
        <?php } ?>


        <?php if ($_SESSION['role'] != '2') { ?>
            <section class="banner">
                <img src="<?= base_url('/assets/img/svg/appointment2.svg') ?>" alt="">
                <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                    <h2>Appointment Card</h2>
                    <h2 class="before_header_print" >ตรวจการนัด</h2>
                    <h2 class="after_header_print" >บัตรนัด</h2>

                    <hr width="100%">
                </div>
            </section>

        <?php } ?>

        <?php
        $appointment_type = array('', "ทำนัดตรวจสุขภาพทั่วไป", 'ทำนัดตรวจสุขภาพบริษัทคู่สัญญา');
        $m_th_full = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม",);

        ?>

        <?php if (count($appointmentData) > 0) { ?>

            <?php foreach ($appointmentData as $key => $value) { ?>

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-10">
                        <div class="card mg-b-20">
                            <div class="main-content-body main-content-body-contacts">
                                <div class="main-contact-info-header m-0 px-0" style="padding-bottom: 10px;">
                                    <div class="media">
                                        <!-- 	<div class="main-img-user">
											<img alt="" src="../../../assets/img/users/male/12.jpg"> <a href=""><i class="fas fa-camera"></i></a>
										</div> -->
                                        <div class="media-body px-3 px-lg-0">
                                            <?php if ($_SESSION['role'] == '2') { ?>
                                                <label style="font-size: .6rem;color:var(--yellow8)"> <?= $key == 0 ? "<i class='fas fa-star'></i> ล่าสุด" : '' ?> </label>
                                            <?php } ?>
                                            <label style="font-size: .6rem;opacity:50%"> #<?= $value['id'] ?></label>
                                            <!-- <label style="font-size: .6rem;opacity:50%">ชื่อผู้ทำการนัด </label> -->
                                            <h4> <?= $value['fname'] . ' ' . $value['lname'] ?></h4>


                                            <div style="font-size: .6rem;">
                                                <label style="opacity: 50%;">นัดเมื่อ : </label> <span> <?= $this->Control_model->fullDateTime($value['date_add']) ?></span>
                                            </div>


                                            <?php if ($value['appointment_status'] != '2') { ?>
                                                <?php $adminData = isset($value['admin_update']) ? $this->Control_model->getAdmin($value['admin_update']) : '' ?>

                                                <div style="font-size: .6rem;">
                                                    <label style="opacity: 50%;">ตรวจเมื่อ : </label> <span> <?= $this->Control_model->fullDateTime($value['admin_update_date']); ?></span>
                                                </div>
                                                <div style="font-size: .6rem; ">
                                                    <label style="opacity: 50%;">ตรวจโดย : </label> <span> <?= $adminData['admin_fname'] . ' ' . $adminData['admin_lname'] ?></span>
                                                </div>


                                            <?php } ?>

                                            <!-- 	<nav class="nav">
												<a class="nav-link" href=""><i class="fas fa-phone"></i> Call</a>
												<a class="nav-link" href=""><i class="far fa-comments"></i> Message</a>
												<a class="nav-link" href=""><i class="far fa-user"></i> Add to Group</a>
												<a class="nav-link" href=""><i class="fas fa-ban"></i> Block</a>
											</nav> -->
                                        </div>
                                    </div>
                                    <?php
                                    $statsArr = array('Reject', 'Appointment', 'Waiting');
                                    $statsArrColor = array('reject', 'success', 'wait');

                                    $today = date('Y-m-d h:i:s');

                                    $date2 = $value['appointment_date'];

                                    // Create DateTime objects for the two dates
                                    $datetime1 = new DateTime($today);
                                    $datetime2 = new DateTime($date2);

                                    // Calculate the difference between the two dates
                                    $interval = $datetime1->diff($datetime2);
                                    $daysDiff = $interval->days;

                                    ?>
                                    <div class="main-contact-action">

                                        <?php if ($_SESSION['role'] == '2') { ?>
                                            <a href="javascript:void(0)" data-id="<?= $value['id'] ?>" class="badge badge-light   status-<?= $statsArrColor[$value['appointment_status']] ?>">
                                                <i class="typcn typcn-document-text"></i> สถานะ : <?= $statsArr[$value['appointment_status']] ?>
                                            </a>
                                        <?php } else { ?>


                                            <select data-prev="<?= $value['appointment_status'] ?>" <?= $_SESSION['role'] == '2' ? 'disabled' : '' ?> data-id="<?= $value['id'] ?>" class="badge badge-light status-list status-<?= $statsArrColor[$value['appointment_status']] ?>">

                                                <?php foreach ($statsArr as $key => $val) {
                                                    $selected = '';
                                                    if ($key == $value['appointment_status']) $selected = 'selected';

                                                ?>
                                                    <option <?= $selected ?> value="<?= $key ?>">
                                                        <i class="typcn typcn-document-text"></i> สถานะ : <?= $val ?>
                                                    </option>
                                                <?php } ?>
                                            </select>


                                            <button class="btn-print-card badge badge-light status-list mx-2 px-2"> <i class="fas fa-print"></i> print </button>

                                        <?php } ?>


                                        <?php if ($_SESSION['role'] == '2') { ?>
                                            <?php if ($value['appointment_status'] == '2') { ?>
                                                <a href="<?= base_url("/Client/form/") . $value['id'] ?>" class="badge badge-light  btn-app-edit"><i class="typcn typcn-edit"></i> แก้ไขการนัด</a>
                                            <?php } ?>
                                            <?php if ($value['appointment_status'] == '2' && $daysDiff > 0) { ?>
                                                <a href="javascript:void(0)" class="badge badge-danger btn-app-cancel" data-id="<?= $value['id'] ?>"><i class="typcn typcn-trash"></i> ยกเลิกนัด </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <!-- main-contact-action -->
                                </div>
                                <div class="main-contact-info-body">
                                    <div class="media-list">
                                        <div class="media">
                                            <div class="media-body ">
                                                <div>
                                                    <label>ต้องการนัดวันที่</label> 

                                                    <div class="tx-medium"> <?= $this->Control_model->fullDateTime($value['appointment_date']) ?>
                                                    <?php if ($datetime1 <= $datetime2) { ?>
                                                        <b class="datebeforapp"> ( อีก <?= $daysDiff ?> วัน )</b>
                                                <?php } ?>
                                                
                                                </div>
                                                    

                                                </div>

                                            </div>
                                        </div>

                                        <div class="media">
                                            <div class="media-body">
                                                <div>
                                                    <label>รูปแบบการนัด</label> 
                                                    <span class="tx-medium"> 
                                                        <?= $appointment_type[$value['appointment_section']] ?> 
                                                </span>
                                                </div>
                                                <div>
                                                    <label>ประเภทการนัด</label>
                                                     <span class="tx-medium"> <?= $value['appointment_type'] != '0' ? $value['appointment_name'] : "อื่นๆ (".$value['appointment_type_other'].")"  ?></span>
                                                </div>
                                                <?php if($value['appointment_section'] == '2' ){ ?>

                                                <div>
                                                    <label>ชื่อบริษัท</label> <span class="tx-medium"> <?= $value['company'] ?></span>
                                                </div>
                                        <?php } ?>

                                            </div>
                                          
                                        </div>
                                        
                                        <?php if($value['appointment_section'] == '2' && strlen($value['sending_form']) > 0){ ?>
                                            <div class="media">
                                        <div class="media-body">
                                                <div>
                                                    <label>ไฟล์แนบ</label> 
                                                    <a target="_blank" href="<?= base_url("/uploads/file/").$value['sending_form'] ?>" class="tx-medium"> 
                                                        ใบส่งตัว
                                                    </a>
                                                </div>
                                            </div>

                                            </div>
                                        <?php } ?>
                                        <div class="media">
                                            <div class="media-body">
                                                <div>
                                                    <?php
                                                    $db = explode('-', $value['birthdate']);

                                                    $db_set = array($db[2],    $m_th_full[(int) $db[1]], ((int) $db[0]) + 543);

                                                    ?>
                                                    <label>เกิดเมื่อ</label> <span class="tx-medium"> <?= join(' / ', $db_set) ?> </span>
                                                </div>
                                                <div>
                                                    <label>เบอร์โทร</label> <span class="tx-medium"> <?= $value['tel'] ?> </span>
                                                </div>
                                                <div>
                                                    <label>อีเมล</label> <span class="tx-medium"><?= $value['email'] ?></span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>



    </div>
</div>
</div>

<!--Main Content-->