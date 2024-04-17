<!-- 
    =========================================
            Calendar point script 
    =========================================
    //* Having bugs ? 🐛
    //* Contact https://github.com/CaptzDevs or FB in github page
-->

<!-- ============================================================================= -->
<!-- Include the Quill library -->
<!-- <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script> -->
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
      $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview']]
        ]

        });


    $('#summernote_eng').summernote({
            height: 300,
            toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear','fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview']]
        ]

        });
    });


/*     $("#product_name").val("ทดสอบ")
    $("#product_name_eng").val("Test")
    $("#description").val("ddddddddddddddddddddddddd")
    $("#price").val(2000)
    $("#price_pro").val(4000) */
    

</script>

<script>
    //====================================
    // Initial Form
    //====================================

      let branchID = '<?= $product_id ?>'
      let checkedData = '<?= $checkedData ?>'

        checkedData = JSON.parse(checkedData)

        console.log(checkedData)
        function arrayDifference(arr1, arr2, key) {
            return arr1.filter(item1 => !arr2.some(item2 => item1[key] === item2[key]));
        }


      $(document).ready(function() {

        $("#saveBranchCCTV").click((e)=>{
            $("#saveBranchCCTV").prop("disabled",true)
            let dataBSet = []

            $('.hostbox:checked[data-type="save"]').map((i,item)=>{
                let dataset = item.dataset
                dataBSet.push({
                    branchid : dataset.branchid,
                    hostid : dataset.hostid,
                    groupid : dataset.groupid,
                    type : dataset.type,
                })
            })

            $('.hostbox[data-type="init"]:not(:checked)').map((i,item)=>{
                let dataset = item.dataset
                dataBSet.push({
                    branchid : dataset.branchid,
                    hostid : dataset.hostid,
                    groupid : dataset.groupid,
                    type : dataset.type,
                })
            })

            console.log(dataBSet)

            $.ajax({
            url: '<?= base_url("/admin.php/Dashboard/insertData") ?>',
            type: 'POST',
            data: {
                data: dataBSet
            },
            success: function(response, status) {

               if(response == 1){

                Swal.fire({
                        icon: 'success',
                        title: 'บันทึกแล้ว',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        window.location.reload()
                    })
               }
            },

            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        })
        })

      
        
        $("#openModalCCTV").click((e)=>{
            $.ajax({
            url: '<?= base_url("admin.php/Dashboard/CCTVDataTable") ?>',
            type: 'get',
            data : {
                branchid : branchID,
            },
            success: function(response, status) {

                console.log(response)
                if(response.length > 0){
                        $('#tableData').html(response)
                }


                $('tr').click(function(){
                    console.log('dd')
                var checkbox = $(this).find('input[type="checkbox"]');
                checkbox.prop('checked', checkbox.prop('checked'));
            });
              

            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        })
        })

 

        $("#model_id").change((e)=>{

            $.ajax({
            url: '<?= base_url("/Control/getSeriesByModelID") ?>',
            type: 'POST',
            data: {
                model_id: e.target.value
            },
            success: function(response, status) {

                response = JSON.parse(response)
                $('#series_id').empty();

                if(response.length > 0){
                    response.map((item,i)=>{
                        $('#series_id').append(`
                            <option value="${item?.id}" > ${ item?.series_name }</option>
                        `)
                    })
                }

            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        })
    })

      $(".custom-checkbox-input").change(function(e) {
        
        if ($(`#check-main-${e.target.dataset.id}`).is(":checked")) {
            $(`#check-main-${e.target.dataset.id}`).prop("checked", false);
        } else {
            $(`#check-main-${e.target.dataset.id}`).prop("checked", true);
        }
      });

      $(".btn-description-copy").click(function(e) {
            console.log(e.target)
            
            var range = document.createRange();
                range.selectNode($('.container-description')[0]);

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



 
    function deleteProduct(articleID) {
        return $.ajax({
            url: '<?= base_url("admin.php/Control/deleteProduct") ?>',
            type: 'POST',
            data: {
                id: articleID
            },
            success: function(response, status) {

                if (response == 1) {
                    console.log("Deleted :", articleID)
                    location.href = "<?= base_url('admin.php/Admin/Branchs') ?>";
                }

            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });
    }


    function deleteImage(imageId) {
        return $.ajax({
            url: '<?= base_url("/Control/deleteImage") ?>',
            type: 'POST',
            data: {
                id: imageId
            },
            success: function(response, status) {

                if (response == 1) {
                    console.log("Deleted :", imageId)
                    $(`#card-image-${imageId}`).fadeOut().remove();

                }

            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });
    }

    function deleteFile(fileId) {
        return $.ajax({
            url: '<?= base_url("/Control/deleteFile") ?>',
            type: 'POST',
            data: {
                id: fileId
            },
            success: function(response, status) {

                if (response == 1) {
                    console.log("Deleted :", fileId)
                    $(`#card-file-${fileId}`).fadeOut().remove();

                }

            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });
    }

    function renameFile(fileId,filename) {
        return $.ajax({
            url: '<?= base_url("/Control/renameFile") ?>',
            type: 'POST',
            data: {
                id: fileId,
                file_name : filename
            },
            success: function(response, status) {

                if (response == 1) {
                    $.toast({
                        heading: 'เปลี่ยนชื่อไฟล์สำเร็จ',
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
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });
    }

    $(".btn-delete-article").click((e)=>{
        Swal.fire({
            icon: 'warning',
            title: 'ต้องการลบใช่หรือไม่',
            showDenyButton: true,
            confirmButtonText: 'ลบ',
            denyButtonText: `ยกเลิก`,
            denyButtonColor: '#228be6',
            confirmButtonColor: '#e03131',

        }).then((result) => {
            if (result.isConfirmed) {
                deleteProduct(e.target.dataset.id)
            }
        })
    })

    $(".btn-delete-image").click((e) => {
        Swal.fire({
            icon: 'warning',
            title: 'ต้องการลบภาพนี้ใช่หรือไม่',
            showDenyButton: true,
            confirmButtonText: 'ลบ',
            denyButtonText: `ยกเลิก`,
            denyButtonColor: '#228be6',
            confirmButtonColor: '#e03131',

        }).then((result) => {
            if (result.isConfirmed) {
                deleteImage(e.target.dataset.id)
            }
        })
    })

    $(".btn-delete-file").click((e) => {
        Swal.fire({
            icon: 'warning',
            title: 'ต้องการลบไฟล์นี้ใช่หรือไม่',
            showDenyButton: true,
            confirmButtonText: 'ลบ',
            denyButtonText: `ยกเลิก`,
            denyButtonColor: '#228be6',
            confirmButtonColor: '#e03131',

        }).then((result) => {
            if (result.isConfirmed) {
                deleteFile(e.target.dataset.id)
            }
        })
    })


    $(".btn-edit-file").click((e)=>{
        $(`.file-url[data-id='${e.target.dataset.id}']`).addClass("d-none")
        $(`.file-name-save[data-id='${e.target.dataset.id}']`).removeClass("d-none")
        $(`.file-name[data-id='${e.target.dataset.id}']`).removeClass("d-none")

        $(`.file-name[data-id='${e.target.dataset.id}']`).focus()
    })

    $(`.file-name`).on("blur", async (e)=>{
        $(`.file-url[data-id='${e.target.dataset.id}']`).removeClass("d-none")
        $(`.file-name[data-id='${e.target.dataset.id}']`).addClass("d-none")
        $(`.file-name-save[data-id='${e.target.dataset.id}']`).addClass("d-none")

        $(`.file-url[data-id='${e.target.dataset.id}']`).text(e.target.value)


        await renameFile(e.target.dataset.id,e.target.value);
    })



    $('.select-nosearch').select2({
        minimumResultsForSearch: Infinity

    });

 
    let form_appointment = $('#form_article').parsley();

    /*  const TEL_MASK = IMask($("#tel")[0], {
         mask: '000-000-0000'
     }); */

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



    $("#appointment_type").change((e) => {
        console.log(e.target.value)
        if (e.target.value == 0) {
            $("#appointment_type_other_warper").removeClass("d-none")
            $("#appointment_type_other").prop("required", true);

        } else {
            $("#appointment_type_other_warper").addClass("d-none")
            $("#appointment_type_other").prop("required", false);

        }
    })




    function saveData() {

        let formData = new FormData($("#form_article")[0])

        let data = {};
        console.log($('#summernote').summernote('code'))
      
        formData.append('description',$('#summernote').summernote('code'))
       /*  formData.append('description_eng',$('#summernote_eng').summernote('code')) */

        formData.delete("files")


        formData.forEach(function(value, key) {
            data[key] = value;
        });

        console.log(data)
    
        let jsonData = JSON.stringify(data);

        console.log('d')

        return $.ajax({
            url: '<?= base_url("admin.php/Control/saveBranch") ?>',
            type: 'POST',
            data: jsonData,
            success: function(response, status) {

                console.log(response, status);

                let imageLength = dropzoneImage.getQueuedFiles().length
                let fileLength = dropzoneFile.getQueuedFiles().length

                let countImage = 0
                let countFile = 0



                if (imageLength == 0 && fileLength == 0) {

                    Swal.fire({
                        icon: 'success',
                        title: 'บันทึกแล้ว',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "<?= base_url("admin.php/Admin/Branch/") ?>" + response
                        }
                        setTimeout(() => {
                            location.href = "<?= base_url("admin.php/Admin/Branch/") ?>" + response
                        }, 1000);
                    })
                } else {

                    if (dropzoneImage.getQueuedFiles().length > 0) {

                        dropzoneImage.on("sending", function(file, xhr, formData) {
                            formData.append('ref_id', response);
                            formData.append('type', '1');

                        });
                        dropzoneImage.processQueue();
                    }

                    if (dropzoneFile.getQueuedFiles().length > 0) {

                        dropzoneFile.on("sending", function(file, xhr, formData) {
                            formData.append('ref_id', response);
                            formData.append('type', '1');

                        });

                        dropzoneFile.processQueue();
                    }

                    console.log(imageLength, fileLength)

                    let uploadingImage = new Promise((resolve, reject) => {

                        if (imageLength == 0) {
                            resolve(0);
                        } else {
                            dropzoneImage.on("complete", function(file, xhr, formData) {
                                countImage++;
                                if (countImage == imageLength) {
                                    resolve(1);
                                }
                            });
                        }

                    });

                    let uploadingFile = new Promise((resolve, reject) => {
                        if (fileLength == 0) {
                            resolve(0);
                        } else {

                            dropzoneFile.on("complete", function() {
                                countFile++;

                                if (countFile == fileLength) {
                                    resolve(1);
                                }

                            });

                        }
                    });

                    Promise.all([uploadingImage, uploadingFile])
                        .then((awresponse) => {
                            console.log(awresponse)

                            if (awresponse[0] == 1 || awresponse[1] == 1) {
                                console.log(countImage)
                                console.log(countFile)

                               /*  location.href = "<?= base_url("admin.php/Admin/Branch/") ?>" + response */
                            }
                        })
                        .catch((error) => {
                            // Handle any errors that occurred during initialization or uploads
                        });

                }
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });

    }

    $("#btn_save_appointment").click(async e => {


        if (form_appointment.isValid()) {
            $("#btn_save_appointment").text('กำลังตรวจสอบ...')
            $("#btn_save_appointment").prop('disabled', true)

            await saveData()

            $("#btn_save_appointment").text('บันทึก')
            $("#btn_save_appointment").prop('disabled', false)

        }

    })



    function editAppointment() {

        let productID = <?= isset($product_id) ? $product_id : 0 ?>;
        let formData = new FormData($("#form_article")[0])

        formData.append('id', productID);
        formData.append('description',$('#summernote').summernote('code'))
        formData.delete("files")

        let data = {};

        formData.forEach(function(value, key) {
            data[key] = value;
        });

        let jsonData = JSON.stringify(data);

        console.log('d')

        return $.ajax({
            url: '<?= base_url("admin.php/Control/editProduct") ?>',
            type: 'POST',
          /*   contentType: 'application/json', */
            data: data,
            success: function(response, status) {

                console.log(response, status);

                let imageLength = dropzoneImage.getQueuedFiles().length
                let fileLength = dropzoneFile.getQueuedFiles().length
                let countImage = 0
                let countFile = 0

                if (imageLength == 0 && fileLength == 0) {

                    Swal.fire({
                        icon: 'success',
                        title: 'บันทึกแล้ว',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "<?= base_url("admin.php/Admin/Branch/") ?>" + response
                        }
                        setTimeout(() => {
                            location.href = "<?= base_url("admin.php/Admin/Branch/") ?>" + response
                        }, 1000);
                    })
                } else {

                    if (dropzoneImage.getQueuedFiles().length > 0) {

                        dropzoneImage.on("sending", function(file, xhr, formData) {
                            formData.append('ref_id', response);
                            formData.append('type', '1');
                        });
                        dropzoneImage.processQueue();
                    }

                    if (dropzoneFile.getQueuedFiles().length > 0) {

                        dropzoneFile.on("sending", function(file, xhr, formData) {
                            formData.append('ref_id', response);
                            formData.append('type', '1');
                        });

                        dropzoneFile.processQueue();
                    }

                    console.log(imageLength, fileLength)

                    let uploadingImage = new Promise((resolve, reject) => {

                        if (imageLength == 0) {
                            resolve(0);
                        } else {
                            dropzoneImage.on("complete", function(file, xhr, formData) {
                                countImage++;
                                if (countImage == imageLength) {
                                    resolve(1);
                                }
                            });
                        }

                    });

                    let uploadingFile = new Promise((resolve, reject) => {
                        if (fileLength == 0) {
                            resolve(0);
                        } else {

                            dropzoneFile.on("complete", function() {
                                countFile++;

                                if (countFile == fileLength) {
                                    resolve(1);
                                }

                            });

                        }
                    });

                    Promise.all([uploadingImage, uploadingFile])
                        .then((awresponse) => {
                            console.log(awresponse)

                            if (awresponse[0] == 1 || awresponse[1] == 1) {
                                console.log(countImage)
                                console.log(countFile)

                                /* location.href = "<?= base_url("/Admin/Branch/") ?>" + response */
                            }
                        })
                        .catch((error) => {
                            // Handle any errors that occurred during initialization or uploads
                        });


                }
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });

    }

    $("#btn_edit_appointment").click(async e => {


        if (form_appointment.isValid()) {
            $("#btn_edit_appointment").text('กำลังตรวจสอบ...')
            $("#btn_edit_appointment").prop('disabled', true)

            await editAppointment()

            $("#btn_edit_appointment").text('บันทึก')
            $("#btn_edit_appointment").prop('disabled', false)

        }

    })

    //====================================


    $("#btn_seclect_appointment_date").click(e => {
        e.preventDefault()

        //show calendar point
        $("#form_calendar").removeClass('d-none')
        $(".form-appointment").addClass('d-none')
    })
</script>
<script>
    // Instantiate Dropzone
    Dropzone.autoDiscover = false;

    function initDropZone(elemId, uploadUrl, accept) {
        var myDropzone = new Dropzone("#" + elemId, {
            init: function() {

                this.on("uploadprogress", function(file, progress, bytesSent) {
                    // Show progress bar during upload
                    file.previewElement.querySelector(".dz-progress").style.opacity = "1";
                });

            },
            url: uploadUrl, // Replace with your upload URL
            addRemoveLinks: true, // Show remove file links
            autoProcessQueue: false, // Disable auto processing
            acceptedFiles: accept,
            parallelUploads: 6,
            success: function(file, response) {
                // File upload success
                response = JSON.parse(response)
                console.log(response)
                console.log(response.file.ref_id)

                setTimeout(() => {
                    location.href = "<?= base_url("admin.php/Admin/Branch/") ?>" + response.file.ref_id
                }, 1000);


            },

            error: function(file, response) {
                // File upload error
                console.error("File upload error:", response);
                $('.dropzoneError').html("File upload error : " + response)
                $("#btn-register").prop('disabled', false)
            },

        });
        return myDropzone;
    }


    let dropzoneImage = initDropZone("dz-image", "<?php echo base_url('admin.php/Control/uploadImage') ?>", 'image/*');
    let dropzoneFile = initDropZone("dz-file", "<?php echo base_url('admin.php/Control/uploadFile') ?>", '.pdf');
</script>