<?php 
error_reporting(0);

switch ($_GET['act']) {
    case 'read':?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Informasaun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Dados Tipo vasinasaun
            </div>
        </div>
        <div class="panel-body">
            <div class="container">
                <a href="input-info.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Aumenta
                        dados</button></a>
            </div>
            <br><br>
            <?php
             $i = $info->dados_info();
             foreach ($i as $row) {?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="dialog-inner">
                    <div class="contact-hd dialog-hd">
                        <h2><?=$row['titulu_informasaun'] ?></h2>
                        <p><?= $row['conten'] ?></p>
                    </div>
                    <div class="dialog-pro dialog">
                        <a href="update-info-<?=$row['id_informasaun']?>.html"><button
                                class="btn btn-xs btn-info">Hadia</button></a>
                        <a
                            href="modul/mod_info/aksi.php?act=delete&id=<?=$row['id_informasaun']?>&file=<?=$row['foto']?>"><button
                                class="btn btn-xs btn-danger">Hamos</button></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php break;case 'input': ?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Input Informsasun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Input Dados
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_info/aksi.php?act=input" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Titulu Informasaun</label>
                        <input type="text" class="form-control" name="titulu_informasaun"
                            placeholder="Prense Tipo vasinasaun" required>
                    </div><br><br><br><br>

                    <div class="col-md-12">
                        <label for="">Data Puvlika</label>
                        <input type="date" class="form-control" name="data_puvlica" placeholder="Prense Tipo vasinasaun"
                            required>
                    </div><br><br><br><br>


                    <div class="col-md-12">
                        <label for="">Conten Informasaun</label>
                        <textarea name="conten" id="" cols="30" rows="5" class="form-control"
                            placeholder="Deskrisaun Relasionan ho tipo Vasinasaun ne'ebe ita boot priense"
                            required></textarea>
                    </div><br><br><br><br><br><br><br><br>

                    <div class="col-md-12">
                        <label for="">Referensia Informasaun</label>
                        <textarea name="refersensia" id="" cols="30" rows="5" class="form-control"
                            placeholder="Referensia Informasun" required></textarea>
                    </div><br><br><br><br><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Imagen</label><br>
                        <input type="file" name="fupload">
                    </div><br><br><br>
                    <div class="col-md-4">
                        <button class="btn btn-sm btn-success" style="width: 150px;" type="submit"><i
                                class="fa fa-save"></i>
                            Save</button>
                        <button class="btn btn-sm btn-danger " style="width: 150px;" type="reset"><i class=""></i>
                            Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php break;case 'update':
    $id = $_GET['id'];
    
    $up = $info->form_info($id);
    
    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Input Informsasun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Input Dados
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_info/aksi.php?act=update&id=<?= $id; ?>" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Titulu Informasaun</label>
                        <input type="text" value="<?= $up[0]['titulu_informasaun']; ?>" class="form-control"
                            name="titulu_informasaun" placeholder="Prense Tipo vasinasaun" required>
                    </div><br><br><br><br>

                    <div class="col-md-12">
                        <label for="">Data Puvlika</label>
                        <input type="date" value="<?= $up[0]['data_puvlica']; ?>" class=" form-control"
                            name="data_puvlica" placeholder="Prense Tipo vasinasaun" required>
                    </div><br><br><br><br>


                    <div class="col-md-12">
                        <label for="">Conten Informasaun</label>
                        <textarea name="conten" id="" cols="30" rows="5" class="form-control"
                            placeholder="Deskrisaun Relasionan ho tipo Vasinasaun ne'ebe ita boot priense"
                            required><?= $up[0]['conten']; ?></textarea>
                    </div><br><br><br><br><br><br><br><br>

                    <div class="col-md-12">
                        <label for="">Referensia Informasaun</label>
                        <textarea name="refersensia" id="" cols="30" rows="5" class="form-control"
                            placeholder="Referensia Informasun" required><?= $up[0]['refersensia']; ?></textarea>
                    </div><br><br><br><br><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Imagen</label><br>
                        <input type="file" name="fupload">
                    </div><br><br><br>
                    <input type="hidden" name="foto" value="<?= $up[0]['foto']; ?>">
                    <div class="col-md-4">
                        <button class="btn btn-sm btn-success" style="width: 150px;" type="submit"><i
                                class="fa fa-save"></i>
                            Save</button>
                        <button class="btn btn-sm btn-danger " style="width: 150px;" type="reset"><i class=""></i>
                            Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php break; ?>
<?php } ?>