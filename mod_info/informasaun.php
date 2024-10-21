<?php 

switch ($_GET['act']) {
    case 'read':
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 calss="" style="color:white;">Informasaun Relevatne ho Tipo Vasinasaun ne'ebe maka Registadu
                    </h1>
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
<?php break;case 'read_info':
    $id = $_GET['id'];
    $read = $infor->form_info($id);
?>
<section id="blog" class="blog">
    <a href="informasaun"></a>

    <div class="container" data-aos="fade-up">

        <div class="row gy-12 posts-list">
            <div class="col-md-12">
                <article class="alert alert-light">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="post-img">
                                <img src="back_end/foto_info/<?= $read['0']['foto']; ?>" alt="" class=""
                                    style="width:200px;">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h5><u>Titulu Informasaun: <?=$read[0]['titulu_informasaun'] ?></u></h5>
                            <span style="font-size: 10px;">Data Puvlikasaun: <?php
                            
                            $data = date_create($read[0]['data_puvlica']);
                            echo date_format($data,"d-M Y");
                            ?></span>
                            <p style="text-align: justify;"><?=$read[0]['conten'] ?></p>
                            <a href="informasaun.html"><i class="fa fa-backward"></i> Fila</a>
                        </div>
                    </div>



                </article>
            </div>

        </div><!-- End blog posts list -->
    </div>

</section>

<?php break; ?>

<?php } ?>