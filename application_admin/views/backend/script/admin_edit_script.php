<script>
  const TEL_MASK = IMask($("#admin_tel")[0], {
    mask: '000-000-0000'
  });


  Parsley.addMessages('th', {
    required: 'โปรดกรอกข้อมูลในช่องนี้.',
    email: 'รูปแบบอีเมลไม่ถูกต้อง',
    equalto: 'รหัสผ่านไม่ตรงกัน'
  });

  // Set the locale for the error messages
  Parsley.setLocale('th');
  let form_edit = $('#form_edit').parsley();


  $("#btn_edit").click((e) => {

    if ($("#password").val().length > 0) {
      $("#password").prop("required", true);
      $("#confirm-password").prop("required", true);

    } else {
      $("#password").prop("required", false);
      $("#confirm-password").prop("required", false);

    }

    if (form_edit.isValid()) {
      updateAdminDetail()
    }

  })



  function updateAdminDetail() {

    let formData = new FormData($("#form_edit")[0])
    formData.delete('confirm-password')
    formData.set('admin_tel', TEL_MASK.unmaskedValue)

    if ($("#password").val().length == 0) {
      formData.delete('password')
    }

    let data = {};


    let branch = ""

    $(".branch-checkbox").map((i, item) => {
      if (item.checked) {
        branch += item.dataset.id + ","
      }
    })

    data["admin_branch"] = branch


    formData.forEach(function(value, key) {
      data[key] = value;
    });


    let jsonData = JSON.stringify(data);

    console.log(jsonData)

    $.ajax({
      url: '<?= base_url("admin.php/Admin/updateAdminDetail") ?>',
      type: 'POST',
      contentType: 'application/json',
      data: jsonData,
      success: function(response, status) {
        response = JSON.parse(response);
        console.log(response, status);

        if (response.error) {
          Swal.fire({
            icon: 'error',
            title: response.error,

          })
        }

        if (response > 0 && status == 'success') {
          Swal.fire({
            icon: 'success',
            title: 'แก้ไขข้อมูลผู้ดูแลเสร็จสิ้น',
            confirmButtonText: 'ตกลง',

          }).then((result) => {
            if (result.isConfirmed) {

              location.reload()

            }
         
          })
        }
      },
      error: function(xhr, status, error) {
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
      appId: 'your-app-id',
      cookie: true,
      xfbml: true,
      version: 'v17.0'
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

        location.href = '<?= base_url('/Client/index'); // Replace with your desired URL') 
                          ?>'

      } else {
        // User cancelled login or not authorized your app
        console.log('Login failed.');
      }
    }, {
      scope: 'email,public_profile'
    }); // Add any additional permissions your app needs
  }

  function getUserInformation() {
    FB.api('/me', {
      fields: 'name,email,picture.width(450).height(450)'
    }, function(response) {
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