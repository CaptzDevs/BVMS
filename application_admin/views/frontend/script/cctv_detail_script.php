<script>
    const BRANCH_ID = <?= $branchID ?>;
    const CCTV_ID = <?= $typeID ?>;


    $(document).ready(function($) {
        "use strict";

        var mapId = "ts-map-hero";

        //==================================================================================================================
        // VARIABLES
        // =================================================================================================================

        var newMarkers = [];
        var loadedMarkersData = [];
        var allMarkersData;
        var lastMarker;
        var map;
        var markerCluster;

        if ($("#" + mapId).length) {
            //==============================================================================================================
            // MAP SETTINGS
            // =============================================================================================================
            var mapElement = $(document.getElementById(mapId));
            var mapDefaultZoom = parseInt(mapElement.attr("data-ts-map-zoom"), 10);
            var centerLatitude = mapElement.attr("data-ts-map-center-latitude");
            var centerLongitude = mapElement.attr("data-ts-map-center-longitude");
            var locale = mapElement.attr("data-ts-locale");
            var currency = mapElement.attr("data-ts-currency");
            var unit = mapElement.attr("data-ts-unit");
            var controls = parseInt(mapElement.attr("data-ts-map-controls"), 10);
            var scrollWheel = parseInt(mapElement.attr("data-ts-map-scroll-wheel"), 10);
            var leafletMapProvider = mapElement.attr("data-ts-map-leaflet-provider");
            var leafletAttribution = mapElement.attr("data-ts-map-leaflet-attribution");
            var zoomPosition = mapElement.attr("data-ts-map-zoom-position");
            var mapBoxAccessToken = mapElement.attr("data-ts-map-mapbox-access-token");
            var mapBoxId = mapElement.attr("data-ts-map-mapbox-id");


            loadData();
        }


        function mapRender(latitude, longtitude) {
            var simpleMapId = "ts-map-simple";
            if ($("#" + simpleMapId).length) {

                mapElement = $(document.getElementById(simpleMapId));
                mapDefaultZoom = parseInt(mapElement.attr("data-ts-map-zoom"), 10);
                centerLatitude = latitude;
                centerLongitude = longtitude;
                controls = parseInt(mapElement.attr("data-ts-map-controls"), 10);
                scrollWheel = parseInt(mapElement.attr("data-ts-map-scroll-wheel"), 10);
                leafletMapProvider = mapElement.attr("data-ts-map-leaflet-provider");
                var markerDrag = parseInt(mapElement.attr("data-ts-map-marker-drag"), 10);


                if (!mapDefaultZoom) {
                    mapDefaultZoom = 14;
                }

                map = L.map(simpleMapId, {
                    zoomControl: false,
                    scrollWheelZoom: scrollWheel
                });
                map.setView([centerLatitude, centerLongitude], mapDefaultZoom);

                L.tileLayer(leafletMapProvider, {
                    attribution: leafletAttribution,
                    id: mapBoxId,
                    accessToken: mapBoxAccessToken
                }).addTo(map);

                (controls === 1) ? L.control.zoom({
                    position: "topright"
                }).addTo(map): "";

                var icon = L.icon({
                    iconUrl: "https://static-00.iconduck.com/assets.00/location-pin-icon-385x512-cgns0aw7.png",
                    iconSize: [22, 29],
                    iconAnchor: [11, 29]
                });

                var marker = L.marker([centerLatitude, centerLongitude], {
                    icon: icon,
                    draggable: markerDrag
                }).addTo(map);

            }

        }

        function getSession() {

            return $.ajax({
                url: "<?= base_url('admin.php/Control/getSession/') ?>",
                dataType: "json",
                method: "GET",
                cache: false,
                error: function(e) {
                    console.log(e);
                }
            });
        }


        async function loadData() {
            let sess = await getSession();

            if (sess.id) {
                $(".login-button").html(`
                <a class="btn btn-outline-danger btn-sm m-1 px-3" href="<?= base_url('/admin.php/Admin/logout') ?>">
            ${sess.fname + " "+ sess.lname } (Logout)
        </a>`);

                return $.ajax({
                    url: "<?= base_url('admin.php/Control/getMapData/') ?>" + BRANCH_ID,
                    dataType: "json",
                    method: "GET",
                    cache: false,
                    success: async function(results) {
                        console.log(results)

                        let data = results[0]
                        $(".b_name").text(data.title)
                        $(".b_address").text(data.address)
                        $(".b_latitude").text(data.latitude)
                        $(".b_longtitude").text(data.longitude)
                        $(".b_description").text(data.description)

                        $(".b_img").prop('src', data.marker_image.length > 36 ? data.marker_image : "https://picsum.photos/800/600/?blue=4")

                        $("#map-location").data("data-ts-map-center-latitude", data.latitude)
                        $("#map-location").data("data-ts-map-center-longitude", data.longitude)

                        document.title = "Branch : " + data.title
                        mapRender(data.latitude, data.longitude);

                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            } else {
                window.location = "<?= base_url("admin.php/Admin/login") ?>"
            }
        }


        let tableCCTVReport; // Declare the DataTable variable

        async function loadCCTVData(data, start, stop) {
            let sess = await getSession();

            if (sess.id) {
                $(".login-button").html(`
        <a class="btn btn-outline-danger btn-sm m-1 px-3" href="<?= base_url('/admin.php/Admin/logout') ?>">
            ${sess.fname + " " + sess.lname } (Logout)
        </a>`);
                $("#cctvData").html("Loading")


                return $.ajax({
                    url: "<?= base_url('admin.php/Dashboard/CCTVByID/') ?>" + CCTV_ID,
                    dataType: "json",
                    method: "GET",
                    cache: false,
                    data: {
                        startDate: start,
                        endDate: stop,
                    },
                    success: async function(results) {
                        console.log(results)
                        data = data[0]
/* 
                        $(".avaliable_http").text(results.avaliable_http)
                        $(".avaliable_https").text(results.avaliable_https)

                        $(".total_http").text(results.total_http.length)
                        $(".total_https").text(results.total_https.length)

                        $(".issue_http").text(results.issue_http.length)
                        $(".issue_https").text(results.issue_https.length)

                        $(".total").text(results.total.length)
                        $(".total_avaliable").text(results.avaliable_total)
                        $(".total_issue").text(results.issue_http.length + results.issue_https.length) */

           
                        $(".host_id").text(`${results.total[0].hostid} `)
                        $(".host_name").text(`${results.total[0].host} `)
                        $(".ip").text(`${results.total[0].ip} `)

                        $(".b_name").text(`${data.title} : ${results.total[0].host} `)

                        $(".is_active").html( results.total[ results.total.length-1 ]['is_down'] == 1 ? `<span class="badge badge-danger p-2 font-weight-normal ts-shadow__sm">Down</span>` : `<span class="badge badge-primary p-2 font-weight-normal ts-shadow__sm">Active</span>`  ) 


                        let tableData = ""
                        results.total.map((item,i) => {
                            tableData += `<tr>
                            <td>${i+1}</td>
                            <td>${item.time}</td>
                            <td>${item.is_down == 1 ? '<span class="text-danger">Issue</span>' : '<span class="text-success">Resolved</span>' } </td>
                        
                            </tr>`
                        })

                        document.title = `Branch : ${data.title} | ${ results.total[0].host} | ${ results.total[0].ip}`


                        if (tableCCTVReport) {
                            console.log('df1')
                            tableCCTVReport.destroy();
                        }
                        console.log('df41')

                        $("#cctvData").html(tableData)

                        tableCCTVReport = new DataTable('#cctvReport', {
                            paging: false,
                            "language": {
                                "info": "" // Hide the info message
                            },
                            layout: {
                                topStart: {
                                    buttons: ['excel', 'pdf']
                                }
                            }
                        });
                        var column = tableCCTVReport.column(5);
                        var states = ['issue', 'show-all', 'active'];
                        var currentState = 0;

                        /* tableCCTVReport.column(5).search('issue').draw(); */

                        $("#toggle-filter").click((e) => {
                            var currentFilter = column.search();

                            currentState = (currentState + 1) % states.length;
                            console.log(currentState)
                            console.log(states[currentState])
                            switch (states[currentState]) {
                                case 'show-all':
                                    column.search('').draw();
                                    $('#toggle-filter').text('Status: All');
                                    break;
                                case 'issue':
                                    column.search('issue').draw();
                                    $('#toggle-filter').text('Status: Issue');
                                    break;
                                case 'active':
                                    column.search('active').draw();
                                    $('#toggle-filter').text('Status: Active');
                                    break;
                            }
                        })


                        $('.buttons-excel').hide()
                        $('.buttons-pdf').hide()

                        $("#export-excel").prop("disabled", false)
                        $("#export-pdf").prop("disabled", false)

                        $("#export-excel").click((e) => {
                            $('.buttons-excel').click()
                        })

                        $("#export-pdf").click((e) => {
                            $('.buttons-pdf').click()
                        })

                        $(".loader").addClass('fadeEff')
                        setTimeout(() => {
                            $(".loader").addClass('d-none')
                            $(".loader").removeClass('d-flex')
                        }, 1000);


                    },
                    error: function(e) {
                        console.log(e);
                        $(".loading-text").html(e)

                    }
                });
            } else {
                window.location = "<?= base_url("admin.php/Admin/login") ?>"
            }
        }
        let dataBranch;
        async function main() {
            dataBranch = await loadData();
            loadCCTVData(dataBranch, 0, 0)

            /*   setInterval(() => {
                  loadCCTVData(data)
              }, 5000); */
        }

        main();

        function formatDate(date) {
            date = date.split('/')

            return date.reverse().join('-');

        }

        function toUnix(d) {
            var date = new Date(d); // You can pass a specific date and time to the Date constructor if needed

            // Get the Unix timestamp by dividing the number of milliseconds since the Unix epoch (1970-01-01) by 1000
            var unixTimestamp = Math.floor(date.getTime() / 1000);

            return unixTimestamp;
        }

        $(".btn-search-date").click(e => {
            console.log($("#datepicker-start").val())
            console.log($("#datepicker-end").val())
            let startDate = toUnix(formatDate($("#datepicker-start").val()))
            let endDate = toUnix(formatDate($("#datepicker-end").val()))

            console.log(startDate, endDate)

            if (!isNaN(startDate) && !isNaN(endDate)) {

                document.title = "Branch :" + dataBranch[0].title + " | " + $("#datepicker-start").val() + " - " + $("#datepicker-end").val();

                loadCCTVData(dataBranch, startDate, endDate)
            }

        })


    });


</script>