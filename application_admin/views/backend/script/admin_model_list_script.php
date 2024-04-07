<script>






    $(document).ready(function() {

        function openNewWindow() {
                var width = 900;
                var height = 400;

                // Calculate the center position
                var left = (window.innerWidth - width) / 2;
                var top = (window.innerHeight - height) / 2;

                // Open the new window at the center
                window.open('https://buddymotor.com/en-EN/products/models', '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
            }

        $('.preview-model').click((e)=>{
            
            openNewWindow()
        })
        $("#clearSearch").click((e)=>{
            $('#searchArticle').val("").trigger("keyup")
        })

        $(".tag-btn").click((e)=>{
            $('#searchArticle').val('tag:'+e.target.dataset.value+' ').trigger("keyup")

        })


        $("#example2_filter > label > input").hide()
        $("#searchArticle").keyup((e)=>{
        $("#example2_filter > label > input").val(e.target.value).trigger('input')
    })
    

           $(".td-warper").click(function(e) {
            console.log(e.target)
            var range = document.createRange();
                range.selectNode(e.target);

                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand("copy");

                $.toast({
                        heading: 'คัดลอกข้อความแล้ว',
                        icon: 'success',
                        showHideTransition: 'slide',
                        allowToastClose: true,
                        hideAfter: 3000,
                        stack: 5,
                        position: 'bottom-left',
                        textAlign: 'left',
                        loader: true,
                        loaderBg: '#9EC600',

                    });

                    window.getSelection().removeAllRanges();
           })


        });

    function getCurrentThaiDate() {
        const thaiMonths = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];

        const date = new Date();
        const day = date.getDate();
        const month = thaiMonths[date.getMonth()];
        const year = date.getFullYear() + 543; // Convert to Thai year

        const month2 = date.getMonth() + 1; // Adding 1 to get the month number from 1 to 12

        // To find the number of days in the month, set the date to the last day of the month,
        // then get the day of the month which will give the total number of days.
        const lastDayOfMonth = new Date(year, month2, 0);
        const numberOfDays = lastDayOfMonth.getDate();

        return [`วันที่ 01 เดือน ${month} ${year}`, `วันที่ ${numberOfDays} เดือน ${month} ${year}`];
    }

    // Initialize DataTable with custom language settings

    const dateRangText = `รายการนัดตรวจสุขภาพ ${getCurrentThaiDate()[0]} ถึง ${getCurrentThaiDate()[1]}`

    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.ttf',
            bold: 'THSarabun-Bold.ttf',
            italics: 'THSarabun-Italic.ttf',
            bolditalics: 'THSarabun-BoldItalic.ttf'
        }
    }



    $('#example13').DataTable({
        /*       order: [
                  [0, 'desc'],
                  [1, 'desc'],
                  [2, 'asc'],
                  [3, 'asc'],

              ], */
        pageLength: 100,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: ` ${dateRangText}`,
                exportOptions: {
                    /*  columns: ':visible' */
                    columns: [0, 1, 2, 3, 4, 5, 6]

                }
            },
            { // กำหนดพิเศษเฉพาะปุ่ม pdf
                "extend": 'pdf', // ปุ่มสร้าง pdf ไฟล์
                "text": 'PDF',
                title: ` ${dateRangText}`,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]


                }, // ข้อความที่แสดง
                "pageSize": 'A4',
                "orientation": 'portrait',
                "customize": function(doc) {
                    doc.defaultStyle = {
                        font: 'THSarabun',
                        fontSize: 12
                    };
                }
            },
            'colvis'
        ]
    });
</script>
<script>
   /*  $(document).ready(function() {

        $('#category_search').change(async (e) => {
            $("#list_data").html(`<div style="display: flex; align-items: center; justify-content:center;">
			<img src="https://bangkokhatyaihealth.com/article/assets/img/loader1.svg " class="loader-img" alt="Loader">
		</div>`)
             sendSearchRequest(e.target.value);
        })

        $(".category-name").change(e => {
            sendEditRequest(e.target.id);
        })


        $('#btn_create_new_category').click((e) => {
            if ($("#new_category_name").val().length > 0) {
                $('#category_search').val('')
                $(e.target).prop("disabled", true);
                sendPostRequest();
            }
        })

        $('.btn-category-delete').click((e) => {

            Swal.fire({
                icon: 'warning',
                title: 'ต้องการลบหมวดหมู่นี้ใช่หรือไม่',
                showDenyButton: true,
                confirmButtonText: 'ลบ',
                denyButtonText: `ยกเลิก`,
                denyButtonColor: '#228be6',
                confirmButtonColor: '#e03131',

            }).then((result) => {
                if (result.isConfirmed) {
                    $(e.target).prop("disabled", true);
                    $(`#li-${e.target.dataset.id}`).fadeOut('.5', () => {
                        $(`#li-${e.target.dataset.id}`).remove()

                        console.log($("#list_data li").length)
                        if ($("#list_data li").length == 0) {
                            $('#list_data').append(`<li class="d-flex  list-group-item align-items-center justify-content-between">
								<input id="new_category_name" name="new_category_name" value="${$("#category_search").val()}" type="text" placeholder="เพิ่มหมวดหมู่ใหม่">
								<button class="badgetext badge badge-primary badge-pill" id="btn_create_new_category">Create</button>
							</li>`)

                            $('#btn_create_new_category').click((e) => {
                                if ($("#new_category_name").val().length > 0) {

                                    $(e.target).prop("disabled", true);
                                    sendPostRequest();
                                }
                            })
                        }
                    })

                    sendDeleteRequest(e.target.dataset.id);



                }
            })


        })


    })
 */

    /*  let inputTime  = Date.now();
     let inputNow =  0;

     let timeWithoutInput;
    let timeI = 0; */
    	


	let timeOut;
			 let timeCount = 0;
             let stopLoop = false;
            sendSearchRequest("")

    function sendSearchRequest(value) {
        
        var url = `<?= base_url('/Control/searchModel') ?>`;
        console.log(value);
        var postData = {
            searchModel: value,
        };

        return $.ajax({
            type: "POST",
            url: url,
            data: postData,
            success: function(response) {

                if (response) {
                    $("#list_data").html(response);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error occurred:", status, error);
            }
        });
    }

    function sendEditRequest(id) {
        var url = `<?= base_url('/Control/editModel') ?>`;

        var postData = {
            id: id,
            model_name: $(`#category-name-${id}`).val(),
        };

        return $.ajax({
            type: "POST",
            url: url,
            data: postData,
            success: function(response) {

                if (response) {
                    $("#list_data").html(response);
                    $.toast({
                        heading: 'แก้ไขข้อมูลสำเร็จ',
                        icon: 'success',
                        showHideTransition: 'slide',
                        allowToastClose: true,
                        hideAfter: 3000,
                        stack: 5,
                        position: 'bottom-left',
                        textAlign: 'left',
                        loader: true,
                        loaderBg: '#9EC600',

                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error occurred:", status, error);
            }
        });
    }

    function sendDeleteRequest(id) {
        var url = `<?= base_url('/Control/deleteModelPermanant') ?>`;

        var postData = {
            id: id,
        };

        return $.ajax({
            type: "POST",
            url: url,
            data: postData,
            success: function(response) {
                response = JSON.parse(response);
                if (response) {
                    $.toast({
                        heading: 'ลบข้อมูลสำเร็จ',
                        icon: 'success',
                        showHideTransition: 'slide',
                        allowToastClose: true,
                        hideAfter: 3000,
                        stack: 5,
                        position: 'bottom-left',
                        textAlign: 'left',
                        loader: true,
                        loaderBg: '#ffff',

                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error occurred:", status, error);
            }
        });
    }
    // Function to handle the AJAX POST request
    function sendPostRequest() {
        var url = `<?= base_url('/Control/saveModel') ?>`;

        var postData = {
            model_name: $("#new_category_name").val(),
        };

        return $.ajax({
            type: "POST",
            url: url,
            data: postData,
            success: function(response) {

                if (response) {
                    $("#list_data").html(response);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error occurred:", status, error);
            }
        });
    }
</script>