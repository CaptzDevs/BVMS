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

    .btn-register {
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

    .btn-fb {
        width: 300px;
        max-width: 250px;
        background: var(--blue6);
        padding: 10px;
        color: white;
        border-radius: 10px;
        border: none;
        position: relative;
        font-size: 14px;

    }

  .btn-fb svg {
        position: absolute;
        left: 10px;
    }

    .btn-gg {
        width: 100%;
        background: #fff;
        padding: 10px;
        color: white;
        border-radius: 10px;
        border: none;
        color: black;
        border: 1px solid black;
        position: relative;
    }

    .btn-gg:hover {
        background: #e6e6e6;
    }

    .btn-gg img {
        width: 25px;
        object-fit: contain;
        position: absolute;
        left: 35px;

    }

    .btn-fb:hover {
        background: var(--blue8);
    }
    a.disabled {
  pointer-events: none;
  cursor: default;
}
    :disabled{
        opacity: 50%;
    }
    .g_id_signin iframe {
        width: 100%;
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
            <div class="row row-sm form-appointment align-items-center justify-content-center">
                <img class="col-md-6" src="<?= base_url('/assets/img/svg/appointment2.svg') ?>" alt="">
                <div class="col-md-6">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5" style="font-size: 1rem;">
                                ลงทะเบียน
                            </div>
                            <!-- <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p> -->
                            <form class="mt-3 form-appointment " id="form_register" onsubmit="return false">
                                <div class="row row-sm d-flex">

                                    <div class="col-lg-3 col-md-12 mt-3">
                                        <?php $prenameArr = array("เด็กชาย", "เด็กหญิง", "นาย", "นาง", "นางสาว"); ?>

                                        <div class="form-group mb-0">
                                            <label class="form-label">คำนำหน้า <span class="tx-danger"></span></label>
                                            <div class="row">
                                                <div class="parsley-select col-lg-12 col-md-12" id="slWrapper-user_prename">
                                                    <select name="prename" class="form-control select2 select-nosearch rounded" data-parsley-class-handler="#slWrapper-user_prename" data-parsley-errors-container="#slErrorContainer_user_prename" data-placeholder="วัน " required="">
                                                        <option value="-1" disabled selected> คำนำหน้า </option>
                                                        <?php foreach ($prenameArr as $key => $value) { ?>
                                                            <option value="<?= $key + 1 ?>"> <?= $value ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                    <div id="slErrorContainer_user_prename"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 mt-3">
                                        <div class="form-group mg-b-0">
                                            <label class="form-label">ชื่อ: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="fname" placeholder="ชื่อ" required="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">นามสกุล: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="lname" placeholder="นามสกุล" required="" type="text">
                                        </div>
                                    </div>
                                </div>


                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">อีเมล: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="email" placeholder="อีเมล" required="" type="email" data-parsley-error-message="รูปแบบอีเมลไม่ถูกต้อง">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">รหัสผ่าน: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="password" id="password" required="" type="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">ยืนยันรหัสผ่าน: <span class="tx-danger"></span></label>
                                            <input class="form-control" name="confirm-password" id="confirm-password" required="" type="password" data-parsley-equalto="#form_register input[name='password']">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-8 d-flex justify-content-center m-0">
                                        <button class="btn btn-main-primary btn-submit" id="btn_register" type="submit">ลงทะเบียน </button>
                                    </div>

                                    <div class="col-4 d-flex justify-content-center">
                                        <a href="<?= base_url("/Client/login") ?>" id="btn_login" class="btn btn-main-primary btn-register w-100 d-flex align-items-center justify-content-center">
                                            เข้าสู่ระบบ
                                        </a>
                                    </div>


                                </div>

                                <hr style="width: 100%;">

                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                        <button class="btn-fb d-flex align-items-center justify-content-center" onclick="facebookLogin()">
                                            <svg role="img" style="width:20px; fill:white;text-align:center;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title>Facebook</title>
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                         <span class="mx-1"> Continue with Facebook </span>

                                        </button>

                                    </div>
                                </div>

                                <div id="g_id_onload"
                                data-client_id="678390382211-lor76k8fhlrltrbjqqkjdlhnpdg86h3i.apps.googleusercontent.com"
                                data-context="signin"
                                data-ux_mode="popup"
                                data-callback="getGoogleUser"
                                data-nonce=""
                                data-itp_support="true">
                            </div>

                                <div class="row mt-3">
                                    <div class="col-12 d-flex align-items-center justify-content-center" id="btn_warp_gg">
                                       <!--  <button class="btn-gg d-flex align-items-center justify-content-center" onclick="" disabled>
                                            <svg role="img" style="width:25px; fill:white;text-align:center;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title>Facebook</title>

                                                <img src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA" alt="">

                                            </svg>
                                            <span class="mx-1"> Login with Google </span>
                                        </button> -->
                                        <div class="g_id_signin"
                                data-type="standard"
                                data-shape="rectangular"
                                data-theme="outline"
                                data-text="continue_with"
                                data-size="large"
                                data-logo_alignment="left"
                                data-width="250"
                                >
                            </div>
                                        <!--  <div class="fb-login-button"  data-width="" data-size="large" data-scope="email, public_profile" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false"></div> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <hr width="100%">
                    <span id="username"></span>
                    <span id="email"></span>
                    <img id="pic"></img>
                    <button id="btn_logout" onclick="logoutFromFacebook()">logout</button>
       
                        -->

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