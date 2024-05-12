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
                <img src="<?= base_url('/assets/img/svg/appointment2.svg') ?>" alt="">
                <div class="menu-list">
                    <a href="<?= base_url('/Client/form?type=general') ?>" class="menu-item">ทำนัดตรวจสุขภาพทั่วไป</a>
                    <a href="<?= base_url('/Client/form?type=company') ?>" class="menu-item">ทำนัดตรวจสุขภาพบริษัทคู่สัญญา</a>
                    <a href="<?= base_url('/Client/Card/').$_SESSION['id'] ?>" class="menu-item">ดูบัตรนัด</a>

                  <!--   <hr width="100%">
                    <span id="username"></span>
                    <span id="email"></span>
                    <img id="pic"></img>

       
                       
                    <div class="fb-login-button" data-width="" data-size="large" data-scope="email, public_profile" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false"></div>
                    <button id="btn_logout" onclick="logoutFromFacebook()">logout</button> -->
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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v17.0&appId=943280696750676&autoLogAppEvents=1" nonce="uEXeMcQA"></script>
    <!--footer-->
 
    <script>
        
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '943280696750676',
      cookie     : true,
      xfbml      : true,
      version    : 'v17.0'
    });

    // Check if the user is logged in and has authorized your app
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });

  };


    // Handle the login status change
    function statusChangeCallback(response) {
        console.log(response)
    if (response.status === 'connected') {
        
        getUserInformation()
    } else {
        console.log('User is not logged in or did not authorize your app.');
    }
    }


function getUserInformation() {
  FB.api('/me', { fields: 'name,email,picture.width(450).height(450)' }, function(response) {
    console.log(response)
    console.log('Welcome, ' + response.name + '!');
    console.log('Email: ' + response.email);
    document.querySelector("#username").innerHTML = response.name
    document.querySelector("#email").innerHTML = response.email
    document.querySelector("#pic").src = response.picture.data.url
  });
}



function logoutFromFacebook() {
  FB.logout(function(response) {
    // This function will be called after the user is logged out.
    // You can perform any additional actions or UI updates here.
    console.log('User logged out from Facebook.');
    location.reload()
  });
}



</script>


