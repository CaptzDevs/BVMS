
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

  function logoutFromFacebook() {
    FB.logout(function(response) {
      console.log('User logged out from Facebook.');
      location.reload();
    });
  }

  function checkLoggedStatus(response) {
    console.log(response)
    if (response.status === 'connected') {

        logoutFromFacebook()

        location.href =  '<?= base_url("/Client/login") ?>'

    } else {
      console.log('User is not logged in or did not authorize your app.');
    }
  }
</script>