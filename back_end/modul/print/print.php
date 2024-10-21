<!DOCTYPE html>
<?php
    include "../../class/class.php";
    include "../../class/lib.php";
    
    $db = new database();
    $pasiente = new pasiente();
    $imun = new imun();
    $doses = new doses();
    $dr = new doutor();
 
    $id = $_GET['id'];
    $pass = $pasiente->dados_pasiente_input($id);
    $dos = $doses->print_report($id);

?>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <style>
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }


    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        /* text-align: center; */
        /* background-color: #04AA6D; */
        /* color: white; */
    }


    @media print {
        #print {
            display: none;
        }
    }

    @media print {
        #PrintButton {
            display: none;
        }
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
    </style>
</head>

<body>
    <div class="container"><br>
        <table class="customers">
            <tr>
                <th colspan="10" class="py-2">
                    <center>RELATORIO JERAL BA PASIENTE NIA SISTEMA IMUNIZASAUN</center>
                </th>
            </tr>
            <tr>
                <td colspan="10">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="customers">
                                <tr>
                                    <th class="py-0">Date</th>
                                    <td class="py-0"><?= date("Y-m-d", strtotime("+6 HOURS"));?></td>
                                </tr>
                                <tr>
                                    <th class="py-0">Naran</th>
                                    <td class="py-0"><?=$pass[0]['naran_pasiente'] ?></td>
                                </tr>
                                <tr>
                                    <th class="py-0">Sexu</th>
                                    <td class="py-0"><?=$pass[0]['sexu'] ?></td>
                                </tr>
                                <tr>
                                    <th class="py-0">Idade</th>
                                    <td class="py-0"><?=$pass[0]['idade'] ?> Anos</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="py-1" colspan="10">
                    <center>KALENDARIO VASINASAUN</center>
                </th>
            </tr>
            <tr>
                <th class="py-1">No</th>
                <th class="py-1">Tipo Vasinasaun</th>
                <th class="py-1">Data Vasinasaun</th>
                <th class="py-1">Data Revasinasaun</th>
                <th class="py-1">Doses</th>
                <th class="py-1">Obs</th>
            </tr>
            <?php
                    


                    $no =1;
                    $data = $imun->detalho_kalender($id);
                    
                    foreach ($data as $row) {?>
            <tr>
                <td class="py-1"><?=$no; ?></td>

                <td class="py-1"><?=$row['naran_tipo']; ?></td>
                <td class="py-1"><?=$row['data_imunizasaun']; ?></td>
                <td class="py-1"><?=$row['data_durasaun']; ?></td>
                <td class="py-1"><?=$row['doses']; ?></td>
                <td class="py-1">
                    <?php 
                
                if ($row['obs'] == "Kompletu") {
                    echo "Kompletu";
                }elseif ($row['doses'] <= 0) {

                     echo "Kompletu";
                } else {
                    echo "Sedauk Kompletu";
                }
                
                ?>
                </td>
            </tr>
            <?php $no++; } ?>
        </table>
        <table class="customers">
            <tr>
                <th class="py-1" colspan="10">
                    <center>DETALLO VASINASAUN BASEIA BA DOSES KADA TIPO VASINASAUN</center>
                </th>
            </tr>
            <tr>
                <th class="py-1">Tipo Vasinasaun</th>
                <th class="py-1">Naran Doses</th>
                <th class="py-1">Data Vasinasaun</th>
            </tr>
            <?php 
            foreach ($dos as $row) { ?>
            <tr>
                <td class="py-1"><?=$row['naran_tipo'] ?></td>
                <td class="py-1"><?=$row['naran_dose'] ?></td>
                <td class="py-1"><?=$row['data_dose'] ?></td>
            </tr>
            <?php } ?>
        </table>

        <br><br>

        <div class="row">
            <div class="col-md-7 text-center">
                <?php  
                
                $dres = $dr->dados_doutor_res($id);
                foreach ($dres as $row) {?>
                <span class="fw-bold">( <u> <?=$row['naran_dr'] ?> </u> )</span>
                <?php } ?>
                <p class="text-center">Doutor Resposavel</p>
            </div>
        </div>
    </div>


    <center>
        <button id="PrintButton" class="btn btn-sm btn-danger" onclick="PrintPage()">Imprimir</button>
    </center>
</body>
<script type="text/javascript">
function PrintPage() {
    window.print();
}
document.loaded = function() {

}
window.addEventListener('DOMContentLoaded', (event) => {
    PrintPage()
    setTimeout(function() {
        window.close()
    }, 750)
});
</script>

</html>