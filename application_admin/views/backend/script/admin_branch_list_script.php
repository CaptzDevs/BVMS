<script>
    $(document).ready(function() {

        $("#clearSearch").click((e) => {
            $('#searchArticle').val("").trigger("keyup")
        })

        $(".tag-btn").click((e) => {
            $('#searchArticle').val('tag:' + e.target.dataset.value + ' ').trigger("keyup")

            $(".btn-hideData").off('click')

            $(".btn-hideData").click(async (e) => {

                if (e.target.className.includes("show-data")) {
                    await showData(e.target.dataset.id);
                    e.target.classList.add('hide-data');
                    e.target.classList.remove('show-data');
                    console.log('d')
                } else if (e.target.className.includes("hide-data")) {
                    await hideData(e.target.dataset.id);
                    e.target.classList.remove('hide-data');
                    e.target.classList.add('show-data');
                    console.log('3')

                }


                console.log(e.target)
            })

        })

        $(".paginate_button").click(() => {
            $(".btn-hideData").off('click')

            $(".btn-hideData").click(async (e) => {

                if (e.target.className.includes("show-data")) {
                    await showData(e.target.dataset.id);
                    e.target.classList.add('hide-data');
                    e.target.classList.remove('show-data');
                    console.log('d')
                } else if (e.target.className.includes("hide-data")) {
                    await hideData(e.target.dataset.id);
                    e.target.classList.remove('hide-data');
                    e.target.classList.add('show-data');
                    console.log('3')

                }


                console.log(e.target)
            })

        })

        $("#example13_filter > label > input").hide()
        $("#searchArticle").keyup((e) => {
            $("#example13_filter > label > input").val(e.target.value).trigger('input')

            $(".btn-hideData").off('click')

            $(".btn-hideData").click(async (e) => {

                if (e.target.className.includes("show-data")) {
                    await showData(e.target.dataset.id);
                    e.target.classList.add('hide-data');
                    e.target.classList.remove('show-data');
                    console.log('d')
                } else if (e.target.className.includes("hide-data")) {
                    await hideData(e.target.dataset.id);
                    e.target.classList.remove('hide-data');
                    e.target.classList.add('show-data');
                    console.log('3')

                }


                console.log(e.target)
            })

        })


        $(".btn-hideData").click(async (e) => {

            if (e.target.className.includes("show-data")) {
                await showData(e.target.dataset.id);
                e.target.classList.add('hide-data');
                e.target.classList.remove('show-data');
                console.log('d')
            } else if (e.target.className.includes("hide-data")) {
                await hideData(e.target.dataset.id);
                e.target.classList.remove('hide-data');
                e.target.classList.add('show-data');
                console.log('3')

            }


            console.log(e.target)
        })

        /*  $(".btn-delete").click((e)=>{
             deleteProduct(e.target.dataset.id)
         }) */

        function deleteProduct(articleID) {
            return $.ajax({
                url: '<?= base_url("/Control/deleteProduct") ?>',
                type: 'POST',
                data: {
                    id: articleID
                },
                success: function(response, status) {

                    if (response == 1) {
                        console.log("Deleted :", articleID)
                        location.href = "<?= base_url('/Admin/Products') ?>";
                    }

                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('AJAX error:', error);
                }
            });
        }


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

    var table = $('#example13').DataTable({
        order: [
            [0, 'asc'],
        ],
        pageLength: 10,
        rowReorder: {
            selector: '.reorder'
        }

    });

    table.on('row-reordered', async function(e, diff, edit) {
        console.log(diff)
        let dataRowUpdate = []
        diff.map((item, i) => {
            let dataRow = {}
            dataRow.id = item.node.dataset.id
            dataRow.data_order = item.newPosition
            dataRowUpdate.push(dataRow)
        })
        if (dataRowUpdate.length > 0) {
            await updateProductRowOrder(dataRowUpdate)
        }

        table.destroy()
        var table = $('#example13').DataTable({
            order: [
                [0, 'asc'],
            ],
            pageLength: 10,
            rowReorder: {
                selector: 'tr'
            }

        });

    });
</script>
<script>
    let timeOut;
    let timeCount = 0;
    let stopLoop = false;
    /* sendSearchRequest("") */

    function updateProductRowOrder(dataRowUpdate) {

        let jsonData = JSON.stringify(dataRowUpdate);

        console.log('d')

        return $.ajax({
            url: '<?= base_url("/Control/updateProductRowOrder") ?>',
            type: 'POST',
            contentType: 'application/json',
            data: jsonData,
            success: function(response, status) {
                /* console.log(response, status); */
                if (response) {
                    $.toast({
                        heading: 'บันทึกข้อมูลสำเร็จ',
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
                // Handle errors here
                console.error('AJAX error:', error);
            }
        });

    }

    function sendSearchRequest(value) {
        var url = `<?= base_url('/Control/searchCategory') ?>`;
        var postData = {
            searchCategory: value,
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
        var url = `<?= base_url('/Control/editCategory') ?>`;

        var postData = {
            id: id,
            category_name: $(`.category-name#${id}`).val(),
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


    function hideData(id) {
        var url = `<?= base_url('/Control/hideData') ?>`;

        var postData = {
            id: id,
            table: "product",
        };

        return $.ajax({
            type: "POST",
            url: url,
            data: postData,
            success: function(response) {

                if (response) {
                    /* $("#list_data").html(response); */
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


    function showData(id) {
        var url = `<?= base_url('/Control/showData') ?>`;

        var postData = {
            id: id,
            table: "product",
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
        var url = `<?= base_url('/Control/deleteProduct') ?>`;

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
        var url = `<?= base_url('/Control/saveCategory') ?>`;

        var postData = {
            category_name: $("#new_category_name").val(),
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