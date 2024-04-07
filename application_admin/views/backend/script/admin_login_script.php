<script>


    Parsley.addMessages('th', {
        required: 'โปรดกรอกข้อมูลในช่องนี้.',
        email: 'รูปแบบอีเมลไม่ถูกต้อง',
        equalto: 'รหัสผ่านไม่ตรงกัน'
        });

        // Set the locale for the error messages
        Parsley.setLocale('th');
    let  form_login = $('#form_login').parsley();

    
    $("#btn_login").click( async (e)=>{
      
      if(form_login.isValid()){
          $("#btn_login").text("Checking...")
          $("#btn_login").prop("disabled",true)
          
          await login()

          setTimeout(() => {
            $("#btn_login").text("Login")
            $("#btn_login").prop("disabled",false)

          }, 1000);
          

        }

    })



    function login(){

            let formData = new FormData($("#form_login")[0])
            formData.delete('confirm-password')
            let data = {};

            formData.forEach(function(value, key){
                data[key] = value;
            });

            let jsonData = JSON.stringify(data);

            console.log(jsonData)

           return $.ajax({
                url: '<?= base_url("admin.php/Admin/Admin_login") ?>',
                type: 'POST',
                contentType: 'application/json',
                data: jsonData,
                success: function (response,status) {
                    response = JSON.parse(response);
                    console.log(response,status);

                    if(response.error){
                        Swal.fire({
                          icon:'error',
                          title: response.error,

                        })
                    }

                    if(response > 0 && status == 'success'){
                 /*        Swal.fire({
                            icon: 'success',
                            title: 'สมัครเสร็จสิ้น',
                            showDenyButton: true,
                            confirmButtonText: 'ดูบัตรนัด',
                            denyButtonText: `ไปหน้าหลัก`,
                        }).then((result) => {
                            if (result.isConfirmed) {

                                location.href = `<?= base_url("admin.php/Client/appointment/") ?>${response}?type=label`

                            } else if (result.isDenied) {

                                location.href = `<?= base_url("admin.php/Client") ?>`

                            }
                    }) */
                    location.href = `<?= base_url("admin.php/Admin") ?>`

                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                }
                });

        }

    

 

</script>
<!-- ======================== -->
<!-- Facebook login PLUGIN  -->
<!-- ======================== -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v17.0&appId=943280696750676&autoLogAppEvents=1" nonce="uEXeMcQA"></script>
<script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : 'your-app-id',
        cookie     : true,
        xfbml      : true,
        version    : 'v17.0'
      });

      FB.getLoginStatus(function(response) {
        checkLoggedStatus(response);
     });

    };

    function checkLoginStatus() {
      FB.getLoginStatus(function(response) {
        console.log(response);
        if (response.status === 'connected') {
          getUserInformation();
        } else {
          console.log('User is not logged in or did not authorize your app.');
        }
      });
    }

    function facebookLogin() {
      FB.login(function(response) {
        if (response.status === 'connected') {
          // User is logged in and authorized your app
          /* checkLoginStatus(); // Check login status after successful login */

          location.href = '<?= base_url('/Client/index'); // Replace with your desired URL') ?>'
   
        } else {
          // User cancelled login or not authorized your app
          console.log('Login failed.');
        }
      }, { scope: 'email,public_profile' }); // Add any additional permissions your app needs
    }

    function getUserInformation() {
      FB.api('/me', { fields: 'name,email,picture.width(450).height(450)' }, function(response) {
        console.log(response);
        console.log('Welcome, ' + response.name + '!');
        console.log('Email: ' + response.email);
        document.querySelector("#username").innerHTML = response.name;
        document.querySelector("#email").innerHTML = response.email;
        document.querySelector("#pic").src = response.picture.data.url;
      });
    }

    function logoutFromFacebook() {
      FB.logout(function(response) {
        // This function will be called after the user is logged out.
        // You can perform any additional actions or UI updates here.
        console.log('User logged out from Facebook.');
        location.reload();
      });
    }

    function checkLoggedStatus(response) {
        console.log(response)
    if (response.status === 'connected') {
        
        getUserInformation()
    } else {
        console.log('User is not logged in or did not authorize your app.');
    }
    }



      </script>
      
      