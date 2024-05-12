<script>
    $(document).ready(function() {
		$("#search_dateStart").datepicker({
			dateFormat: 'dd / mm / yy', 
			changeMonth: true,     // Enable month dropdown
			changeYear: true,      // Enable year dropdown
			yearRange: 'c-100:c+10', // Allow selection of years from 100 years ago to 10 years from now
            altField : '#dateStart',
            altFormat : "yy-mm-dd",
			onChangeYear: function(year, inst) {
				var buddhistYear = parseInt(year) + 543;
				$(this).datepicker('option', 'yearSuffix', ' ' + buddhistYear);
			}
		});

        $("#search_dateEnd").datepicker({
			dateFormat: 'dd / mm / yy', 
			changeMonth: true,     // Enable month dropdown
			changeYear: true,      // Enable year dropdown
			yearRange: 'c-100:c+10', // Allow selection of years from 100 years ago to 10 years from now
            altField : '#dateEnd',
            altFormat : "yy-mm-dd",
			onChangeYear: function(year, inst) {
				var buddhistYear = parseInt(year) + 543;
				$(this).datepicker('option', 'yearSuffix', ' ' + buddhistYear);
			}
		});


		// Set Thai localization
		$.datepicker.regional['th'] = {
			closeText: 'ปิด',
			prevText: '&#xAB;&#xA0;ย้อน',
			nextText: 'ถัดไป&#xA0;&#xBB;',
			currentText: 'วันนี้',
			monthNames: [
			'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
			'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
			],
			monthNamesShort: [
			'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.',
			'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'
			],
			dayNames: [
			'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'
			],
			dayNamesShort: [
			'อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'
			],
			dayNamesMin: [
			'อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'
			],
			weekHeader: 'Wk',
			dateFormat: 'dd/mm/yy',
			firstDay: 0,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};

		$.datepicker.setDefaults($.datepicker.regional['th']);

	});

      // Initialize DataTable with custom language settings

</script>
<script>

        $("#btn_searchDate").click( async ()=>{
            /* if($("#dateStart").val() && $("#dateEnd").val()){ */
                console.log($("#appointment_status").val())
                $("#btn_searchDate").text('Loading...');
                let res = await sendPostRequest();
                $("#tableData").html(res);
                $("#btn_searchDate").text('Search');

            /* } */
        })

        $("#btn_clear").click(()=>{
            /* if($("#dateStart").val() && $("#dateEnd").val()){ */
                $("#search_dateStart").val('')
                $("#search_dateEnd").val('')
                 $("#dateStart").val('')
                 $("#dateEnd").val('')
                 $('#appointment_status').val('-1').trigger("change")
                 $('#fname').val('')
                 $('#lname').val('')

            /* } */
        })

    // Function to handle the AJAX POST request
    function sendPostRequest() {
        var url = `<?= base_url('admin.php/Admin/searchAdminList') ?>`; // Replace with the URL of your server endpoint

        var postData = {
 /*            dateStart: $("#dateStart").val(),
            dateEnd: $("#dateEnd").val(),
            appointment_status : $('#appointment_status').val(), */
            admin_fname : $('#fname').val(),
            admin_lname : $('#lname').val(),

        };

        // Send the AJAX POST request
        return  $.ajax({
        type: "POST",
        url: url,
        data: postData,
        success: function(response) {
            // Handle the response from the server on successful request
            /* console.log("Response from server:", response); */
        },
       /*  error: function(xhr, status, error) {
            // Handle any error that occurred during the AJAX request
            console.error("Error occurred:", status, error);
        } */
        });
    }

    // Call the function to send the AJAX POST request
    

</script>