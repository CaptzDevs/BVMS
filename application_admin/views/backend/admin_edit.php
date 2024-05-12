<style>
    .form-label {
        font-size: .8rem;

    }

    .btn-submit {
        width: 100%;
        min-height: 50px;
        border-radius: 10px;
        padding: 0px 15px;
    }
    .btn-register{
        width: 100%;
        min-height: 50px;
        border-radius: 10px;
        padding: 0px 15px;
        background: none;
        border: 1px solid black;
        color: black;
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
   /*      display: flex;
        align-items: center;
        justify-content: space-evenly; */
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

    @media (max-width: 768px) {
        .banner img {
            width: 50%;
        }
    }
    @media (max-width: 576px) {
        .banner img {
            width: 100%;
        }
    }
     /* Add border-radius to the Select2 container */
     .select2-container--default .select2-selection--single {
      border-radius: 5px;
    }

    /* Add border-radius to the Select2 dropdown */
    .select2-container--default .select2-dropdown {
      border-radius: 5px;
    }
    .btn-fb{
        width: 100%;
        background: var(--blue6);
        padding: 10px;
        color: white;
        border-radius: 10px;
        border: none;
    }

    .btn-fb:hover{
        background: var(--blue8);
    }

</style>

    <!--/main-header-->



    <!--Main Content-->
    <div class="main-content px-0 hor-content" style="margin-top: 80px !important;">
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
                <div class="row row-sm form-appointment align-items-center justify-content-center">
                <img class="col-md-6" src="<?= base_url('/assets_admin/img/svg/admin.svg') ?>" alt="">
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5" style="font-size: 1rem;">
                                Edit Admin Detail
								</div>
                            <!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
                            <form class="mt-3 form-appointment " id="form_edit" onsubmit="return false" >
                                <div class="row row-sm d-flex">

                               <!--  <div class="col-lg-3 col-md-12 mt-3">
                                    <?php $prenameArr = array("Mr.","Mrs","Miss"); ?>

                                        <div class="form-group mb-0">
                                            <label class="form-label">Prename <span class="tx-danger"></span></label>
                                            <div class="row">
                                                <div class="parsley-select col-lg-12 col-md-12" id="slWrapper-user_prename">
                                                    <select  name="admin_prename" class="form-control select2 select-nosearch rounded" data-parsley-class-handler="#slWrapper-user_prename"
                                                     data-parsley-errors-container="#slErrorContainer_user_prename" data-placeholder="Prename " required="">
                                                    <option value="-1" disabled> Prename </option>
                                                    <?php foreach($prenameArr as $key=>$value){ 
                                                            $selected = '';
                                                            if($key+1 == $adminData[0]['admin_prename']) $selected = 'selected';
                                                        ?>
                                                                    <option <?= $selected ?> value="<?=  $key+1 ?>"> <?= $value ?> </option>
                                                                <?php } ?>
                                                    </select>
                                                    <div id="slErrorContainer_user_prename"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">Firstname: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="admin_fname" placeholder="Firstname" required="" type="text" value="<?= $adminData[0]['admin_fname'] ?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">Lastname: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="admin_lname" placeholder="Lastname" required="" type="text" value="<?= $adminData[0]['admin_lname'] ?>" >
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $branchList = $this->Control_model->get_data('branch');
                                $branchListData = explode(',',$adminData[0]['admin_branch']);

                              /*   if(count($branchListData) > 0){

                                    print_r($branchListData);
                                } */
                                    
                                ?>
                                Branch
                                <div class="row row-sm">
                                    <?php foreach ($branchList as $value) { 
                                        
                                        $check = in_array($value['id'], $branchListData) ? "checked" : ''; 

                                        ?>
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-1 form-group p-2 border d-flex align-items-center justify-content-between">
                                                <div class="col-6"> <label class="form-label" style="font-size: .6rem;"> <?= $value['branch_name'] ?> <span class="tx-danger"></span></label>
                                                </div>
                                                <div class="col-6 d-flex justify-content-end">
                                                    <input class="form-control branch-checkbox" <?= $check ?>  data-id="<?= $value['id'] ?>" style="width: 30px; height:30px;cursor:pointer" type="checkbox"></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                        
                            <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Email: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="admin_email" placeholder="Email" required=""  value="<?= $adminData[0]['admin_email'] ?>"  type="admin_email" data-parsley-error-message="รูปแบบอีเมลไม่ถูกต้อง">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Tel: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="admin_tel" id="admin_tel" placeholder="Tel" required="" type="text" value="<?= $adminData[0]['admin_tel'] ?>" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Password: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="password" id="password"  type="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="confirm-password" id="confirm-password"  type="password" 
                                            data-parsley-equalto="#form_edit input[name='password']"
            
                                            > 
                                        </div>
                                    </div>
                                </div>

                                <input type="text" hidden value="<?= $adminData[0]['id'] ?>" name="admin_id">
                                <div class="row">
                                   
                                <div class="col-12 d-flex justify-content-center m-0">
                                        <button class="btn btn-main-primary btn-submit" id="btn_edit" type="submit">Edit Data </button>
                                    </div>
                                </div>

                                <hr style="width: 100%;">
                              
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                    </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

                       
                  
            </section>
            <!-- Row -->

            <!--/Row-->

            <!-- Row -->
            <!-- 	<div class="row row-sm">
					<div class="col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Valid State Input
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
								<form class="needs-validation was-validated">
									<div class="row row-sm">
										<div class="col-lg-6">
											<div class="form-group has-success mg-b-0">
												<input class="form-control" placeholder="Input box (success state)" required="" type="text" value="This is input">
												<textarea class="form-control mg-t-20" placeholder="Textarea (success state)" required="" rows="3">This is textarea</textarea>
											</div>
										</div>
										<div class="col-lg-6 mg-t-20 mg-lg-t-0">
											<div class="form-group has-danger mg-b-0">
												<input class="form-control" placeholder="Input box (invalid state)" required="" type="text">
												<textarea class="form-control mg-t-20" placeholder="Textarea (invalid state)" required="" rows="3"></textarea>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->
            <!-- /Row -->




        </div>
    </div>
    </div>
    <!--Main Content-->


    <div id="fb-root"></div>
    <!--footer-->
 
   
