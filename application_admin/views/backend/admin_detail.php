

    <style>
        .form-label {
            font-size: .8rem;

        }
        .btn-appointment{
            width: 100%;
            min-height: 50px;
            border-radius: 10px;
            padding: 0px 20px;
        }

        .btn-appointment-date{
            width: 100%;
            height: 38px;
            border-radius: 10px;
            padding: 0px 20px;
            border: none;
            background: var(--blue6);
            color: white;
        }

        .btn-appointment-date:hover{
            filter: drop-shadow(5px 5px var(--blue4)) ;
        }
        .banner{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 20px;
            flex-wrap: wrap;
        }
     
        .banner img{
            width: 50%;

        }
        @media (max-width: 576px) {
            .banner h1{
            font-size: 1.5rem;
        }
         }

        @media (min-width: 992px){
            .main-content {
                padding: 30px 0;
                padding-bottom: 20px;
                margin-top: 50px;
            }
        }
        
        img{
            pointer-events: none;
            user-select: none;
        }

        .menu-list{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 10px;
        }
        .menu-item{
            width: 100%;
            padding: 20px;
            background: var(--blue5);
            border-radius: 10px;
            color: white;
            transition: .5s;
        }
        .menu-item:hover{
            color: white !important;
            text-decoration: none;
            filter: drop-shadow(5px 5px var(--blue7));
            transition: .5s;

        }


      @media (max-width: 576px) {
        .banner img{
            width: 100%;
        }
    }

    .status-wait{ 
        background: var(--yellow4); 
        border-radius: 5px; 
    }

    .status-reject{ 
        background: var(--red4); 
        border-radius: 5px; 
    }

    .status-success{ 
        background: var(--green4); 
        border-radius: 5px; 
    }
    .btn-app-cancel ,.btn-app-edit{
        border-radius: 5px;
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
    .btn-delete-admin{
        border: 1px solid black;
    }
    .btn-delete-admin i{
        pointer-events: none;
    }
    .btn-edit{
        background: var(--blue4);
        border-radius:5px;
    }
    .btn-edit:hover{
        background: var(--blue6);
    }
    </style>


    <!--/main-header-->



    <!--Main Content-->
    <div class="main-content px-0 hor-content" style="margin-top: 120px !important;">
        <div class="container">
            <!--Page Header-->
            <div class="page-header p-0">
                <h3 class="page-title"></h3>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin.php/Admin/AdminList') ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Detail</li>
                </ol>
            </div>
            <!--Page Header-->

            <section class="banner">
            <?php if(count($adminData) > 0){ ?>

                <img src="<?= base_url('/assets/img/svg/admin.svg') ?>" alt="">
                    <div class="d-flex align-items-md-end align-items-center justify-content-center flex-column flex">
                        <?php if(isset($admin_id)){ ?>
                        <h2>Admin Detail</h2>
                        <?php }else{ ?>
                            <h2>All Admin Detail</h2>
                        <?php   } ?>

                    </div>
                <?php }else{ ?>
                <img src="<?= base_url('/assets/img/svg/noAppointment.svg') ?>" alt="">
                <div class="main-content-body main-content-body-contacts d-flex align-items-center justify-content-center flex-column p-5" style="gap: 20px;">
                                <h2>No Admin Found</h2>
                                <hr width="100%">
                                <div class="menu-list ">
                                    <a href="<?= base_url('admin.php/Admin/AdminList') ?>" class=" menu-item">Go Back To Admin List</a>
                                </div>
							</div>
                    <?php } ?>
           
          
            </section>
            <?php 
                $appointment_type = array('',"ทำนัดตรวจสุขภาพทั่วไป",'ทำนัดตรวจสุขภาพบริษัทคู่สัญญา');
                $m_th_full = array( "","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", );
            
            ?>

            <?php if(count($adminData) > 0){ ?>
            
            <?php foreach($adminData as $value){ ?>

                <div class="row align-items-center justify-content-center">
            <div class="col-xl-10">
						<div class="card mg-b-20">
							<div class="main-content-body main-content-body-contacts">
								<div class="main-contact-info-header m-0 px-0" style="padding-bottom: 10px;">
									<div class="media">
									<!-- 	<div class="main-img-user">
											<img alt="" src="../../../assets/img/users/male/12.jpg"> <a href=""><i class="fas fa-camera"></i></a>
										</div> -->
										<div class="media-body px-3 px-lg-0" >
                                            <label style="font-size: .6rem;opacity:50%"> #<?= $value['id'] ?></label>
                                            <label style="font-size: .6rem;opacity:50%">Admin Name </label>
                                            <h4> <?= $value['admin_fname'].' '.$value['admin_lname'] ?></h4>
                                            <div style="font-size: .6rem;">
												<label style="opacity: 50%;">Last Login</label> <span>  <?=  $this->Control_model->fullDateTime2($value['date_login']) ?></span>
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
                                        $statsArr = array('Super Admin','Admin');
                                        $statsArrColor = array('reject','success','wait');

                                  
                                    ?>
									<div class="main-contact-action" style="gap: 5px;">

                                        <?php if($_SESSION['role'] == '1'){?>

                                            <a href="javascript:void(0)" class="badge badge-light status-<?= $statsArrColor[$value['admin_type']] ?>">
                                            <i class="typcn typcn-document-text"></i> Role : <?= $statsArr[$value['admin_type']] ?> </a>
                                        <?php }else{ ?>
									
                                        <select data-prev="<?= $value['admin_type'] ?>" <?= $_SESSION['role'] == '1' ? 'disabled' : '' ?> data-id="<?= $value['id'] ?>" 
                                        class="badge badge-light status-list status-<?= $statsArrColor[$value['admin_type']] ?>">

                                            <?php foreach ($statsArr as $key => $val) {
                                                $selected = '';
                                                if ($key == $value['admin_type']) $selected = 'selected';

                                            ?>
                                                <option <?= $selected ?> value="<?= $key ?>">
                                                    <i class="typcn typcn-document-text"></i> Role : <?= $val ?>
                                                </option>
                                            <?php } ?>
                                            </select>

                                            <a href="javascript:void(0)" class="badge badge-light btn-delete-admin status-reject" id="btn_delete_admin" data-id="<?= $value['id'] ?>">
                                            <i class="typcn typcn-delete"></i> Delete </a>

                                            <?php } ?>

                                    <a href="<?= base_url("admin.php/Admin/Detail/").$value['id'] ?>?type=edit" class="badge badge-light btn-edit mx-0" ><i class="typcn typcn-pen"></i> Edit  </a>

                                    </div>
									<!-- main-contact-action -->
								</div>
								<div class="main-contact-info-body">
									<div class="media-list">
										<div class="media">
											<div class="media-body">
												<div>
													<label>Tel.</label> <span class="tx-medium"> <?= $value['admin_tel'] ? $value['admin_tel'] : '-'  ?> </span>
												</div>
                                                <div>
													<label>Email</label> <span class="tx-medium"><?= $value['admin_email'] ?></span>
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

