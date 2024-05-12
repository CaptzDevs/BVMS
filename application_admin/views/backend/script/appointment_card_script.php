<script>
    
    function cancelAppointment(e){
      return  $.ajax({
            url: '<?= base_url("/Control/cancelAppointment") ?>', // Replace with your server endpoint URL
            type: 'POST',
            data: {
                'app_id' : e.target.dataset.id,
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
    $(".btn-app-cancel").click((e)=>{
    
        Swal.fire({
            icon : "warning",
            title: 'ต้องการยกเลิกการนัดนี้หรือไม่',
            text : 'หากยกเลิกไปแล้วจะไม่สามารถย้อนกลับได้',
            showCancelButton: true,
            confirmButtonText: 'ยกเลิกนัด',
            cancelButtonText: `กลับ`,
            
            }).then(async (result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                let cancelData =  await cancelAppointment(e)
                if(cancelData){
                    Swal.fire(
                    'ทำการยกเลิกนัดเรียบร้อยแล้ว',
                    '',
                    'success'
                    ).then(result=>{
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    })
                }else{
                    if(response.error){
                        Swal.fire({
                          icon:'error',
                          title: response.error,

                        })
                    }
                }
             
            }
        })
        });

</script>