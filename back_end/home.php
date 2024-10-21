<div class="breadcomb-area mg-t-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Total Dados Paseinte</h2>
                                    <p>Bemvindo Mai iha <span class="bread-ntd">Pagina <?php if ($_SESSION['level_user'] == "admin"){
                                        echo "Admin";
                                    }else {
                                        echo "Doutor";
                                    }  ?></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <!-- <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report"
                                    class="btn"><i class="notika-icon notika-sent"></i></button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php 
                $m = $pasiente->total_sexu_mane();
                $f = $pasiente->total_sexu_feto();
                $total = $pasiente->total();
                $tp = $tipo->tota_tipo();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="invoice-hs wt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                        <span><i class="fa fa-users" style="font-size:20px;"></i> Total Pasiente</span>
                        <h2><?=$total[0]['total'] ?> Pessoas</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="invoice-hs">
                        <span><i class="fa fa-users" style="font-size:20px;"></i> Total Pasiente
                            <?=$m[0]['sexu']; ?>ane</span>
                        <h2><?=$m[0]['total_sexu'] ?> Pessoas</h2>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="invoice-hs date-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                        <span><i class="fa fa-users" style="font-size:20px;"></i> Total Paseinte
                            <?=$f[0]['sexu'] ?>eto</span>
                        <h2><?=$f[0]['total_sexu'] ?> Pessoas</h2>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="invoice-hs gdt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                        <span><i class="fa fa-medkit"></i> Total tipo vasinasaun</span>
                        <h2><?= $tp[0]['total']; ?> Tipos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>