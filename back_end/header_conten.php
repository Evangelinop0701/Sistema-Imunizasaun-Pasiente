 <!-- Mobile Menu start -->
 <?php session_start();
 ?>

 <div class="mobile-menu-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="mobile-menu">
                     <nav id="dropdown">
                         <ul class="mobile-menu-nav">
                             <li><a data-toggle="collapse" data-target="#Charts" href="home.html">Home</a>

                             </li>
                             <li><a data-toggle="collapse" data-target="#demoevent" href="dados-pasiente.html">Dados
                                     Labarik</a>

                             </li>
                             <li><a data-toggle="collapse" data-target="#democrou" href="dados-doutor.html">Dados
                                     Doutor</a>

                             </li>
                             <li><a data-toggle="collapse" data-target="#demolibra" href="dados-tipo.html">Tipu
                                     Vasinasaun</a>

                             </li>
                             <li><a data-toggle="collapse" data-target="#demodepart" href="imunisasaun.html"> Dados
                                     Imunisasaun</a>

                             </li>
                             <?php if ($_SESSION['level_user'] == "admin") { ?>
                             <li><a data-toggle="collapse" data-target="#demo" href="user.html">Dados Users</a>

                             </li>
                             <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="aldeia.html">Dados
                                     Aldeia</a>
                             </li>
                             <?php }else {
                                echo " ";
                             } ?>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Mobile Menu end -->
 <!-- Main Menu area start-->

 <div class="main-menu-area mg-tb-30">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                     <li class=""><a href="home.html"><i class="notika-icon notika-house"></i>
                             Home</a>
                     </li>
                     <li><a href="dados-pasiente.html"><i class="notika-icon notika-support"></i>
                             Dados
                             Labarik</a>
                     </li>
                     <?php if ($_SESSION['level_user'] == "admin") { ?>
                     <li><a href="dados-doutor.html"><i class="notika-icon notika-edit"></i> Dados Doutor</a>
                     </li>
                     <?php }else {
                        echo " ";
                     } ?>
                     <li><a href="dados-tipo.html"><i class="notika-icon notika-form"></i>Tipu
                             Vasinasaun</a>
                     </li>
                     <li><a href="imunisasaun.html" harts><i class="notika-icon notika-bar-chart"></i> Dados
                             Imunizasaun</a>
                     </li>
                     <?php if ($_SESSION['level_user'] == "admin") { ?>
                     <li><a href="user.html"><i class="notika-icon notika-windows"></i>
                             Dados Users</a>
                     </li>
                     <li><a href="aldeia.html"><i class="notika-icon notika-form"></i> Aldeia</a>
                     </li>

                     <?php }else {
                        echo " ";
                     } ?>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- Main Menu area End-->