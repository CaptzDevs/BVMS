<script>
    $(".btn-print-card").click((e)=>{
        print();
    })

    $('.status-list').change(async (e) => {
        if (e.target.value == '0') {
            e.target.classList.add('status-reject')
            e.target.classList.remove('status-wait')
            e.target.classList.remove('status-success')
        }
        if (e.target.value == '1') {
            e.target.classList.add('status-success')
            e.target.classList.remove('status-reject')
            e.target.classList.remove('status-wait')
        }
        if (e.target.value == '2') {
            e.target.classList.add('status-wait')
            e.target.classList.remove('status-success')
            e.target.classList.remove('status-reject')
        }



        Swal.fire({
            icon: "warning",
            title: 'ต้องการเปลี่ยนสถานะหรือไม่',
            showCancelButton: true,
            confirmButtonText: 'เปลี่ยนสถานะ',
            cancelButtonText: `ยกเลิกการเปลี่ยนแปลง`,

        }).then(async (result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                let isupdate = await updateStatus(e)
                isupdate = JSON.parse(isupdate)

                if (!isupdate.error) {

                    Swal.fire(
                        'ทำการเปลี่ยนสถานะเรียบร้อยแล้ว',
                        '',
                        'success'
                    ).then(result => {
                        if (result.isConfirmed) {

                            location.reload()
                        }
                    })
                    e.target.dataset.prev = e.target.value
                } else {
                    if (isupdate.error) {
                        Swal.fire({
                            icon: 'error',
                            title: isupdate.error,

                        })
                    }
                }

            } else {

                $('.status-list').val($('.status-list')[0].dataset.prev)
                if (e.target.value == '0') {
                    e.target.classList.add('status-reject')
                    e.target.classList.remove('status-wait')
                    e.target.classList.remove('status-success')
                }
                if (e.target.value == '1') {
                    e.target.classList.add('status-success')
                    e.target.classList.remove('status-reject')
                    e.target.classList.remove('status-wait')
                }
                if (e.target.value == '2') {
                    e.target.classList.add('status-wait')
                    e.target.classList.remove('status-success')
                    e.target.classList.remove('status-reject')
                }

            }
        })



    })

    function updateStatus(e) {
        return $.ajax({
            url: '<?= base_url("/Control/updateAppointmentStatus") ?>', // Replace with your server endpoint URL
            type: 'POST',
            data: {
                'app_id': e.target.dataset.id,
                'appointment_status': e.target.value,
            },
            success: function(response) {
                // Handle the response from the server
                console.log('Response:', JSON.parse(response));

            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                console.error('Error:', error);
            }
        });
    }

    function cancelAppointment(e) {
        return $.ajax({
            url: '<?= base_url("/Control/cancelAppointment") ?>', // Replace with your server endpoint URL
            type: 'POST',
            data: {
                'app_id': e.target.dataset.id,
            },
            success: function(response) {
                // Handle the response from the server
                console.log('Response:', response);
            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                console.error('Error:', error);
            }
        });
    }

    $(".btn-app-cancel").click((e) => {
        e.target.innerHTML = '<div class="lds-ring-login"><div></div><div></div><div></div><div></div></div>'
        
        Swal.fire({
            icon: "warning",
            title: 'ต้องการยกเลิกการนัดนี้หรือไม่',
            text: 'หากยกเลิกไปแล้วจะไม่สามารถย้อนกลับได้',
            showCancelButton: true,
            confirmButtonText: 'ยกเลิกนัด',
            cancelButtonText: `ไม่ยกเลิก`,

        }).then(async (result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {

                let cancelData = await cancelAppointment(e)

                cancelData = JSON.parse(cancelData)
                
                setTimeout(() => {
                if (!cancelData.error) {
                    Swal.fire(
                        'ทำการยกเลิกนัดเรียบร้อยแล้ว',
                        '',
                        'success'
                    ).then(result => {
                        if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    } else {
                        if (cancelData.error) {
                            Swal.fire({
                                icon: 'error',
                                title: cancelData.error,
                                
                            })
                        }
                    }
                    e.target.innerHTML  = '<i class="typcn typcn-trash"></i> ยกเลิกนัด '
                }, 1000);

            }else{
                e.target.innerHTML  = '<i class="typcn typcn-trash"></i> ยกเลิกนัด '
            }
        })
    });


</script>