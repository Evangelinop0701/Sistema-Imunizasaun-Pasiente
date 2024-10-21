<?php 
error_reporting(0);
switch ($_GET['act']) {
    case 'read':?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 text-center text-white">
                    <!-- <button class="btn btn-lg btn-warning py-0 p-4 text-white"><b>Login fdfdf</b></button> -->
                    <h1>Estatistitika Vasinasaun ba dados Pasiente ne'ebe Registdadu</h1>
                    <p>Iha informasaun sira okos sei visualisa dado ho grafiku. Iha grafiku pie sei fo sai total dados
                        pasientes baseia ba sexu.
                        Iha grafiku bara sei visualiza total dados pasientes registado ho tipu vasinasaun, no ida seleuk
                        se fo sai total dados husi kada aldeia.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row gy-6 posts-list">
            <!-- grafiku piechar -->

            <div class="col-xl-4 col-md-4">

                <article>
                    <div class="container">
                        <nav style="--bs-breadcrumb-divider: ''; font-size:16px;" class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" style="font-size:16px;"><b>Total Sexu Geral </b></li>
                            </ol>

                        </nav>
                        <hr>

                    </div>
                    <div class="container-fluid">
                        <canvas id="grafikuPie" width="400" height="1000"></canvas>
                    </div>

                    <p class="post-category">Genero Pasiente</p>

                    <h2 class="title">
                        <a href="blog-details.html">Total dados Pasiente baseia ba Sexu</a>
                    </h2>
                </article>
            </div>

            <!-- END GRAFIKU PECHAR -->

            <!-- grafiku bara estatistika -->
            <div class="col-xl-4 col-md-12">

                <article>
                    <div class="container">
                        <nav style="--bs-breadcrumb-divider: ''; font-size:16px;" class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><b>Estatistika husi Periodo</b></li>
                                <?php $data = $periodo->periodo1(); 
                                foreach ($data as $row) {?>
                                <li class="breadcrumb-item fw-bold" style="font-size:16px;"><a
                                        href="#"><?=$row['periodo']?></a>
                                </li>
                                <?php } ?>
                            </ol>

                        </nav>
                        <hr>

                    </div>
                    <div class="container">
                        <canvas id="grafikuBarra" width="100" height="100"></canvas>
                    </div>


                    <p class="post-category">Tipo Vasinasaun ne'ebe pasiente sira hetan</p>

                    <h3 class="title">
                        <a href="blog-details.html">Total Pasiente Baseia ba Tipo vasinasaun</a>
                    </h3>



                </article>
            </div>
            <!-- end grafiku bara estatistika -->

            <!-- grafiku bara aldeia -->
            <div class="col-xl-4 col-md-12">
                <article>
                    <div class="container">
                        <nav style="--bs-breadcrumb-divider: ''; font-size:16px;" class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" style="font-size:16px;"><b>Total Pasiente Geral ba kada
                                        aldeia </b></li>
                            </ol>

                        </nav>
                        <hr>

                    </div>
                    <div class="container">
                        <canvas id="grafikuBarraAldeia" width="100" height="100"></canvas>
                    </div>


                    <p class="post-category">Dados Pasiente Kada Aldeia</p>

                    <h3 class="title">
                        <a href="blog-details.html">Total dados pasiente kada aldeia registadu</a>
                    </h3>

                </article>
            </div>

            <!-- end grafiku bara aldeia -->



        </div>




    </div>
</section>

<?php break;case 'periodo':
   $id = $_GET['id']; ?>


<?php } ?>