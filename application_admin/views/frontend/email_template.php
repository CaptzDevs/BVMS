<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Title -->
    <title>Appointment </title>

</head>
<body>

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

        <section class="banner">
                <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                    <h2><?= $titleEng ?></h2>
                    <h2><?= $title ?></h2>
                    <hr width="100%">
                </div>
        </section>

        <?php
        $appointment_type = array('', "ทำนัดตรวจสุขภาพทั่วไป", 'ทำนัดตรวจสุขภาพบริษัทคู่สัญญา');
        $m_th_full = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม",);

        ?>
            <?php foreach ($appointmentData as $value) { ?>

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
                                            <label style="font-size: .6rem;opacity:50%"> #<?= $value['id'] ?></label>
                                            <label style="font-size: .6rem;opacity:50%">ชื่อผู้ทำการนัด </label>
                                            <h2> <?= $value['fname'] . ' ' . $value['lname'] ?></h2>


                                            <div style="font-size: .6rem;">
                                                <label style="opacity: 50%;">นัดเมื่อ : </label> <span> <?= $this->Control_model->fullDateTime($value['date_add']) ?></span>
                                            </div>

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
                                    <!-- main-contact-action -->
                                </div>
                                <div class="main-contact-info-body">
                                    <div class="media-list">
                                        <div class="media">
                                            <div class="media-body ">



                                                <div>
                                                    <label>ต้องการนัดวันที่</label> <span class="tx-medium"> <?= $this->Control_model->fullDateTime($value['appointment_date']) ?>
                                                        <?php if ($datetime1 <= $datetime2) { ?>
                                                            (อีก <?= $daysDiff ?> วัน)</span>
                                                <?php } ?>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-body">
                                                <div>
                                                    <label>รูปแบบการนัด : </label> <span class="tx-medium"> <?= $appointment_type[$value['appointment_section']] ?></span>
                                                </div>

                                                <div>
                                                    <label>ประเภทการนัด : </label>
                                                     <span class="tx-medium"> <?= $value['appointment_type'] != '0' ? $value['appointment_name'] : "อื่นๆ (".$value['appointment_type_other'].")"  ?></span>
                                                </div>

                                                <?php if($value['appointment_section'] == '2' ){ ?>

                                                <div>
                                                    <label>ชื่อบริษัท : </label> <span class="tx-medium"> <?= $value['company'] ?></span>
                                                </div>
                                                <?php } ?>

                                                
                                                <div>
                                                    <label>รายละเอียดเพิ่มเติม : </label> <span class="tx-medium"> <?= base_url("/Client/Card/").$value['user_id'].'/'.$value['id'] ?></span>
                                                </div>
                                      
                                                <div>
                                                    <label>เบอร์โทร : </label> <span class="tx-medium"> <?= $value['tel'] ?> </span>
                                                </div>
                                                <div>
                                                    <label>อีเมล : </label> <span class="tx-medium"><?= $value['email'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                      <!--   <div class="media">
                                            <div class="media-body">
                                                <div>
                                                    <?php
                                                    $db = explode('-', $value['birthdate']);

                                                    $db_set = array($db[2],$m_th_full[(int) $db[1]], ((int) $db[0]) + 543);

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
                                        </div> -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>



    </div>
</div>
</div>
<!--Main Content-->
    
</body>
</html>