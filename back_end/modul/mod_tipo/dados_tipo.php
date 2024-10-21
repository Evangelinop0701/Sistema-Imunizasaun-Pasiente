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
                    <li class='active'>Dados Tipo Vasinasaun</li>
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
            <div class="row">
                <div class="col-md-2">
                    <a href="input-tipo.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                            Aumenta
                            dados</button></a>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <?php if ($_SESSION['level_user']=="admin") { ?>
                    <a href="import.html" class=""><button class="btn btn-sm btn-danger"><i class="fa fa-upload"></i>
                            Import</button></a>
                    <?php }else {
                        echo " ";
                    } ?>
                </div>
            </div>
            <div class="data-table-list">

                <div class="table-responsive">
                    <table id="data-table-basic" class="customers">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipo Vasinasaun</th>
                                <th>Deskrisaun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $data = $tipo->dados_tipu(); 
                            
                            $no = 1;

                            foreach ($data as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_tipo']; ?></td>
                                <td><?=$row['deskrisaun']; ?></td>
                                <td>
                                    <a href="update-tipo-<?= $row['id_tipo']; ?>.html" class=""><button
                                            class="btn-xs btn-primary"><i class="fa fa-edit"></i>
                                            Hadia</button></a>
                                    <a href="modul/mod_tipo/aksi.php?act=delete&id=<?= $row['id_tipo']?>"
                                        class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                            Hamos</button></a>
                                </td>
                            </tr>
                            <?php $no++; } ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tipo Vasinasaun</th>
                                <th>Deskrisaun</th>

                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php break; case 'input':?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Input dados Tipo</li>
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

            <form action="modul/mod_tipo/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tipo Vasinasaun</label>
                        <input type="text" class="form-control" name="naran_tipo" placeholder="Prense Tipo vasinasaun"
                            required>
                    </div><br><br><br><br>


                    <div class="col-md-12">
                        <label for="">Deskrisaun</label>
                        <textarea name="deskrisaun" id="" cols="30" rows="" class="form-control" name="hela_fatin"
                            placeholder="Deskrisaun Relasionan ho tipo Vasinasaun ne'ebe ita boot priense"
                            required></textarea>
                    </div><br><br><br><br><br>
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

    $up = $tipo->form_tipu($id);?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update dados Vasinasaun</li>
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

            <form action="modul/mod_tipo/aksi.php?act=update&id=<?=$id;?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tipo Vasinasaun</label>
                        <input type="text" class="form-control" value="<?=$up[0]['naran_tipo']?>" name="naran_tipo"
                            placeholder="Prense Tipo vasinasaun" required>
                    </div><br><br><br><br>


                    <div class="col-md-12">
                        <label for="">Deskrisaun</label>
                        <textarea name="deskrisaun" id="" cols="30" rows="" class="form-control" name="hela_fatin"
                            placeholder="Deskrisaun Relasionan ho tipo Vasinasaun ne'ebe ita boot priense"
                            required><?=$up[0]['deskrisaun']?></textarea>
                    </div><br><br><br><br><br>
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

<?php break;case 'import':?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Import Tipo Vasinasaun</li>
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

            <div class="alert alert-success">
                <li>Iha ne'e sei import file exel ho extensi CSV de'it...!</li>
            </div>

            <form action="modul/mod_tipo/aksi.php?act=import" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Import File csv</label>
                        <input type="file" class="form-control" name="file" placeholder="Import" required>
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
<?php break; ?>
<?php } ?>