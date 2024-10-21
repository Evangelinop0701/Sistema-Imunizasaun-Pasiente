<?php 
error_reporting();
switch ($_GET['act']) {
    case 'read':?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Dados Imunisasaun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Dados Imunisasaun
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-4"><a href="info-control.html" class=""><button class="btn btn-info"
                        style="font-size:20px;"><i class="fa fa-info-circle"></i>
                        Informasaun Tipo vasinasaun</button></a></div>
            <div class="col-lg-8">
                <a href="kalendario.html" class=""><button class="btn btn-warning" style="font-size:20px;"><i
                            class="fa fa-calendar"></i>
                        Kalendario Vasinasaun</button></a>
            </div><br><br><br>
        </div>
    </div>
</div>

<?php break; case 'input':
    
    $id = $_GET['id'];

    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Input dados imunizasaun</li>
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
            <form action="modul/mod_vasina/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Naran Pasiente</label>
                        <select name="id_pasiente" class="form-control" required>
                            <?php $pass = $pasiente->dados_pasiente_input($id);?>
                            <option value="<?= $pass[0]['id_pasiente']; ?>" selected hidden>
                                <?= $pass[0]['naran_pasiente']  ?></option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Doutor Atendemento</label>
                        <select name="id_doutor" class="form-control" required>
                            <option value="<?= $id_doutor; ?>" selected><?= $uname; ?></option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Data Inmunizasaun</label>
                        <input type="date" class="form-control" name="data_imunizasaun" placeholder="" required>
                    </div>
                    <br><br><br><br>


                    <div class="col-md-4">
                        <label for="">Tipo Imunisasaun</label>
                        <select name="id_tipo" id="" class="form-control">
                            <option value="" selected hidden>Tipu imunizasaun</option>
                            <?php $ti = $tipo->dados_tipu();
                            foreach ($ti as $row) {?>
                            <option value="<?= $row['id_tipo']; ?>"><?=$row['naran_tipo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Data Durasaun</label>
                        <input type="date" class="form-control" name="data_durasaun" placeholder="">
                    </div>

                    <div class="col-md-4">
                        <label for="">Doses</label>
                        <input type="number" min="0" class="form-control" name="doses" placeholder="Prense Doses">
                    </div>

                    <br><br><br><br>

                    <div class="col-md-8">
                        <label for="">Komentario</label>
                        <textarea name="komentario" id=""
                            placeholder="Komentario relasiona ho vasinasaun ne'ebe labarik hetan" class="form-control"
                            cols="30" rows=""></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="">Periodo</label>
                        <select name="id_periodo" id="" class="form-control">
                            <option value="" selected hidden>Tipu imunizasaun</option>
                            <?php $data = $periodo->periodo(); 
                                foreach ($data as $row) {?>
                            <option value="<?= $row['id_periodo']; ?>"><?=$row['periodo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br><br><br><br><br>

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

    $up = $imun->select_form($id);?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update dados imunizasaun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Update Dados
            </div>
        </div>
        <div class="panel-body">
            <form action="modul/mod_vasina/aksi.php?act=update&id=<?= $id; ?>" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Naran Pasiente</label>
                        <select name="id_pasiente" class="form-control" required>
                            <option value="<?= $up[0]['id_pasiente']; ?>" selected hidden>
                                <?= $up[0]['naran_pasiente'] ?></option>
                            <?php $pass = $pasiente->dados_pasiente();
                            foreach ($pass as $row) {?>
                            <option value="<?= $row['id_pasiente']; ?>"><?=$row['naran_pasiente'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Doutor Atendemento</label>
                        <select name="id_doutor" class="form-control" required>
                            <option value="<?= $id_doutor; ?>" selected><?= $uname; ?></option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Data Inmunizasaun</label>
                        <input type="date" value="<?= $up[0]['data_imunizasaun']; ?>" class="form-control"
                            name="data_imunizasaun" placeholder="" required>
                    </div>
                    <br><br><br><br>


                    <div class="col-md-4">
                        <label for="">Tipo Imunisasaun</label>
                        <select name="id_tipo" id="" class="form-control">
                            <option value="<?= $up[0]['id_tipo']; ?>" selected hidden><?= $up[0]['naran_tipo'] ?>
                            </option>
                            <?php $ti = $tipo->dados_tipu();
                            foreach ($ti as $row) {?>
                            <option value="<?= $row['id_tipo']; ?>"><?=$row['naran_tipo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Data Durasaun</label>
                        <input type="date" value="<?=$up[0]['data_durasaun'];?>" class="form-control"
                            name="data_durasaun" placeholder="">
                    </div>

                    <div class="col-md-4">
                        <label for="">Doses</label>
                        <input type="number" min="0" class="form-control" value="<?=$up[0]['doses'];?>" name="doses"
                            placeholder="Prense Doses">
                    </div><br><br><br><br>


                    <div class="col-md-8">
                        <label for="">Komentario</label>
                        <textarea name="komentario" id=""
                            placeholder="Komentario relasiona ho vasinasaun ne'ebe labarik hetan" class="form-control"
                            cols="30" rows=""><?= $up[0]['komentario']; ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="">Periodo</label>
                        <select name="id_periodo" id="" class="form-control">
                            <option value="<?= $up[0]['id_periodo']; ?>" selected hidden><?= $up[0]['periodo']; ?>
                            </option>
                            <?php $data = $periodo->periodo(); 
                                foreach ($data as $row) {?>
                            <option value="<?= $row['id_periodo']; ?>"><?=$row['periodo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br><br><br><br><br>

                    <div class="col-md-4">
                        <button class="btn btn-sm btn-success" style="width: 150px;" type="submit"><i
                                class="fa fa-upload"></i>
                            Update</button>
                        <button class="btn btn-sm btn-danger" onclick="self.history.back();" style="width: 150px;"
                            type="reset"><i class=""></i>
                            Kansela</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php break;case 'kalendario':?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="imunisasaun.html">Dados Imunisasaun</a></li>
                    <li class='active'>Kalendario Iumunisasaun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Kalendario imunizasaun
            </div>
        </div>
        <div class="panel-body">
            <!-- <a href="input-pasiente.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                    Aumenta
                    dados</button></a> -->
            <div class="data-table-list">

                <div class="table-responsive">
                    <table id="data-table-basic" class="customers">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Naran Labarik</th>
                                <th>Sexu</th>
                                <th>Kalendario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $data = $pasiente->dados_pasiente();
                            $no =1 ;
                            foreach ($data as $row) { ?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><a
                                        href="detalo-pasiente-<?=$row['id_pasiente']?>.html"><?=$row['naran_pasiente'] ?></a>
                                </td>
                                <td><?=$row['sexu'] ?></td>
                                <td>
                                    <a href="detalho-kalender-<?= $row['id_pasiente']; ?>.html" class=""><button
                                            class="btn-xs btn-warning"><i class="fa fa-calendar"></i>
                                            Kaledario</button></a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Naran Labarik</th>
                                <th>Sexu</th>
                                <th>Klendario</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php break;case 'dt_kalender': 
     $id = $_GET['id'];
     $id_pass = $imun->id_pasiente($id);
    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="kalendario.html">Kalendario Imunizasaun</a></li>
                    <li class='active'>Detalho Vasinasaun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title text-uppercase">
                Kalendario Vasinasaun husi <u><b><?= $id_pass[0]['naran_pasiente'] ?></b></u>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-10">
                <a href="input-imun-<?= $id_pass[0]['id_pasiente'] ?>.html" class=""><button
                        class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Aumenta
                        dados</button></a><br><br>
            </div>
            <div class="col-md-2">
                <a href="modul/print/print.php?id=<?= $id_pass[0]['id_pasiente'] ?>" class=""><button
                        class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-print"></span>
                        Imprimir</button></a>
            </div>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <li>Bainhira tipo Vasinasaun nia <b> doses maior duke zero</b> maka iha koluna Tipo Vasinasaun sei
                        mosu <b><u>Link.</u></b></li>
                </div>
            </div>
            <br><br><br>
            <div class="col-md-12">
                <table class="customers">
                    <tr>
                        <th colspan="10">
                            <center>KALENDARIO VASINASAUN</center>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Tipo Vasinasaun</th>
                        <th>Data Vasinasaun</th>
                        <th>Intervalho Loron</th>
                        <th>Intervalho Fulan</th>
                        <th>Intervalho Tinan</th>
                        <th>Data Revasinasaun</th>
                        <th>Doses</th>
                        <th>Obs</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    

                    // logika update automatiku obs 

                    $obs = $doses->update_status_obs();

                    foreach ($obs as $row) {
                        if ($row['total_vasina'] == $row['doses']) {
                            $imun->update_obs($row['id_imunisasaun']);
                            // $doses->update_estatus_doses($row['id_dose']);
                        }
                    }

                    // logika update automatiku obs 


                    $no =1;
                    $data = $imun->detalho_kalender($id);
                    
                    foreach ($data as $row) {?>
                    <tr>
                        <td><?=$no; ?></td>

                        <td>
                            <?php if ($row['doses'] > 0) {?>
                            <a href="doses-<?=$row['id_imunisasaun']?>.html"><?=$row['naran_tipo']; ?></a>
                            <?php }else {?>
                            <?=$row['naran_tipo']; ?>
                            <?php } ?>
                        </td>
                        <td><?=$row['data_imunizasaun']; ?></td>

                        <td>
                            <?= convert_loron($row['data_imunizasaun'], $row['data_durasaun']);?>
                        </td>
                        <td>
                            <?= convert_fulan($row['data_imunizasaun'], $row['data_durasaun']);?>
                        </td>
                        <td>
                            <?= convert_tinan($row['data_imunizasaun'], $row['data_durasaun']);?>
                        </td>
                        <td><?=$row['data_durasaun']; ?></td>
                        <td><?=$row['doses']; ?></td>
                        <td><?php 
                        $obs = convert_loron($row['data_imunizasaun'], $row['data_durasaun']);
                        if ($row['obs'] == "Kompletu" or $obs == 0 ) {?>
                            <i class="fa fa-check" style="color: green;"></i>
                            <?php }else {?>
                            <i class="fa fa-remove" style="color: red;"></i>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="update-imun-<?=$row['id_imunisasaun'] ?>.html"><button
                                    class="btn btn-xs btn-success"><i class="fa fa-edit"></i>
                                    Hadia</button></a>
                            <a
                                href="modul/mod_vasina/aksi.php?act=delete&id=<?=$row['id_imunisasaun']?>&id_pass=<?=$row['id_pasiente']?>"><button
                                    class="btn btn-xs btn-danger"><i class="fa fa-edit"></i>
                                    Delete</button></a>
                        </td>

                    </tr>
                    <?php $no++; } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php break; ?>
<?php } ?>