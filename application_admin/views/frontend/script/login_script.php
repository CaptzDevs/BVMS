<!-- <script src="https://apis.google.com/js/platform.js?onload=initGoogleSignIn" async defer></script> -->

<!-- ============================ -->
<script>
  Parsley.addMessages('th', {
    required: 'โปรดกรอกข้อมูลในช่องนี้.',
    email: 'รูปแบบอีเมลไม่ถูกต้อง',
    equalto: 'รหัสผ่านไม่ตรงกัน'
  });

  // Set the locale for the error messages
  Parsley.setLocale('th');
  let form_login = $('#form_login').parsley();


  $("#btn_login").click(async (e) => {

    $("#btn_login").html('<div class="lds-ring-login"><div></div><div></div><div></div><div></div></div>')
    $("#btn_login").prop("disabled", true)
    $(".btn-fb").prop("disabled", true)
    $(".btn-gg").prop("disabled", true)
    $(".btn-register").addClass("disabled")

    if (form_login.isValid()) {
      await login()
    }

    setTimeout(() => {
      $("#btn_login").html('เข้าสู่ระบบ')

      $("#btn_login").prop("disabled", false)
      $(".btn-fb").prop("disabled", false)
      $(".btn-gg").prop("disabled", false)
      $(".btn-register").removeClass("disabled")


    }, 500);


  })



  function login() {

    let formData = new FormData($("#form_login")[0])
    formData.delete('confirm-password')
    let data = {};

    formData.forEach(function(value, key) {
      data[key] = value;
    });

    let jsonData = JSON.stringify(data);

    console.log(jsonData)

    return $.ajax({
      url: '<?= base_url("/Client/User_Login") ?>',
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