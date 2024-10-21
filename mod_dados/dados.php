<?php 

switch ($_GET['act']) {
    case 'read_pasiente':?>

<section id="blog" class="blog">
    <a href="informasaun"></a>

    <div class="container" data-aos="fade-up">

        <div class="row gy-12 posts-list">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: '>'; font-size:12px;" class="py-0" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><b>Periodo:</b></li>
                        <?php $data = $periodo->periodo(); 
                                foreach ($data as $row) {?>
                        <li class="breadcrumb-item fw-bold" style="font-size:12px;"><a
                                href="view-periodo-<?=$row['id_periodo']?>.html"><?=$row['periodo']?></a>
                        </li>
                        <?php } ?>
                    </ol>
                </nav>
                <hr>
                <article class="">
                    <div class="row">
                        <div class="container">
                            <div class="">
                                <h4><i class="fa fa-list"></i> Dados Pasiente Registadu</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="customers py-4 rounded">
                                <thead>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Naran Pasiente</th>
                                        <th class="py-1">Sexu</th>
                                        <th class="py-1">Tinan</th>
                                        <th class="py-1">Aldeia</th>
                                        <th class="py-1">Hela Fatin</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $pa = $pass->dados_pasiente();
                                    $no = 1;
                                    foreach ($pa as $row) {?>

                                    <tr>
                                        <td class="py-1"><?=$no; ?></td>
                                        <td class="py-1"><a
                                                href="detalho-pasiente-<?=$row['id_pasiente']?>.html"><?= $row['naran_pasiente'] ?></a>
                                        </td>
                                        <td class="py-1"><?php 
                                        if ($row['sexu'] == "M") {
                                            echo "Mane";
                                        }else {
                                            echo "Feto";
                                        }
                                        ?></td>
                                        <td class="py-1"><?= $row['idade'] ?> Anos</td>
                                        <td class="py-1"><?= $row['naran_aldeia'] ?></td>
                                        <td class="py-1"><?= $row['bairo'] ?></td>

                                    </tr>

                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </article>
            </div>

        </div><!-- End blog posts list -->
    </div>

</section>
<?php break;case 'detalho_pasiente':
    $id = $_GET['id']; 
    
    $det =$pass->select_form($id);

    ?>

<section id="blog" class="blog">
    <a href="informasaun"></a>

    <div class="container" data-aos="fade-up">

        <div class="row gy-12 posts-list">
            <div class="col-md-12">
                <article class="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="">
                                <div class="">
                                    <h4><i class="fa fa-list-alt"></i> Dados Pasiente Registadu</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="customers py-4 rounded">
                                    <tr>
                                        <th colspan="2"
                                            class="text-uppercase alert alert-success rounded-0 text-center">identidade
                                            Pessoal husi <u><b><?= $det[0]['naran_pasiente']; ?></b></u></th>
                                    </tr>
                                    <tr>
                                        <th>Naran Kompletu</th>
                                        <td><?=$det[0]['naran_pasiente'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sexu</th>
                                        <td><?php if ($det[0]['sexu'] == "M") {
                                           echo "Mane";
                                        }else {
                                            echo "Feto";
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Idade</th>
                                        <td><?=$det[0]['idade'] ?> Anos</td>

                                    </tr>
                                    <tr>
                                        <th>Inan/Aman</th>
                                        <td>Husi inan: <b><?=$det[0]['naran_inan'] ?></b>, Husi aman:
                                            <b><?=$det[0]['naran_aman'] ?> </b>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Aldeia</th>
                                        <td><?=$det[0]['naran_aldeia'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Residensia Atual</th>
                                        <td><?=$det[0]['bairo'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </article>
            </div>

        </div><!-- End blog posts list -->
    </div>

</section>

<?php break;case 'tipo': ?>

<section id="blog" class="blog">
    <a href="informasaun"></a>

    <div class="container" data-aos="fade-up">

        <div class="row gy-12 posts-list">
            <div class="col-md-12">
                <article class="">
                    <div class="row">
                        <div class="container">
                            <div class="">
                                <h4><i class="fa fa-medkit"></i> Tipo vasinasaun Registadu</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="customers py-4 rounded">
                                <thead>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Tipo Vasinasaun</th>
                                        <th class="py-1">Deskrisaun</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $tp = $tipo->dados_tipu();
                                    $no = 1;
                                    foreach ($tp as $row) {?>

                                    <tr>
                                        <td class="py-1"><?=$no; ?></td>
                                        <td class="py-1"><?= $row['naran_tipo'] ?>
                                        </td>
                                        <td class="py-1"><?= $row['deskrisaun'] ?> Anos</td>


                                    </tr>

                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </article>
            </div>

        </div><!-- End blog posts list -->
    </div>

</section>
<?php break;case 'periodo':
    $id = $_GET['id'];
    ?>

<section id="blog" class="blog">
    <a href="informasaun"></a>

    <div class="container" data-aos="fade-up">

        <div class="row gy-12 posts-list">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: '<'; font-size:13px;" class="py-0 pt-3 alert alert-warning"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><b>Periodo:</b></li>
                        <?php $data = $periodo->periodo(); 
                                foreach ($data as $row) {?>
                        <li class="breadcrumb-item fw-bold" style="font-size:13px;"><a
                                href="view-periodo-<?=$row['id_periodo']?>.html"><?=$row['periodo']?></a>
                        </li>
                        <?php } ?>
                    </ol>
                </nav>
                <hr>
                <article class="">
                    <div class="row">
                        <div class="container">
                            <div class="">
                                <h4><i class="fa fa-list"></i> Dados Pasiente Registadu</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="customers py-4 rounded table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Naran Pasiente</th>
                                        <th class="py-1">Sexu</th>
                                        <th class="py-1">Aldeia</th>
                                        <th class="py-1">Hela Fatin</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $pa = $pass->dados_pasiente_periodo($id);
                                    $no = 1;
                                    foreach ($pa as $row) {?>

                                    <tr>
                                        <td class="py-1"><?=$no; ?></td>
                                        <td class="py-1"><a
                                                href="detalho-pasiente-<?=$row['id_pasiente']?>.html"><?= $row['naran_pasiente'] ?></a>
                                        </td>
                                        <td class="py-1"><?php 
                                        if ($row['sexu'] == "M") {
                                            echo "Mane";
                                        }else {
                                            echo "Feto";
                                        }
                                        ?></td>
                                        <td class="py-1"><?= $row['naran_aldeia'] ?></td>
                                        <td class="py-1"><?= $row['bairo'] ?></td>

                                    </tr>

                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </article>
            </div>

        </div><!-- End blog posts list -->
    </div>

</section>

<?php break; ?>
<?php } ?>