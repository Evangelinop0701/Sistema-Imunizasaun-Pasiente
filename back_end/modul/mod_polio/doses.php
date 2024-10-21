<?php 
error_reporting();


switch ($_GET['act']) {
    case 'read': 
     $id = $_GET['id'];

     $do = $doses->dados_doses($id);

     $tv = $doses->id_doses($id);
    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="kalendario.html">Kalendario Imunizasaun</a></li>
                    <li class='active'>Doses Vasinasaun</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title text-uppercase">
                doses husi tipu vasinasaun <u><b><?= $tv[0]['naran_tipo']; ?></b></u>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">

                <?php if ($tv[0]['obs'] == "Kompletu") {
                    echo " ";
                }else { ?>
                <a href="input-doses-<?=$id; ?>.html" class=""><button class="btn btn-sm btn-success"><i
                            class="fa fa-plus"></i>
                        Aumenta
                        dados</button></a>
                <?php } ?>
            </div><br><br>
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
                        <th>Naran Doses</th>
                        <th>Data Vasinasaun</th>
                        <th>Aksi</th>
                    </tr>
                    <?php 

                    

                    
                    $no = 1;

                    foreach ($do as $row) {?>

                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['naran_tipo']; ?></td>
                        <td><?= $row['naran_dose']; ?></td>
                        <td><?= $row['data_dose']; ?></td>
                        <td>
                            <a href="update-doses-<?=$row['id_dose'] ?>.html"><button class="btn btn-xs btn-success"><i
                                        class="fa fa-edit"></i>
                                    Hadia</button></a>
                            <a
                                href="modul/mod_polio/aksi.php?act=delete&id=<?=$row['id_dose']?>&id_imun=<?=$row['id_imunisasaun']?>"><button
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

<?php break;case 'input':
    $id= $_GET['id'];
    ?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="kalendario.html">Kalendario Imunizasaun</a></li>
                    <li class='active'>Input Doses Vasinasaun</li>
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

            <form action="modul/mod_polio/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tipo Vasinasaun</label>
                        <select name="id_imunisasaun" id="" class="form-control" required>
                            <option value="" selected hidden>Tipo Vasinasaun</option>
                            <?php 
                            
                            $dados = $imun->dados_imun_form($id);
                            foreach ($dados as $row) {
                                
                                if ($row['doses'] > 0) {?>

                            <option value="<?= $row['id_imunisasaun']; ?>"><?= $row['naran_tipo']; ?></option>
                            <?php }else {
                                echo " ";
                            } ?>
                            <?php } ?>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Doses</label>
                        <select name="naran_dose" id="" class="form-control" required>
                            <option value="" selected hidden>Naran Doses</option>
                            <option value="DO-1">DO-1</option>
                            <option value="DO-2">DO-2</option>
                            <option value="DO-3">DO-3</option>
                            <option value="DO-4">DO-4</option>
                            <option value="DO-5">DO-5</option>
                            <option value="DO-6">DO-6</option>
                        </select>
                    </div><br><br><br><br>

                    <div class="col-md-12">
                        <label for="">Data Vasinasaun</label>
                        <input type="date" class="form-control" name="data_dose" required>
                    </div><br><br><br><br>
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
    $dos = $doses->form_doses($id);

    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="kalendario.html">Kalendario Imunizasaun</a></li>
                    <li class='active'>Update Doses Vasinasaun</li>
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

            <form action="modul/mod_polio/aksi.php?act=update&id=<?=$id ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tipo Vasinasaun</label>
                        <select name="id_imunisasaun" id="" class="form-control" required>
                            <option value="<?= $dos[0]['id_imunisasaun']; ?>" selected hidden>
                                <?= $dos[0]['naran_tipo']; ?></option>
                            <?php 
                            
                            $dados = $imun->dados_imun();
                            foreach ($dados as $row) {
                                
                                if ($row['doses'] > 0) {?>

                            <option value="<?= $row['id_imunisasaun']; ?>"><?= $row['naran_tipo']; ?></option>
                            <?php }else {
                                echo " ";
                            } ?>
                            <?php } ?>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Doses</label>
                        <select name="naran_dose" id="" class="form-control" required>
                            <option value="<?= $dos[0]['naran_dose']; ?>" selected hidden><?= $dos[0]['naran_dose']; ?>
                            </option>
                            <option value="DO-1">DO-1</option>
                            <option value="DO-2">DO-2</option>
                            <option value="DO-3">DO-3</option>
                            <option value="DO-4">DO-4</option>
                            <option value="DO-5">DO-5</option>
                            <option value="DO-6">DO-6</option>
                        </select>
                    </div><br><br><br><br>

                    <div class="col-md-12">
                        <label for="">Data Vasinasaun</label>
                        <input type="date" value="<?=$dos[0]['data_dose']?>" class="form-control" name="data_dose"
                            required>
                    </div><br><br><br><br>
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
<?php } ?>