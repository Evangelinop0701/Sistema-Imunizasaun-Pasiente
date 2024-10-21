<?php 
error_reporting(0);
include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':

        $arrayData = array(
            'naran_pasiente' => $_POST['naran_pasiente'],
            'data_moris' => $_POST['data_moris'],
            'sexu' => $_POST['sexu'],
            'naran_aman' => $_POST['naran_aman'],
            'naran_inan' => $_POST['naran_inan'],
            'no_tlf' => $_POST['no_tlf'],
            'id_aldeia' => $_POST['id_aldeia'],
            'bairo' => $_POST['bairo'],
    );

        $data = $crud->insert_data('t_pasiente', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../dados-pasiente.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "naran_pasiente='".$_POST['naran_pasiente']."'",
            "data_moris='".$_POST['data_moris']."'",
            "sexu='".$_POST['sexu']."'",
            "naran_aman='".$_POST['naran_aman']."'",
            "naran_inan='".$_POST['naran_inan']."'",
            "no_tlf='".$_POST['no_tlf']."'",
            "id_aldeia='".$_POST['id_aldeia']."'",
            "bairo='".$_POST['bairo']."'"
        );

        $data = $crud->update_data('t_pasiente', $arrayData, 'id_pasiente', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../dados-pasiente.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_pasiente', 'id_pasiente', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../dados-pasiente.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
       
}

?>