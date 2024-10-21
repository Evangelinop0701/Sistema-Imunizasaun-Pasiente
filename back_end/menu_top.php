<?php 
error_reporting(0);
if (!$user->get_sessi()) {
    header('location: ../index.html');
}

?>
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <!-- <a href="#"><img src=".assets/img/logo/logo.png" alt="" /></a> -->
                    <h4 style="color:white; padding-top:10px; margin-left:40px;">SI-DADOS IMUNISASAUN
                        KLINIKA
                    </h4>
                </div>
            </div>

            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <?php if ($_SESSION['level_user'] == "admin") { ?>
                        <li class="nav-item"><a href="periodo.html" class="nav-link dropdown-toggle"><span>
                                    <!-- <i class="notika-icon notika-chat"></i> -->
                                    <i class="fa fa-tasks" style="font-size: 14px;"></i> <span style=" font-size:
                                        14px;"> Perido
                                    </span>
                                </span></a>

                        </li>
                        <li class="nav-item"><a href="control-panel.html" class="nav-link dropdown-toggle"><span>
                                    <!-- <i class="notika-icon notika-chat"></i> -->
                                    <i class="fa fa-folder" style="font-size: 14px;"></i> <span style=" font-size:
                                        14px;"> Control Panel
                                    </span>
                                </span></a>

                        </li>
                        <?php }else {
                            echo " ";
                        } ?>
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                class="nav-link dropdown-toggle"><span>
                                    <!-- <i class="notika-icon notika-chat"></i> -->
                                    <i class="fa fa-user-md" style="font-size: 14px;"></i> <span style=" font-size:
                                        14px;"> <?= $uname; ?> <i class="fa fa-sort-down"></i>
                                    </span>
                                </span></a>
                            <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                <div class="hd-mg-va">
                                    <a href="detalho-doutor-<?= $id_doutor; ?>.html"><i class="fa fa-user"></i>
                                        Profile</a>
                                    <!-- <a href="#"><i class="fa fa-gear"></i> Troka Password</a> -->
                                    <a href="update-pass-<?= $_SESSION['id_user']; ?>.html"><i class="fa fa-gear"></i>
                                        Troka
                                        Password</a>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>