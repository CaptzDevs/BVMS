<script>
    const BRANCH_ID = <?= $branchID ?>;

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


        function mapRender(latitude , longtitude) {
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
                    iconUrl: "assets/img/marker-small.png",
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

        async function loadData(parameters) {
            let sess = await getSession();

            if (sess.id) {
                $(".login-button").html(`
                <a class="btn btn-outline-danger btn-sm m-1 px-3" href="<?= base_url('/admin.php/Admin/logout') ?>">
            ${sess.fname + " "+ sess.lname } (Logout)
        </a>`);

                $.ajax({
                    url: "<?= base_url('admin.php/Control/getMapData/') ?>" + BRANCH_ID,
                    dataType: "json",
                    method: "GET",
                    cache: false,
                    success: async function(results) {
                        console.log(results)

                        let data = results[0]

                        $(".b_name").text(data.title)
                        $(".b_location").text(data.address)
                        $(".b_latitude").text(data.latitude)
                        $(".b_longtitude").text(data.longitude)

                        $(".b_img").prop('src',data.marker_image)


                        $("#map-location").data("data-ts-map-center-latitude", data.latitude)
                        $("#map-location").data("data-ts-map-center-longitude", data.longitude)

                        $(".http")
                        $(".https")
                        $(".total")

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

        loadData()

    });
</script>