<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <?php $curPageName = substr($_SERVER["REQUEST_URI"], strrpos($_SERVER["REQUEST_URI"], "/") + 1);   ?>
    <title>SIINKA | <?= ucfirst($curPageName) ?></title>
    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">
    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="public/img/logo/icon2.png">
    <!-- CSS
================================================== -->
    <!-- Bootstrap * Bootstrap v4.5.3 -->
    <link rel="stylesheet" href="public/template/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="public/template/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="public/template/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="public/template/plugins/slick/slick.css">
    <link rel="stylesheet" href="public/template/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="public/template/plugins/colorbox/colorbox.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="public/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- MyCSS -->
    <link rel="stylesheet" href="public/css/mystyle.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="public/template/css/style.css">
</head>

<body>
    <!-- DB,Models -->
    <?php
    session_start();
    // error_reporting((0));
    include_once 'connection.php';

    include_once 'models/Karyawan.php';
    include_once 'models/Barang.php';
    include_once 'models/Kategori.php';
    include_once 'models/Petugas.php';
    include_once 'models/Peminjaman.php';
    include_once 'models/Supplier.php';
    include_once 'models/PengadaanUnit.php';
    include_once 'models/Pengadaan.php';
    ?>

    <div class="body-inner">

        <?php
        include_once 'pages/partials/navbar.php';
        ?>

        <?php
        $page = $_REQUEST['page'];

        if (!empty($page)) {
            include_once $page . '.php';
        } else {
            include_once 'pages/home.php';
        }
        ?>

        <!-- Back To Top -->
        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
            <button class="btn btn-primary" title="Back to Top">
                <i class="fa fa-angle-double-up"></i>
            </button>
        </div>

        <?php
        include_once 'pages/partials/footer.php';
        ?>

    </div><!-- Body inner end -->

    <!-- Modals  -->
    <?php
    ?>


    <!-- Javascript Files
  ================================================== -->
    <!-- jQuery library -->
    <script src="public/js/jquery-3.6.1.min.js"></script>
    <!-- Pooper library -->
    <script src="public/js/popper.min.js"></script>
    <!-- Bootstrap library -->
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script>
        // tooltip
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function editKode() {
            var x = document.getElementById("editt");
            var y = document.getElementById("selecct");
            if (x.readOnly = true) {
                x.readOnly = false;
                y.title = "Custom Kode: On"
            }
        }

        // show/hide password
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
    <!-- Slick Carousel -->
    <script src="public/template/plugins/slick/slick.min.js"></script>
    <script src="public/template/plugins/slick/slick-animation.min.js"></script>
    <!-- Color box -->
    <script src="public/template/plugins/colorbox/jquery.colorbox.js"></script>
    <!-- shuffle -->
    <script src="public/template/plugins/shuffle/shuffle.min.js" defer></script>

    <!-- Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="public/template/plugins/google-map/map.js" defer></script>

    <!-- Template custom -->
    <script src="public/template/js/script.js"></script>

    <!-- Sweetalert -->
    <script src="public/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    </div><!-- Body inner end -->
</body>

</html>