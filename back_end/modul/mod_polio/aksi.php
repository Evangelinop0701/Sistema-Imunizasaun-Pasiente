<?php 
error_reporting(0);

include "../../class/class.php";

$db = new database();
$crud = new CRUD();
$imun = new imun();

$act = $_GET['act'];

switch ($act) {
    case 'input':
        $arrayData = array(
            'id_imunisasaun' => $_POST['id_imunisasaun'],
            'naran_dose' => $_POST['naran_dose'],
            'data_dose' => $_POST['data_dose']
           
    );
    $id = $_POST['id_imunisasaun'];

        $data = $crud->insert_data('t_dose', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../doses-".$id.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        
        $arrayData = array(
            "id_imunisasaun='".$_POST['id_imunisasaun']."'",
            "naran_dose='".$_POST['naran_dose']."'",
            "data_dose='".$_POST['data_dose']."'"
        );


        $id_imun = $_POST['id_imunisasaun'];

        $data = $crud->update_data('t_dose', $arrayData, 'id_dose', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../doses-".$id_imun.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $id_imun = $_GET['id_imun'];
        $imun->update_obs_dell($id_imun);
        $data = $crud->delete_data('t_dose', 'id_dose', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../doses-".$id_imun.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
       
}

?>