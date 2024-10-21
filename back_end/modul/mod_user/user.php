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
                    <li class='active'>Dados Users</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Dados Users
            </div>
        </div>
        <div class="panel-body">

            <div class="data-table-list">
                <a href="input-user.html" class=""><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Aumenta
                        dados</button></a><br><br>
                <div class="table-responsive">
                    <table id="data-table-basic" class="customers">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Naran</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $data = $user->dados_user(); 
                            
                            $no = 1;

                            foreach ($data as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_doutor']; ?></td>
                                <td><?=$row['username']; ?></td>
                                <td><?=$row['pass']; ?></td>
                                <td>
                                    <a href="update-user-<?= $row['id_user']; ?>.html" class=""><button
                                            class="btn-xs btn-primary"><i class="fa fa-edit"></i>
                                            Hadia</button></a>
                                    <a href="modul/mod_user/aksi.php?act=delete&id=<?= $row['id_user']?>"
                                        class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                            Hamos</button></a>
                                </td>
                            </tr>
                            <?php $no++; } ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Naran</th>
                                <th>Username</th>
                                <th>Password</th>
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
                    <li class='active'>Input dados User</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Input User
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_user/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Naran User</label>
                        <select name="id_doutor" class="form-control" id="" required>
                            <option value="" selected hidden>Naran User</option>
                            <?php 
                            $d = $doutor->dados_doutor();
                            foreach ($d as $row) {?>
                            <option value="<?=$row['id_doutor']?>"><?=$row['naran_doutor'] ?></option>
                            <?php } ?>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-6">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
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

    $up = $user->form_user($id);?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update dados User</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Update User
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_user/aksi.php?act=update&id=<?=$id;?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Naran User</label>
                        <select name="id_doutor" class="form-control" id="" required>
                            <option value="<?=$up[0]['id_doutor']?>" selected hidden><?=$up[0]['naran_doutor'] ?>
                            </option>
                            <?php 
                            $d = $doutor->dados_doutor();
                            foreach ($d as $row) {?>
                            <option value="<?=$row['id_doutor']?>"><?=$row['naran_doutor'] ?></option>
                            <?php } ?>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-6">
                        <label for="">Username</label>
                        <input type="text" class="form-control" value="<?=$up[0]['username']?>" name="username"
                            placeholder="Username" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" value="<?=$up[0]['pass']?>" name="password"
                            placeholder="Password" required>
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

<?php break;case 'update_pass': 

 $id = $_GET['id'];

    $up = $user->form_user($id);?>

<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Update Password User</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Update Password User
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_user/aksi.php?act=update_pass&id=<?=$id;?>" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Naran User</label>
                        <select name="id_doutor" class="form-control" id="" required disabled>
                            <option value="<?=$up[0]['id_doutor']?>" selected hidden><?=$up[0]['naran_doutor'] ?>
                            </option>
                            <?php 
                            $d = $doutor->dados_doutor();
                            foreach ($d as $row) {?>
                            <option value="<?=$row['id_doutor']?>"><?=$row['naran_doutor'] ?></option>
                            <?php } ?>
                        </select>
                    </div><br><br><br><br>
                    <div class="col-md-6">
                        <label for="">Username</label>
                        <input type="text" class="form-control" value="<?=$up[0]['username']?>" name="username"
                            placeholder="Username" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" value="<?=$up[0]['pass']?>" name="password"
                            placeholder="Password" required>
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