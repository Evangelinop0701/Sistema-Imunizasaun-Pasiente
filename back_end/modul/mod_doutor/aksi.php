<?php 
error_reporting(0);

include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':

        $arrayData = array(
            'naran_doutor' => $_POST['naran_doutor'],
            'sexu' => $_POST['sexu'],
            'data_moris' => $_POST['data_moris'],
            'area_espesifiku' => $_POST['area_espesifiku'],
            'id_aldeia' => $_POST['id_aldeia'],
            'hela_fatin' => $_POST['hela_fatin']
    );

        $data = $crud->insert_data('t_doutor', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../dados-doutor.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "naran_doutor='".$_POST['naran_doutor']."'",
            "sexu='".$_POST['sexu']."'",
            "data_moris='".$_POST['data_moris']."'",
            "area_espesifiku='".$_POST['area_espesifiku']."'",
            "hela_fatin='".$_POST['hela_fatin']."'",
            "id_aldeia='".$_POST['id_aldeia']."'"
        );

        $data = $crud->update_data('t_doutor', $arrayData, 'id_doutor', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../dados-doutor.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_doutor', 'id_doutor', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../dados-doutor.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
       
}

?>