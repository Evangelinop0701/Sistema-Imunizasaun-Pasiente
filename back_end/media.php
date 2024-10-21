<?php 
error_reporting(0);
session_start();
    include "class/class.php";
    include "class/lib.php";
    
    $db = new database();
    $pasiente = new pasiente();
    $aldeia = new aldeia();
    $doutor = new doutor();
    $tipo = new tipo();
    $user = new user();
    $imun = new imun();
    $doses = new doses();
    $info = new info();
    $control = new control();
    $periodo = new periodo();

    


    $uname = $_SESSION['naran_doutor'];
    $id_doutor = $_SESSION['nu_do'];
    
    if (!$user->get_sessi()) {
      header('location: ../index.html');
    }

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema Informasaun Imunizasaun iha klinika</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/owl.carousel.css">
    <link rel="stylesheet" href=".assets/css/owl.theme.css">
    <link rel="stylesheet" href=".assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/normalize.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/wave/waves.min.css">
    <link rel="stylesheet" href=".assets/css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href=".assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src=".assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        /* background-color: #04AA6D; */
        /* color: white; */
    }
    </style>
    <script src=".assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src=".assets/local.css"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <?php include "menu_top.php"; ?>
    <!-- End Header Top Area -->
    <?php include "header_conten.php" ?>
    <!-- Breadcomb area Start-->

    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <?php include "content.php" ?>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © <b>Estudante DEI</b>. Periodo 2023 - <?= date('Y');?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src=".assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src=".assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src=".assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src=".assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src=".assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src=".assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src=".assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src=".assets/js/counterup/jquery.counterup.min.js"></script>
    <script src=".assets/js/counterup/waypoints.min.js"></script>
    <script src=".assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src=".assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src=".assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src=".assets/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src=".assets/js/flot/jquery.flot.js"></script>
    <script src=".assets/js/flot/jquery.flot.resize.js"></script>
    <script src=".assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src=".assets/js/knob/jquery.knob.js"></script>
    <script src=".assets/js/knob/jquery.appear.js"></script>
    <script src=".assets/js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src=".assets/js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src=".assets/js/todo/jquery.todo.js"></script>
    <!--  wave JS
		============================================ -->
    <script src=".assets/js/wave/waves.min.js"></script>
    <script src=".assets/js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src=".assets/js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src=".assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src=".assets/js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src=".assets/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->


    <!-- pie -->
    <script src=".assets/grafiku/chart.js"></script>
    <script>
    <?php $data = $pasiente->total_sexu(); ?>
    var ctx = document.getElementById('grafikuPie').getContext('2d');
    var data = {
        labels: [<?php foreach ($total_sexu as $key ) {
    echo '"'.$key['sexu'].'",';
   
} ?>],
        datasets: [{
            data: [<?php foreach ($total_sexu as $key ) {
    echo '"'.$key['total_sexu'].'",';
   
} ?>],
            backgroundColor: ['#f56954', '#00c0ef']
        }]
    };

    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data
    });
    </script>
    <!-- /pie -->

</body>

</html>