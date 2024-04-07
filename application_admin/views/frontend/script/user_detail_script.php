<!-- ============================================================================= -->
<script>
    //====================================
    // Initial Form
    //====================================

    $('.select-nosearch').select2({
        minimumResultsForSearch: Infinity

    });

    Parsley.addMessages('th', {
        required: 'โปรดกรอกข้อมูลในช่องนี้.',
        email: 'รูปแบบอีเมลไม่ถูกต้อง',
        equalto: 'รหัสผ่านไม่ตรงกัน'
    });
    Parsley.setLocale('th');


    let form_userDetail = $('#form_userDetail').parsley();

    const TEL_MASK = IMask($("#tel")[0], {
        mask: '000-000-0000'
    });

    $(".month-label-section").click(e => {
        $(".month-label-section").removeClass('hl-month')
        e.target.classList.add("hl-month")
    })
    $("#app_hour,#app_minute").change((e) => {

        if ($("#input_selected_appointment_date").val() && $("#app_hour").val() && $("#app_minute").val()) {

            $("#btn_appointment_date").prop("disabled", false)
        }

    })

    $("#btn_appointment_cancel").click(e => {
        $(".form-appointment").removeClass('d-none')
        $(".form-calendar").addClass('d-none')
    })

    //====================================
    const urlParams = new URLSearchParams(window.location.search);
    console.log(location.search)

    const firstTime = urlParams.get('ft');
    const redirectToForm = urlParams.get('redform');


  // Check if the 'name' parameter exists and has a value

    function saveUserDetail() {


        let formData = new FormData($("#form_userDetail")[0])
        formData.delete('appointment_date_showed')
        formData.delete('db-date')
        formData.delete('db-month')
        formData.delete('db-year')
        formData.set('tel', TEL_MASK.unmaskedValue)
        console.log(TEL_MASK.unmaskedValue)

        formData.delete('confirm-password')
        if ($("#password").length > 0 && $("#password").val().length == 0) {
            formData.delete('password')
        }

        formData.append('birthdate', `${$("#db-year").val()}-${('0'+$("#db-month").val()).slice(-2)}-${('0'+$("#db-date").val()).slice(-2)}`)

        let data = {};

        formData.forEach(function(value, key) {
            data[key] = value;
        });

        let jsonData = JSON.stringify(data);

        

        return $.ajax({
            url: '<?= base_url("/Control/saveUserDetail") ?>',
            type: 'POST',
            contentType: 'application/json',
            data: jsonData,
            success: function(response, status) {

                console.log(response, status);

                if (response > 0 && status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'บันทึกเสร็จสิ้น',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        /*    if (result.isConfirmed) {

                               location.href = `<?= base_url("/Client/card/" . $_SESSION['id'] . '/') ?>${response}`

                           } else if (result.isDenied) {

                               location.href = `<?= base_url("/Client") ?>`

                           } */

                                if(firstTime == '1'){
                                    location.href = `<?= base_url("/Client") ?>`
                                }
                                if(redirectToForm == 'general'){
                                    location.href = `<?= base_url("/Client/Form?type=general") ?>`
                                }
                                else if(redirectToForm == 'company'){
                                    location.href = `<?= base_url("/Client/Form?type=company") ?>`
                                }
                                
                    })
                }
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });

    }

    $("#btn_save_detail").click(async e => {

        if ($("#password").length > 0 && $("#password").val().length > 0) {
            $("#confirm-password").prop("required", true);
        } else {
            $("#confirm-password").prop("required", false);
        }

        if (form_userDetail.isValid()) {
            $("#btn_save_detail").html('<div class="lds-ring-login"><div></div><div></div><div></div><div></div></div>')

            await saveUserDetail()
            $("#btn_save_detail").text('บันทึกข้อมูล')

        }

    })

    //====================================


    $("#btn_seclect_appointment_date").click(e => {
        e.preventDefault()

        //show calendar point
        $("#form_calendar").removeClass('d-none')
        $(".form-appointment").addClass('d-none')
    })

    //====================================

    $("#btn_appointment_date").click(e => {
        e.preventDefault()

        let date = $("#selected_appointment_date").text()
        let time = `${('0'+$("#app_hour").val()).slice(-2)}:${('0'+$("#app_minute").val()).slice(-2)}`;

        Swal.fire({
            icon: "info",
            title: 'ต้องการเลือกวันนัด',
            text: `วันที่ ${date} เวลา ${time}`,
            showCancelButton: true,
            confirmButtonText: 'เลือก',
            denyButtonText: `ยกเลิก`,
            cancelButtonText: `ยกเลิก`,

        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {

                /* Swal.fire('Saved!', '', 'success') */

                $("#form_calendar").addClass('d-none')
                $(".form-appointment").removeClass('d-none')

                $("#appointment_date_showed").val(`${date} เวลา ${time} น.`)

                let [d, m, y] = convertDate($("#input_selected_appointment_date").val(), 'dmy')

                $("#appointment_date").val(`${y}-${m}-${d} ${time}:00`)
                console.log($("#appointment_date").val())


            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })


    })
</script>