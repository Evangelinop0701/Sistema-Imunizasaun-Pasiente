<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 calss="" style="color:white;">Bemvindo mai sistema Informasaun Imunizasaun </h1>
                    <a href="login.html"><button
                            class="btn btn-lg btn-warning py-0 p-4 text-white"><b>Login</b></button></a>
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



        </div>




    </div> <br><br>
    <a href="informasaun"></a>

    <div class="container" data-aos="fade-up">
        <h4 style="color:green;"><i class="fa fa-info-circle"></i> Informasaun Relevante</h4>
        <hr>

        <div class="row gy-4 posts-list">
            <?php
        $in = $infor->dados_info();
    foreach ($in as $row) {?>
            <div class="col-xl-4 col-md-6">
                <article>

                    <div class="post-img">
                        <img src="back_end/foto_info/<?=$row['foto']; ?>" alt="" class="img-fluid">
                    </div>

                    <p class="post-category"><a href="read-info-<?=$row['id_informasaun']?>.html"><i
                                class="fa fa-eye"></i> Asesu Informasaun</a></p>

                    <h2 class="title">
                        <a href="blog-details.html"><?=$row['titulu_informasaun'] ?></a>
                    </h2>

                    <div class="d-flex align-items-center">
                        <img src="back_end/foto_info/<?=$row['foto']; ?>" alt=""
                            class="img-fluid post-author-img flex-shrink-0">
                        <div class="post-meta">
                            <p class="post-author-list"></p>
                            <p class="post-date">
                                <time datetime="2022-01-01"><?=$row['data_puvlica'] ?></time>
                            </p>
                        </div>
                    </div>

                </article>
            </div>
            <?php } ?>

        </div><!-- End blog posts list -->
    </div>
</section>