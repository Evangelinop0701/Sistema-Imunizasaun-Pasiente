<?php
error_reporting(0);
 include "back_end/class/class.php"; 
$db = new database();
$imun = new imun();
$aldeia = new aldeia();
$infor = new info();
$pass = new pasiente();
$imnu = new imun();
$tipo = new tipo();
$control = new control();
$periodo = new periodo();


$total_tipo= $imun->total_tipo_graph();
$sexu = $imun->select_sexu_pie();
$total_aldeia = $aldeia->total_adeia();

$cp = $control->control_panel();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Impact Bootstrap Template - Blog</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="assets/icon/css/all.css">
    <!-- /icon -->

    <!-- datatables -->
    <link rel="stylesheet" href="assets/datatables/jquery.dataTables.min.css">
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
    <!-- /datatables -->

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Impact
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="<?=$cp[0]['instagram']; ?>"><?= $cp[0]['email'] ?></a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+670 <?=$cp[0]['no_tlf'] ?></span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="<?=$cp[0]['facabook']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>

            </div>
    </section>

    <!-- End Top Bar -->
    <?php include "f_top.php"; ?>
    <!-- End Header -->



    <main id="main">

        <?php include "conten.php" ?>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <!-- <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Media Sosial</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div> -->

                <!-- <div class="col-lg-2 col-6 footer-links">
                    <h4>Media Sosial</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div> -->



                <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                    <h4>Kontaktu Ami</h4>
                    <p>
                        <strong><i class="fa fa-user-plus"></i> Phone:</strong> +670 <?=$cp[0]['no_tlf'] ?><br>
                        <strong><i class="bi bi-whatsapp"></i> Whatsapp Phone:</strong> +670 <?=$cp[0]['wa'] ?><br>
                        <strong><i class="fa fa-envelope"></i> Email:</strong> <?=$cp[0]['email'] ?><br>

                    </p>

                </div>
                <!-- <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div> -->

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span> Sistema Informasaun</span></strong>. Versaun 1.0
            </div>
            <div class="credits">
                Desemvolve husi<a href="#"> Estudante Informatica <?php echo"2023-"; ?><?=date('Y'); ?></a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- icon -->
    <script src="assets/icon/js/all.js"></script>
    <!-- /icon -->

    <!-- data tables -->
    <!-- datatables -->
    <script src="assets/datatables/jquery-3.6.0.min.js"></script>
    <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true, // Enable pagination
            "pageLength": 10, // Number of rows per page
            // Add other options as needed
        });
    });
    </script>
    <!-- /datatables -->
    <!-- /data tables -->




    <script src="assets/grafiku/chart.js"></script>
    <script>
    var ctx = document.getElementById('grafikuPie').getContext('2d');
    var data = {
        labels: [<?php foreach ($sexu as $row) {
            echo "'".$row['sexu']."',";
         } ?>],
        datasets: [{
            data: [<?php foreach ($sexu as $row) {
            echo "'".$row['total_sexu']."',";
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
    <!-- grafiku bara -->
    <script>
    var ctx = document.getElementById('grafikuBarra').getContext('2d');
    var data = {
        labels: [<?php foreach ($total_tipo as $row) {
            echo '"'.$row['naran_tipo'].'",';
        } ?>],
        datasets: [{
            label: 'Total Pasiente',
            data: [<?php foreach ($total_tipo as $row) {
            echo '"'.$row['total_tipo'].'",';
        } ?>],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
        }]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data
    });
    </script>

    <!-- period -->

    <!-- period -->


    <!-- aldeia -->
    <script>
    var ctx = document.getElementById('grafikuBarraAldeia').getContext('2d');
    var data = {
        labels: [<?php foreach ($total_aldeia as $row) {
            echo '"'.$row['naran_aldeia'].'",';
        } ?>],
        datasets: [{
            label: 'Total Pasiente',
            data: [<?php foreach ($total_aldeia as $row) {
            echo '"'.$row['Total_adeia'].'",';
        } ?>],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
        }]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data
    });
    </script>
    <!-- /grafiku bara -->

</body>

</html>