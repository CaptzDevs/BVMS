<script>
    function loginFacebook(data) {

let jsonData = JSON.stringify(data);

console.log(jsonData)

return $.ajax({
  url: '<?= base_url("/Client/User_Login_Facebook") ?>',
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
      /*        Swal.fire({
                 icon: 'success',
                 title: 'สมัครเสร็จสิ้น',
                 showDenyButton: true,
                 confirmButtonText: 'ดูบัตรนัด',
                 denyButtonText: `ไปหน้าหลัก`,
             }).then((result) => {
                 if (result.isConfirmed) {

                     location.href = `<?= base_url("/Client/appointment/") ?>${response}?type=label`

                 } else if (result.isDenied) {

                     location.href = `<?= base_url("/Client") ?>`

                 }
         }) */
      location.href = `<?= base_url("/Client") ?>`

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
      appId: '943280696750676',
      cookie: true,
      xfbml: true,
      version: 'v17.0'
    });

    FB.getLoginStatus(function(response) {
      checkLoggedStatus(response);
    });

  };


  function checkLoginStatus() {
    FB.getLoginStatus(async function(response) {
      console.log(response);
      if (response.status === 'connected') {

        getUserInformationForRegist()
       
      } else {
        console.log('User is not logged in or did not authorize your app.');
      }
    });
  }

  function facebookLogin(e) {
    console.log(e)

    FB.login(function(response) {
      if (response.status === 'connected') {
        // User is logged in and authorized your app
        checkLoginStatus(); // Check login status after successful login

        // location.href = '<?= base_url('/Client/index'); // Replace with your desired URL') 
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

  function getUserInformationForRegist() {
     FB.api('/me', {
      fields: 'name,email,picture.width(450).height(450)'
    }, async function(response) {
      console.log(response);
      console.log("REGISTING...");

      console.log('Welcome, ' + response.name + '!');
      console.log('Email: ' + response.email);

      let Data = {
        fbid : response.id,
          email : response.email,
          fname : response.name,
          lname : '',
          image : response.picture.data.url,
      }

      let loginRes = await loginFacebook(Data);

      console.log(loginRes)
   
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