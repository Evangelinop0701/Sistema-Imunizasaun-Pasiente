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
                    <li class='active'>Dados Doutor</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Dados Doutor
            </div>
        </div>
        <div class="panel-body">

            <div class="data-table-list">
                <a href="input-doutor.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Aumenta
                        dados</button></a><br><br>
                <div class="table-responsive">
                    <table id="data-table-basic" class="customers">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Naran Doutor</th>
                                <th>Sexu</th>
                                <th>Tinan</th>
                                <th>Aldeia</th>
                                <th>Hela Fatin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $data = $doutor->dados_doutor(); 
                            
                            $no = 1;

                            foreach ($data as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><a
                                        href="detalho-doutor-<?= $row['id_doutor']; ?>.html"><?=$row['naran_doutor']; ?></a>
                                </td>
                                <td><?=$row['sexu']; ?></td>
                                <td><?=$row['idade']; ?></td>
                                <td><?=$row['naran_aldeia']; ?></td>
                                <td><?=$row['hela_fatin']; ?></td>
                                <td>
                                    <a href="update-doutor-<?= $row['id_doutor']; ?>.html" class=""><button
                                            class="btn-xs btn-primary"><i class="fa fa-edit"></i>
                                            Hadia</button></a>
                                    <a href="modul/mod_doutor/aksi.php?act=delete&id=<?= $row['id_doutor']?>"
                                        class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                            Hamos</button></a>
                                </td>
                            </tr>
                            <?php $no++; } ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Naran Doutor</th>
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
                    <li class='active'>Input dados Doutor</li>
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

            <form action="modul/mod_doutor/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Naran Doutor/a</label>
                        <input type="text" class="form-control" name="naran_doutor" placeholder="Prense naran" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Sexu</label>
                        <select name="sexu" id="" class="form-control" required>
                            <option value="" selected hidden>Sexu</option>
                            <option value="M">Mane</option>
                            <option value="F">Feto</option>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-4">
                        <label for="">Data Moris</label>
                        <input type="date" class="form-control" name="data_moris" placeholder="Prense Data moris"
                            required>
                    </div>
                    <div class="col-md-4">
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
                        <input type="text" class="form-control" name="hela_fatin" placeholder="Prense Hela Fatin"
                            required>
                    </div><br><br><br><br>
                    <div class="col-md-10">
                        <label for="">Area Espesialidade</label>
                        <textarea name="area_espesifiku" id="" cols="30" rows="" class="form-control" name="hela_fatin"
                            placeholder="Area Espesialidade" required></textarea>
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
    $up = $doutor->form_doutor($id);
    ?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update dados Doutor</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Updata dados Doutor
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_doutor/aksi.php?act=update&id=<?=$id;?>" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Naran Doutor/a</label>
                        <input type="text" class="form-control" name="naran_doutor" value="<?=$up[0]['naran_doutor']?>"
                            placeholder="Prense naran" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Sexu</label>
                        <select name="sexu" id="" class="form-control" required>
                            <option value="<?=$up[0]['sexu']?>" selected hidden><?php if ($up[0]['sexu'] == "M") {
                                echo "Mane";
                            }else {
                                echo "Feto";
                            } ?></option>
                            <option value="M">Mane</option>
                            <option value="F">Feto</option>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-4">
                        <label for="">Data Moris</label>
                        <input type="date" class="form-control" name="data_moris" value="<?=$up[0]['data_moris']?>"
                            placeholder="Prense Data moris" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Aldeia</label>
                        <select name="id_aldeia" id="" class="form-control" required>
                            <option value="<?=$up[0]['id_aldeia']?>" selected hidden>
                                <?=$up[0]['naran_suku'] ?>-<?= $up[0]['naran_aldeia'] ?></option>
                            <?php $al = $aldeia->dados_aldeia();
                            foreach ($al as $row) { ?>
                            <option value="<?=$row['id_aldeia']?>"><?=$row['naran_suku']?>-<?=$row['naran_aldeia']?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hela fatin/Bairo</label>
                        <input type="text" class="form-control" name="hela_fatin" value="<?=$up[0]['hela_fatin']?>"
                            placeholder="Prense Hela Fatin" required>
                    </div><br><br><br><br>
                    <div class="col-md-10">
                        <label for="">Area Espesialidade</label>
                        <textarea name="area_espesifiku" id="" cols="30" rows="" class="form-control" name="hela_fatin"
                            placeholder="Area Espesialidade" required><?=$up[0]['area_espesifiku']?></textarea>
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
<?php break;case 'detalho':
    $id = $_GET['id']; 
    $dt = $doutor->form_doutor($id);
    ?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Detalho Doutor</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title text-uppercase">
                Identidade pessoal husi Doutor <u><b><?= $dt[0]['naran_doutor'] ?></b></u>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-md-6">
                <table class="customers">
                    <tr>
                        <th>Naran Doutor</th>
                        <td><?= $dt[0]['naran_doutor'] ?></td>
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
                        <th>Area Espesiadlidade</th>
                        <td><?= $dt[0]['area_espesifiku'] ?> </td>
                    </tr>
                    <tr>
                        <th>Residensia Atual</th>
                        <td><?= $dt[0]['naran_suku'] ?> / <?= $dt[0]['naran_aldeia'] ?> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php break; ?>
<?php }?>