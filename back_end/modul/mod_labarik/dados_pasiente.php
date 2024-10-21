<?php 
error_reporting();
switch ($_GET['act']) {
    case 'read': ?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Dados Labarik</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Dados Labarik
            </div>
        </div>
        <div class="panel-body">

            <div class="data-table-list">

                <div class="table-responsive">
                    <a href="input-pasiente.html" class=""><button class="btn btn-sm btn-success"><i
                                class="fa fa-plus"></i>
                            Aumenta
                            dados</button></a><br><br>
                    <table id="data-table-basic" class="customers">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Naran Labarik</th>
                                <th>Sexu</th>
                                <th>Tinan</th>
                                <th>Aldeia</th>
                                <th>Hela Fatin</th>
                                <th>Aksi</th>
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
                                <td><?=$row['data_moris'] ?></td>
                                <td><?=$row['naran_aldeia'] ?></td>
                                <td><?=$row['bairo'] ?></td>
                                <td>
                                    <a href="update-pasiente-<?= $row['id_pasiente']; ?>.html" class=""><button
                                            class="btn-xs btn-primary"><i class="fa fa-edit"></i>
                                            Hadia</button></a>
                                    <a href="modul/mod_labarik/aksi.php?act=delete&id=<?= $row['id_pasiente']?>"
                                        class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                            Hamos</button></a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Naran Labarik</th>
                                <th>Sexu</th>
                                <th>Tinan</th>
                                <th>Aldeia</th>
                                <th>Hela Fatin</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php break;case 'input':?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Input dados Labarik</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_labarik/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Naran Labarik</label>
                        <input type="text" class="form-control" name="naran_pasiente" placeholder="Prense naran Labarik"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Data Moris</label>
                        <input type="date" class="form-control" name="data_moris" placeholder="Prense Data moris"
                            required>
                    </div><br><br><br><br>
                    <div class="col-md-4">
                        <label for="">Sexu</label>
                        <select name="sexu" id="" class="form-control" required>
                            <option value="" selected hidden>Sexu</option>
                            <option value="M">Mane</option>
                            <option value="F">Feto</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Husi Aman</label>
                        <input type="text" class="form-control" name="naran_aman" placeholder="Prense Naran Aman"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Husi Inan</label>
                        <input type="text" class="form-control" name="naran_inan" placeholder="Prense Naran Inan"
                            required>
                    </div><br><br><br><br>
                    <div class="col-md-5">
                        <label for="">No.Telfone</label>
                        <input type="number" class="form-control" min="0" name="no_tlf" placeholder="Prense no Telfone"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Aldeia</label>
                        <select name="id_aldeia" id="" class="form-control" required>
                            <option value="" selected hidden>Naran Aldeia</option>
                            <?php $al = $aldeia->dados_aldeia();
                            foreach ($al as $row) { ?>
                            <option value="<?=$row['id_aldeia']?>"><?=$row['naran_suku']?>-<?=$row['naran_aldeia']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hela fatin/Bairo</label>
                        <input type="text" class="form-control" min="0" name="bairo" placeholder="Prense Bairo"
                            required>
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

    $data = $pasiente->select_form($id);
    ?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update dados Labarik</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_labarik/aksi.php?act=update&id=<?=$id;?>" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Naran Labarik</label>
                        <input type="text" class="form-control" name="naran_pasiente" placeholder="Prense naran Labarik"
                            value="<?= $data[0]['naran_pasiente']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Data Moris</label>
                        <input type="date" class="form-control" name="data_moris" placeholder="Prense Data moris"
                            value="<?= $data[0]['data_moris']; ?>" required>
                    </div><br><br><br><br>
                    <div class="col-md-4">
                        <label for="">Sexu</label>
                        <select name="sexu" id="" class="form-control" required>
                            <option value="<?= $data[0]['sexu']; ?>" selected hidden><?php if ($data[0]['sexu'] == "M") {
                                echo "Mane";
                            }else {
                                echo "Feto";
                            } ?>
                            </option>
                            <option value="M">Mane</option>
                            <option value="F">Feto</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Husi Aman</label>
                        <input type="text" class="form-control" name="naran_aman" placeholder="Prense Naran Aman"
                            value="<?= $data[0]['naran_aman']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Husi Inan</label>
                        <input type="text" class="form-control" name="naran_inan" placeholder="Prense Naran Inan"
                            value="<?= $data[0]['naran_inan']; ?>" required>
                    </div><br><br><br><br>
                    <div class="col-md-5">
                        <label for="">No.Telfone</label>
                        <input type="number" class="form-control" min="0" name="no_tlf" placeholder="Prense no Telfone"
                            value="<?= $data[0]['no_tlf']; ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Aldeia</label>
                        <select name="id_aldeia" id="" class="form-control" required>
                            <option value="<?= $data[0]['id_aldeia']; ?>" selected hidden>
                                <?= $data[0]['naran_suku']?>-<?= $data[0]['naran_aldeia']?></option>
                            <?php $al = $aldeia->dados_aldeia();
                            foreach ($al as $row) { ?>
                            <option value="<?=$row['id_aldeia']?>"><?=$row['naran_suku']?>-<?=$row['naran_aldeia']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hela fatin/Bairo</label>
                        <input type="text" class="form-control" min="0" name="bairo" placeholder="Prense Bairo"
                            value="<?= $data[0]['bairo']; ?>" required>
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
<?php break;case 'detalo':
    
    $id = $_GET['id'];
    $dt = $pasiente->select_form($id);
    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Detalho Labarik</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title text-uppercase">
                Identidade pessoal husi Labarik <u><b><?= $dt[0]['naran_pasiente'] ?></b></u>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-md-6">
                <table class="customers">
                    <tr>
                        <th>Naran Labarik</th>
                        <td><?= $dt[0]['naran_pasiente'] ?></td>
                    </tr>
                    <tr>
                        <th>Sexu</th>
                        <td><?php if ($dt[0]['sexu'] == "M" ) {
                            echo "Mane";
                        }else {
                            echo "Feto";
                        }?></td>
                    </tr>
                    <tr>
                        <th>Idade</th>
                        <td><?= $dt[0]['idade'] ?> Anos</td>
                    </tr>
                    <tr>
                        <th>Aman</th>
                        <td><?= $dt[0]['naran_aman'] ?> </td>
                    </tr>
                    <tr>
                        <th>Inan</th>
                        <td><?= $dt[0]['naran_inan'] ?> </td>
                    </tr>
                    <tr>
                        <th>Nomor Telfone</th>
                        <td><?= $dt[0]['no_tlf'] ?></td>
                    </tr>
                    <tr>
                        <th>Aldeia</th>
                        <td><?= $dt[0]['naran_aldeia'] ?></td>
                    </tr>
                    <tr>
                        <th>Regidensia Atual</th>
                        <td><?= $dt[0]['bairo'] ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>

<?php break; ?>
<?php } ?>