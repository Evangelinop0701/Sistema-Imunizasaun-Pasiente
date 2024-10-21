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
                    <li class='active'>Control Panel</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Control Panel
            </div>
        </div>
        <div class="panel-body">
            <a href="input-control.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                    Aumenta
                    dados</button></a>
            <div class="data-table-list">

                <div class="table-responsive">
                    <table id="data-table-basic" class="customers">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Numeru Kontaktu</th>
                                <th>Link Email</th>
                                <th>Link Facebook</th>
                                <th>Whastapp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                        
                        $data = $control->control_panel();
                        $no = 1;

                        foreach ($data as $row) {?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['no_tlf']; ?></td>
                                <td><?= $row['instagram']; ?></td>
                                <td><?= $row['facabook']; ?></td>
                                <td><?= $row['wa']; ?></td>
                                <td>
                                    <a href="update-control-<?=$row['id_control']?>.html" class=""><button
                                            class="btn-xs btn-primary"><i class="fa fa-edit"></i>
                                            Hadia</button></a>
                                    <a href="modul/mod_control/aksi.php?act=delete&id=<?=$row['id_control']?>"
                                        class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                            Hamos</button></a>
                                </td>
                            </tr>
                            <?php $no++; } ?>



                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Numeru Kontaktu</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th>Whastapp</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
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
                    <li class='active'>Input Dados Panel</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Input Dados Panel
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_control/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Prense Email">
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">No. Telfone</label>
                        <input type="number" class="form-control" name="no_tlf" placeholder="Prense no telfone"
                            required>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Link Email</label>
                        <input type="text" class="form-control" name="instagram" placeholder="http://www.email.com">
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Link facebook</label>
                        <input type="text" class="form-control" name="facabook" placeholder="http://www.facebook.com">
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">No. Whatsapp</label>
                        <input type="number" class="form-control" name="wa" placeholder="Prense no Whatsapp">
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
    $upd = $control->form_control($id);?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update Dados Panel</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Update Dados Panel
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_control/aksi.php?act=update&id=<?=$id; ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="email" value="<?= $upd[0]['email']; ?>" class="form-control" name="email"
                            placeholder="Prense Email">
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">No. Telfone</label>
                        <input type="number" value="<?= $upd[0]['no_tlf']; ?>" class="form-control" name="no_tlf"
                            placeholder="Prense no telfone" required>
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Link Email</label>
                        <input type="text" value="<?= $upd[0]['instagram']; ?>" class="form-control" name="instagram"
                            placeholder="">
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">Link Facabook</label>
                        <input type="text" value="<?= $upd[0]['facabook']; ?>" class="form-control" name="facabook"
                            placeholder="Prense facebook">
                    </div><br><br><br><br>
                    <div class="col-md-12">
                        <label for="">No. Whatsapp</label>
                        <input type="number" value="<?= $upd[0]['wa']; ?>" class="form-control" name="wa"
                            placeholder="Prense no Whatsapp">
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