<?php 


switch ($_GET['act']) {
    case 'read':?>
<div class="breadcomb-area mg-tb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb alert-danger">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Periodo</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Periodo
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">

                <div class="data-table-list">
                    <a href="input-periodo.html" class=""><button class="btn btn-sm btn-success"><i
                                class="fa fa-plus"></i>
                            Aumenta
                            dados</button></a><br><br>
                    <div class="table-responsive">
                        <table id="" class="customers">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Periodo</th>
                                    <th>Activasaun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $data = $periodo->periodo(); 
                            $no = 1;
                            foreach ($data as $row) {?>
                                <tr>

                                    <td><?=$no; ?></td>
                                    <td><?=$row['periodo'] ?></td>
                                    <td>
                                        <?php if($row['status'] == "") { ?>
                                        <a
                                            href="modul/mod_periodo/aksi.php?act=update_status&id=<?=$row['id_periodo']?>">
                                            <center><i class="fa fa-remove" style="color:red;"></i></center>
                                        </a>
                                        <?php }else {?>
                                        <center><i class="fa fa-check" style="color:green;"></i></center>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="update-tipo-.html" class=""><button class="btn-xs btn-primary"><i
                                                    class="fa fa-edit"></i>
                                                Hadia</button></a>
                                        <a href="modul/mod_periodo/aksi.php?act=delete&id=<?=$row['id_periodo']?>"
                                            class=""><button class="btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                Hamos</button></a>
                                    </td>
                                </tr>

                                <?php $no++; } ?>

                            </tbody>

                        </table>
                    </div>
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
                    <li><a href="periodo.html">Periodo</a></li>
                    <li class='active'>Input Periodo</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel  panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                Formulario Input Periodo
            </div>
        </div>
        <div class="panel-body">

            <form action="modul/mod_periodo/aksi.php?act=input" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Periodo</label>
                        <input type="text" class="form-control" name="periodo" placeholder="Prense Periodo" required>
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


<?php break ?>
<?php } ?>