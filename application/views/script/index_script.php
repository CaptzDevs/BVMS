<script>

    $(document).ready(function($) {
        "use strict";

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
                    url: "<?= base_url('admin.php/Control/getCCTVTotal') ?>" ,
                    dataType: "json",
                    method: "GET",
                    cache: false,
                    success: async function(results) {
                        console.log(results)
                        
                        $(".http").text(results.available_http)
                        $(".https").text(results.available_https)

                        $(".http_total").text(results.total_http)
                        $(".https_total").text(results.total_https)

                        $(".available_total").text(results.avaliavle_total)
                        $(".cctv_total").text(results.total_cctv)


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