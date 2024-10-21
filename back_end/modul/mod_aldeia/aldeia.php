<?php 

switch ($_GET['act']) {
    case 'read':?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Dados Aldeia</li>
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
                <a href="input-aldeia.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Aumenta
                        dados</button></a>
            </div>
            <div class="data-table-list">

                <div class="table-responsive">
                    <table id="" class="customers">
                        <tr>
                            <th>No</th>
                            <th>Suku</th>
                            <th>Aldeia</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <?php 
                            $data = $aldeia->dados_aldeia();
                            $no = 1;

                            foreach ($data as $row) { ?>

                        <tr>
                            <td><?=$no; ?></td>
                            <td><?=$row['naran_suku'] ?></td>
                            <td><?=$row['naran_aldeia'] ?></td>
                            <td>
                                <a href="update-aldeia-<?= $row['id_aldeia']; ?>.html" class=""><button
                                        class="btn-xs btn-primary"><i class="fa fa-edit"></i>
                                        Hadia</button></a>
                                <a href="modul/mod_aldeia/aksi.php?act=delete&id=<?= $row['id_aldeia']?>"
                                    class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                        Hamos</button></a>
                            </td>
                        </tr>

                        <?php $no++; } ?>
                        </tr>
                    </table>
                </div>
            </div>
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
                    <li class='active'>Input Aldeia</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Input Aldeia
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_aldeia/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Naran Suku</label>
                        <select name="naran_suku" class="form-control" id="">
                            <option value="Liaruka" selected hidden>Liaruka</option>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Naran Aldeia</label>
                        <input type="text" class="form-control" name="naran_aldeia" placeholder="Naran Aldeia">
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
    
    $up = $aldeia->form_aldeia($id);

    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update Aldeia</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Update Aldeia
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_aldeia/aksi.php?act=update&id=<?= $id; ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Naran Suku</label>
                        <select name="naran_suku" class="form-control" id="">
                            <option value="Liaruka" selected hidden>Liaruka</option>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Naran Aldeia</label>
                        <input type="text" value="<?= $up[0]['naran_aldeia']?>" class="form-control" name="naran_aldeia"
                            placeholder="Naran Aldeia">
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