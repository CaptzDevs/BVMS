<script>


    $("#btn_delete_admin").click((e)=>{
        Swal.fire({
            icon: "warning",
            title: 'ต้องกาลบผู้ดูแลนี้หรือไม่',
            text: 'หากยกเลิกไปแล้วจะไม่สามารถย้อนกลับได้',
            showCancelButton: true,
            confirmButtonText: 'ลบ',
            cancelButtonText: `กลับ`,

        }).then(async (result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                let cancelData = await deleteAdmin(e)
                cancelData = JSON.parse(cancelData)
                if (!cancelData.error) {
                    Swal.fire(
                        'ทำการลบผู้ดูแลเรียบร้อยแล้ว',
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

            }
        })
    })

    function deleteAdmin(e) {
        return $.ajax({
            url: '<?= base_url("admin.php/Control/deleteAdmin") ?>', // Replace with your server endpoint URL
            type: 'POST',
            data: {
                'admin_id': e.target.dataset.id,
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
/* ================================================ */

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
            cancelButtonText: `กลับ`,

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
            url: '<?= base_url("admin.php/Control/updateAdminType") ?>', // Replace with your server endpoint URL
            type: 'POST',
            data: {
                'admin_id': e.target.dataset.id,
                'admin_type': e.target.value,
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

    
</script>