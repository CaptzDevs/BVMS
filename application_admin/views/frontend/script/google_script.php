<script src="https://accounts.google.com/gsi/client" async defer></script>
<meta name="google-signin-client_id" content="678390382211-lor76k8fhlrltrbjqqkjdlhnpdg86h3i.apps.googleusercontent.com">
<script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>

<script>




 async function getGoogleUser(googleUser) {
    console.log(googleUser)

    const userData = jwt_decode(googleUser.credential);
    console.log(userData)
    console.log("ID: " + userData.sub);
    console.log('Full Name: ' + userData.name);
    console.log('Given Name: ' + userData.given_name);
    console.log('Family Name: ' + userData.family_name);
    console.log("Image URL: " + userData.picture);
    console.log("Email: " + userData.email);

    const DataLogin = {
          ggid : userData.sub,
          email : userData.email,
          fname : userData.name,
          lname : '',
          image : userData.picture,
    }
    
    loginGoogle(DataLogin)
  }

  function signOut() {
    // Handle sign-out process here
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
      console.log('User signed out.');
    });
  }



  function loginGoogle(data) {

    let jsonData = JSON.stringify(data);

    console.log(jsonData)

    return $.ajax({
      url: '<?= base_url("/Client/User_Login_Google") ?>',
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