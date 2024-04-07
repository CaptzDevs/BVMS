<!-- 
    =========================================
            Calendar point script 
    =========================================
    //* Having bugs ? 🐛
    //* Contact https://github.com/CaptzDevs or FB in github page
-->
<script>

    //Calendar point script 
    //* Having bugs ? 🐛
    //* Contact https://github.com/CaptzDevs or FB in github page


    let date_arr = <?= $queueData ?>;
    let appSection =  <?= $appSection ?>

    console.log(date_arr);
/* 
    let arrDate_after_fix = []

    let arrDate_before_fix = []


    date_arr.forEach((item,i)=>{
      if(i%2 == 1){
        let date = new Date(convertDate(item));
        date.setDate(date.getDate() + 1);

        fullDate = `${date.getFullYear()}${("0"+(date.getMonth()+1)).slice(-2)}${("0"+(date.getDate())).slice(-2)}`;
        arrDate_before_fix.push(+fullDate) 
      }
    })

    date_arr.forEach((item,i)=>{
      if(i%2 == 0){
        let date = new Date(convertDate(item));
        date.setDate(date.getDate() - 1);

        fullDate = `${date.getFullYear()}${("0"+(date.getMonth()+1)).slice(-2)}${("0"+(date.getDate())).slice(-2)}`;
        arrDate_after_fix.push(+fullDate) 
      }
    }) */

    

   

    let d2 = new Date()
    let THIS_YEAR = d2.getFullYear()
    let TODAY = `${d2.getFullYear()}${("0"+(d2.getMonth()+1)).slice(-2)}${("0"+(d2.getDate()+1)).slice(-2)}`

    /* const MAX_RENTDATE = 7 */ // how much date that one user can rent
    const MAX_BOOKINGDATE = 90 // max booking 
    const MAX_QUEUE  = 30 // limit queue

    renderCelendarPoint(THIS_YEAR)
    let renderNextYear = `${THIS_YEAR}1001`
    
    if(TODAY >= +renderNextYear){
        renderCelendarPoint(THIS_YEAR+1)
    }

    let selectDate = []
    $('#app_minute').select2();
    $('#app_hour').select2();

    $(".calen-day").click(async(e)=>{

        $(".form-footer").addClass("d-none") // show time selector

        let start_date = 0 
        let end_date = 0
        let fullDate = e.target.dataset.fulldate
        let year =e.target.dataset.year
        let month = e.target.dataset.month
        let date = e.target.dataset.date
        $(".calen-day").removeClass("selected-date")
        e.target.classList.add("selected-date")

        let avalibleTime = await $.get("<?= base_url('/Client/getQueueTime') ?>",{'date' : `${year}-${month}-${date}` , 'section' : appSection});

        avalibleTime = JSON.parse(avalibleTime)

        let minuteArr = []
        let hourArr  = []
        let timeAvalible = {}
        let prv;
        let c = 0;

        console.log(avalibleTime)

        avalibleTime.map((item,i)=>{
            let timeSplit = item.TIME.split(':');

            if(prv && timeSplit[0] == prv){
                minuteArr.push(timeSplit[1])
            }else{
                minuteArr = []
                minuteArr.push(timeSplit[1])
            }

            timeAvalible[timeSplit[0]] = minuteArr;

            prv = timeSplit[0];
        })

        console.log(timeAvalible)

        $(".form-footer").removeClass("d-none") // show time selector



        
        $('#app_minute').prop("disabled",true);
        $('#app_minute option[value="-1"]').prop('selected', true);


      /*   $('#app_hour').empty().trigger('change');            
        $('#app_hour').append(new Option("นาที", -1,true)) */
        
        $('#app_hour option[value="-1"]').prop('disabled', false);
        $('#app_hour option[value="-1"]').prop('selected', true);
        $('#app_hour').trigger('change');            
        $('#app_hour option[value="-1"]').prop('disabled', true);
 


        $("#app_hour").change((e)=>{
                console.log('DD')
                let prop = ('0'+e.target.value).slice(-2)
                console.log(timeAvalible[prop]);
                
                console.log(">"+prop)

                $('#app_minute').empty().trigger('change');            
                $('#app_minute').append(new Option("นาที", -1,true))
                $('#app_minute option[value="-1"]').prop('disabled', true);

                for(let i = 0 ; i <= 5 ; i++){ 
                let value = i*10;
                let valueText = ('0'+(i*10)).slice(-2);
                
                    if(timeAvalible[prop] && timeAvalible[prop].length == 6){
                        $('#app_minute').append(new Option("ช่วงเวลานี้ได้ถูกจองหมดแล้วโปรดเลือกเวลาอื่น", -1))
                        break
                    }
                    
                    if(timeAvalible[prop] && !timeAvalible[prop].includes(valueText)){

                        let newOption = new Option(valueText, value);
                        $('#app_minute').append(newOption)

                    }

                    if(!timeAvalible[prop]){

                        let newOption = new Option(valueText, value);
                        $('#app_minute').append(newOption)

                    }

                }

            $('#app_minute').trigger('change')
            $('#app_minute').prop("disabled",false);

        })
       

        

        

        /* 
        if(fullDate == selectDate[0] && selectDate.length == 1){
            selectDate.length = 0
            $(".calen-day.start-date-hl").removeClass('start-date-hl')
            $(".calen-day.end-date-hl").removeClass('end-date-hl')


        }else if(fullDate == selectDate[1]){
            selectDate[0] = selectDate[1]
            selectDate.length = 1

            $(".calen-day.selected-date").each((i,item)=>{
                item.classList.remove('selected-date')
                item.classList.remove('start-date-hl')
                item.classList.remove('end-date-hl')

            })
        }
        else if(fullDate == selectDate[0] && selectDate.length == 2){
            selectDate[0] = selectDate[1]
            selectDate.length = 1

            $(".calen-day.selected-date").each((i,item)=>{
                item.classList.remove('selected-date')
                item.classList.remove('start-date-hl')
                item.classList.remove('end-date-hl')

            })
        }
        else if(selectDate.length < 2){
            selectDate.push(fullDate)
            if(+selectDate[1] < +selectDate[0]){
                selectDate.reverse()
                $(".calen-day.start-date-hl").removeClass('start-date-hl')
                $(".calen-day.end-date-hl").removeClass('end-date-hl')

            }
        }else {
            selectDate[1] = fullDate
            
            if(+selectDate[1] < +selectDate[0]){
                selectDate.reverse()
                $(".calen-day.start-date-hl").removeClass('start-date-hl')
                $(".calen-day.end-date-hl").removeClass('end-date-hl')
            }
                $(".calen-day.selected-date").each((i,item)=>{
            
                    item.classList.remove('selected-date')
                    item.classList.remove('end-date-hl')
                    item.classList.remove('start-date-hl')

                })
        } 
       
        //selecting 
        $(".calen-day").each((i,item)=>{

            if(item.dataset.fulldate == selectDate[0]) item.classList.add('start-date-hl')
            if(item.dataset.fulldate == selectDate[1]) item.classList.add('end-date-hl')

            if(selectDate.length == 2 && item.dataset.fulldate >= selectDate[0] && item.dataset.fulldate <= selectDate[1]){
                
                item.classList.add('selected-date')
                if(item.className.includes('disabled-select')){
                    selectDate.length = 0
                    $(".calen-day.selected-date").each((i,item)=>{

                        item.classList.remove('selected-date')
                        item.classList.remove('start-date-hl')
                        item.classList.remove('end-date-hl')
                    })
                }
                
            }
           
            if(selectDate.length == 0){
                item.classList.remove('selected-date')
                item.classList.remove('start-date-hl')
                item.classList.remove('end-date-hl')
            }
        })
   

  
        if(selectDate.length == 0){
          $(".selected-start-date").text('--')
          $(".selected-end-date").text('--')
          $(".selected-amount-date").text('0 days')
          $(".selected-amount-date").removeClass('status-error')
          $("#btn_rent_date").prop('disabled',true)

        }

        if(selectDate.length == 1){
          $(".selected-start-date").text( convertDate(selectDate[0],'dmy').join(' / '))
          $(".selected-end-date").text('--')
          $(".selected-amount-date").text('0 days')
          $(".selected-amount-date").removeClass('status-error')
          $("#btn_rent_date").prop('disabled',true)

        }
        if(selectDate.length == 2){
          
          $(".selected-start-date").text(convertDate(selectDate[0],'dmy').join(' / '))
          $(".selected-end-date").text(convertDate(selectDate[1],'dmy').join(' / '))
          $(".selected-amount-date").text(dateDiff(selectDate[0],selectDate[1])+' days')
         
          if(dateDiff(selectDate[0],selectDate[1]) > MAX_RENTDATE){
            $(".selected-amount-date").addClass('status-error')
          $("#btn_rent_date").prop('disabled',true)

          }else{
            $("#btn_rent_date").prop('disabled',false)
            $(".selected-amount-date").removeClass('status-error')
          $("#btn_rent_date").prop('disabled',false)


          }
        } */

    
        $("#input_selected_appointment_date").val(fullDate)

        let tfulldate = convertDate(fullDate,'dmy')
        let m_th_full = [ "","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", ]
        $(".selected-start-date").text( `${tfulldate[0]} / ${m_th_full[ +tfulldate[1] ]} / ${+tfulldate[2]+543} `)

        /* console.log(selectDate) */
        console.log(fullDate)
        window.scrollTo(0, document.body.scrollHeight);
        if(fullDate &&  $("#app_hour").val() && $("#app_minute").val()) $("#btn_appointment_date").prop("disabled",false)

    })


    /* -------------------------------------------- */
    function convertDate(fulldate,format='mdy'){
        fulldate = (''+fulldate)
        y = (fulldate.slice(0,4))
        m = (fulldate.slice(4,6))
        d = (fulldate.slice(6,8))

        if(format == 'mdy'){
          return [m,d,y]
        }else if(format == 'dmy'){
          return [d,m,y]
        }
    }

    

    function dateDiff(date1,date2){
        let date_format1 = new Date(convertDate(date1))
        let date_format2 = new Date(convertDate(date2))
        const diffTime = Math.abs(date_format2 - date_format1);
        const diffDays = Math.ceil(diffTime / 86400000); 
        return diffDays
    }

    function renderColor(){
    setTimeout(() => {
        let i = 0
        let count = setInterval(() => {
            $('.calen-day')[i].classList.remove('color-none')

            if(i == MAX_BOOKINGDATE /* $('.calen-day').length-1 */){
                clearInterval(count)

                //disabled overflow date 
                $('.color-none').addClass('d-none')
            }
            i++;

        }, 5);
        }, 100);
    }

    function renderDisableDate(){
        
      setTimeout(() => {
        let i = 0
        let count = setInterval(() => {

          if(dateDiff(TODAY,$('.calen-day')[i].dataset.fulldate) >= MAX_BOOKINGDATE){
            $('.calen-day')[i].classList.add('color-none')

          }
            if(i == $('.calen-day').length-1){
                clearInterval(count)
            }
            i++;

        }, 5);
        }, 100);

       /*   let i = 0
         
        while(i < 20){
            console.log($('.calen-day')[i].dataset.fulldate)
            if(dateDiff(TODAY,$('.calen-day')[i].dataset.fulldate) >= MAX_BOOKINGDATE){
              $('.calen-day')[i].classList.add('color-none')
  
            }
              i++;
          }

          console.log(i) */
    }





    function daysInYear(year) {
        return ((year % 4 === 0 && year % 100 > 0) || year %400 == 0) ? 366 : 365;
    }

    function renderCelendarPoint(year){
            let arrDaysOfMonth = []

            for (let i = 1 ; i <= 12; i++){
                arrDaysOfMonth.push(new Date(year, i, 0).getDate())
            }
            
            let month_c = 0;
            let date_inMonth = 0

            let disabled_select = ''

            let queueArr = date_arr

            let count_arr = 0;

            let month_section = ["red6","orange6","yellow6",'lime6',"green6",'teal6','cyan6',"blue6","indigo6","violet6",'purple','grape6']

            $("#calendar_points")[0].insertAdjacentHTML("beforeend",`<section class='section-year' id='year_${year}'></section>` )

            let prevMonth;
            for (let i = 1 ; i <= daysInYear(year); i++){

                date_inMonth++

                if(date_inMonth > arrDaysOfMonth[month_c]){
                    month_c += 1;
                    date_inMonth = 1

                }

                let fullDate = `${year}${("0"+(+month_c+1)).slice(-2)}${("0"+(date_inMonth)).slice(-2)}`
                
                let month = `${("0"+(month_c+1)).slice(-2)}`
                let date = `${("0"+(date_inMonth)).slice(-2)}`


                let fullDateCheckQueue = `${year}-${("0"+(+month_c+1)).slice(-2)}-${("0"+(date_inMonth)).slice(-2)}`
           
                let QUEUE = queueArr.filter(q => q.DATE == fullDateCheckQueue);
                    QUEUE = QUEUE.length > 0 ? QUEUE[0]['queueNum'] : 0

                let limitQueue = QUEUE == MAX_QUEUE ? 'limitQueue' : ''

                let disabled_select_before =  +fullDate < TODAY ? 'disabled-select' : '' 

            /* console.log(fullDate,arrDate_fix[count_arr == 0 ? count_arr: count_arr-1 ]) */

            
            
        /*     if(+date_ex[count_arr] <= +fullDate && +date_ex[count_arr+1] >= +fullDate){
                    disabled_select = 'disabled-select' 
                } else{
                    disabled_select =  ''
                }

                if(+date_ex[count_arr+1] == +fullDate){
                    count_arr +=2
                } */

       /*      arrDate_before_fix.forEach((item)=>{
                if(item== fullDate){
                    disabled_select = 'disabled-fix' 
                }
            })

            arrDate_after_fix.forEach((item)=>{
                if(item== fullDate){
                    disabled_select = 'disabled-fix' 
                }
            }) */


            let get_day_of_week = new Date(year, +month-1, date);
            let dayOfWeek = get_day_of_week.getDay();

            let d_th_full = ["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์"]

            
                    $(`#year_${year}`)[0].insertAdjacentHTML("beforeend",`
                        
                        <div class='month-section-${month} month-section '>
                        <div class="calen-day color-none ${disabled_select_before} ${disabled_select} ${limitQueue}" 
                                data-fulldate = '${fullDate}'
                                data-year = '${year}'
                                data-month = '${month}'
                                data-date = '${date}'

                        style="background:var(--${month_section[month_c]});">
                        <span>${d_th_full[dayOfWeek]}</span>
                        <span>${date}/${month}/${year}  </span>
                        <span class='queue-num' style='font-size:.5rem'>จำนวนคิว ${QUEUE}/30  </span>


                  
                        </div>
                        </div>
                    ` )
                  
                    
            }

            $('.disabled-select').parent().remove()

        
    
            $(".month-label-section").click((e)=>{
                        $(".month-section").addClass('d-none')
                       /*  $(`body`)[0].scrollTo({
                            top : $(`.month-section-${('0'+e.target.id).slice(-2)}`)[0].offsetTop-80,
                            behavior: 'smooth'
                        }) */
                        $(`.month-section-${('0'+e.target.id).slice(-2)}`).removeClass('d-none')
                      
            })

            let currMonth = new Date().getMonth()+1;

            $(`#${currMonth}.month-label-section`).trigger('click');

            $(`#${currMonth}.month-label-section`).addClass("hl-month")

            renderColor()
            

        
            /* renderDisableDate() */

               //---------------------------
                


            /*    for (let i = 1 ; i <= 12; i++){
                let numberOfDateInMonth = $(`.month-section-${('0'+i).slice(-2)}`).children().length

                if(numberOfDateInMonth == 0){
                        $(`.month-label-section#${i}`).css("opacity",'10%')
                }
                if(numberOfDateInMonth > 0){
                    $(`.month-label-section#${i}`).css("opacity",'100%')
                }
            } */
    }
  
</script>
<!-- ============================================================================= -->
<script>
		
        //====================================
        // Initial Form
        //====================================

        $('.select-nosearch').select2({
				minimumResultsForSearch: Infinity
				
		});

        let form_appointment = $('#form_appointment').parsley();

        const TEL_MASK = IMask($("#tel")[0], {
            mask: '000-000-0000'
        });
			
        $(".month-label-section").click(e=>{
            $(".month-label-section").removeClass('hl-month')
            e.target.classList.add("hl-month")
        })
        $("#app_hour,#app_minute").change((e)=>{

            if($("#input_selected_appointment_date").val() && $("#app_hour").val() && $("#app_minute").val()) {
            
                $("#btn_appointment_date").prop("disabled",false)
            }
            
        })

        $("#btn_appointment_cancel").click(e=>{
                $(".form-appointment").removeClass('d-none')
                $(".form-calendar").addClass('d-none')
            })

        //====================================

      

        $("#appointment_type").change((e)=>{
            console.log(e.target.value)
            if(e.target.value == 0){
                $("#appointment_type_other_warper").removeClass("d-none")
                $("#appointment_type_other").prop("required",true);

            }else{
                $("#appointment_type_other_warper").addClass("d-none")
                $("#appointment_type_other").prop("required",false);

            }
        })


        function saveAppointment(){

            
            let formData = new FormData($("#form_appointment")[0])

            if( $("#appointment_type").val() == 0){
                formData.set('appointment_type',0)
            }
            formData.delete('appointment_date_showed')
            formData.delete('db-date')
            formData.delete('db-month')
            formData.delete('db-year')
   /*          formData.set('tel',TEL_MASK.unmaskedValue) */
            console.log(TEL_MASK.unmaskedValue)

           /*  formData.append('birthdate',`${$("#db-year").val()}-${('0'+$("#db-month").val()).slice(-2)}-${('0'+$("#db-date").val()).slice(-2)}`) */

            let data = {};

            formData.forEach(function(value, key){
                data[key] = value;
            });

            let jsonData = JSON.stringify(data);



            return $.ajax({
                url: '<?= base_url("/Control/saveAppointment") ?>',
                type: 'POST',
                contentType: 'application/json',
                data: jsonData,
                success: function (response,status) {
                   
                    console.log(response,status);


                    if(appSection == '1'){
                        if(response > 0 && status == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: 'ทำการนัดเสร็จสิ้น',
                                showDenyButton: true,
                                confirmButtonText: 'ดูบัตรนัด',
                                denyButtonText: `ไปหน้าหลัก`,
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {

                                    location.href = `<?= base_url("/Client/Card/".$_SESSION['id'].'/') ?>${response}`

                                } else if (result.isDenied) {

                                    location.href = `<?= base_url("/Client") ?>`

                                }
                        })
                        }
                    }
                    if(appSection == '2' && myDropzone.getQueuedFiles().length == 0){

                            if(response > 0 && status == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ทำการนัดเสร็จสิ้น',
                                    showDenyButton: true,
                                    confirmButtonText: 'ดูบัตรนัด',
                                    denyButtonText: `ไปหน้าหลัก`,
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {

                                        location.href = `<?= base_url("/Client/Card/".$_SESSION['id'].'/') ?>${response}`

                                    } else if (result.isDenied) {

                                        location.href = `<?= base_url("/Client") ?>`

                                    }
                            })
                        }
					}else{
                        myDropzone.on("sending", function(file, xhr, formData) {
                            formData.append('user_id',"<?= $_SESSION['id']?>");
                            formData.append('app_id',response);

                        });

                        myDropzone.processQueue(); // Initiate file upload
                    }


                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error('AJAX error:', error);
                }
                });

        }

        $("#btn_save_appointment").click(async e=>{
            

            if(form_appointment.isValid()){
                $("#btn_save_appointment").text('กำลังตรวจสอบ...')
                $("#btn_save_appointment").prop('disabled',true)

                await saveAppointment()

                $("#btn_save_appointment").text('ทำการนัด')
                $("#btn_save_appointment").prop('disabled',false)

            }

        })



          function editAppointment(){

            
            let formData = new FormData($("#form_appointment")[0])
            formData.delete('appointment_date_showed')
            formData.delete('db-date')
            formData.delete('db-month')
            formData.delete('db-year')
   /*          formData.set('tel',TEL_MASK.unmaskedValue) */
            console.log(TEL_MASK.unmaskedValue)

           /*  formData.append('birthdate',`${$("#db-year").val()}-${('0'+$("#db-month").val()).slice(-2)}-${('0'+$("#db-date").val()).slice(-2)}`) */

            let data = {};

            formData.forEach(function(value, key){
                data[key] = value;
            });

            let jsonData = JSON.stringify(data);

            return $.ajax({
                url: '<?= base_url("/Control/editAppointment") ?>',
                type: 'POST',
                contentType: 'application/json',
                data: jsonData,
                success: function (response,status) {
                   
                    console.log(response,status);

                 
                    if(appSection == '1'){
                        if(response > 0 && status == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: 'ทำการนัดเสร็จสิ้น',
                                showDenyButton: true,
                                confirmButtonText: 'ดูบัตรนัด',
                                denyButtonText: `ไปหน้าหลัก`,
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {

                                    location.href = `<?= base_url("/Client/Card/".$_SESSION['id'].'/') ?>${response}`

                                } else if (result.isDenied) {

                                    location.href = `<?= base_url("/Client") ?>`

                                }
                        })
                        }
                    }
                    if(appSection == '2' && myDropzone.getQueuedFiles().length == 0){

                            if(response > 0 && status == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ทำการนัดเสร็จสิ้น',
                                    showDenyButton: true,
                                    confirmButtonText: 'ดูบัตรนัด',
                                    denyButtonText: `ไปหน้าหลัก`,
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {

                                        location.href = `<?= base_url("/Client/Card/".$_SESSION['id'].'/') ?>${response}`

                                    } else if (result.isDenied) {

                                        location.href = `<?= base_url("/Client") ?>`

                                    }
                            })
                        }
					}else{
                        myDropzone.on("sending", function(file, xhr, formData) {
                            formData.append('user_id',"<?= $_SESSION['id']?>");
                            formData.append('app_id',response);

                        });

                        myDropzone.processQueue(); // Initiate file upload
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error('AJAX error:', error);
                }
                });

        }

        $("#btn_edit_appointment").click(async e=>{
            

            if(form_appointment.isValid()){
                $("#btn_edit_appointment").text('กำลังตรวจสอบ...')
                $("#btn_edit_appointment").prop('disabled',true)

                await editAppointment()

                $("#btn_edit_appointment").text('แก้ไขการนัด')
                $("#btn_edit_appointment").prop('disabled',false)

            }

        })

        //====================================


        $("#btn_seclect_appointment_date").click(e=>{
            e.preventDefault()

            //show calendar point
            $("#form_calendar").removeClass('d-none')
            $(".form-appointment").addClass('d-none')
        })

        //====================================

        $("#btn_appointment_date").click(e=>{
            e.preventDefault()

            let date =  $("#selected_appointment_date").text()
            let time  = `${('0'+$("#app_hour").val()).slice(-2)}:${('0'+$("#app_minute").val()).slice(-2)}`;
            
                Swal.fire({
                    icon : "info",
                    title: 'ต้องการเลือกวันนัด',
                    text : `วันที่ ${date} เวลา ${time}`,
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

                    let [d,m,y] = convertDate($("#input_selected_appointment_date").val(),'dmy')
                    
                    $("#appointment_date").val(`${y}-${m}-${d} ${time}:00`)
                    console.log($("#appointment_date").val())


                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })


        })


</script>
<script>
 	// Instantiate Dropzone
     Dropzone.autoDiscover = false;
     var myDropzone = new Dropzone("#myDropzone2", {
			init: function() {
	
				this.on("addedfile", function(file) {
					// Hide progress bar when a file is added
                    if (this.files[1]!=null){
                            this.removeFile(this.files[0]);
                        }
					file.previewElement.querySelector(".dz-progress").style.opacity = "0";
				});

				this.on("uploadprogress", function(file, progress, bytesSent) {
					// Show progress bar during upload
					file.previewElement.querySelector(".dz-progress").style.opacity = "1";
				});

			},
			url: "<?php echo base_url('/Control/uploadImage') ?>", // Replace with your upload URL
			maxFiles: 1, // Maximum number of files to upload
			maxFilesize: 5, // Maximum file size (in MB)
			addRemoveLinks: true, // Show remove file links
			autoProcessQueue: false, // Disable auto processing
			acceptedFiles: "image/*,application/pdf",

			success: function(file, response) {
				// File upload success
                response = JSON.parse(response)
                console.log(response)
                console.log(response.file.id)

                Swal.fire({
                            icon: 'success',
                            title: 'ทำการนัดเสร็จสิ้น',
                            showDenyButton: true,
                            confirmButtonText: 'ดูบัตรนัด',
                            denyButtonText: `ไปหน้าหลัก`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {

                                location.href = `<?= base_url("/Client/Card/".$_SESSION['id'].'/') ?>${response.file.id}`

                            } else if (result.isDenied) {

                                location.href = `<?= base_url("/Client") ?>`

                            }
                    })
			},

			error: function(file, response) {
				// File upload error
				console.error("File upload error:", response);
				$('.dropzoneError').html("File upload error : "+ response)
				$("#btn-register").prop('disabled',false)

			},

		});
</script>