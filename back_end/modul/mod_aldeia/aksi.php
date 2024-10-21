<?php 
error_reporting();
include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':

        $arrayData = array(
            'naran_suku' => $_POST['naran_suku'],
            'naran_aldeia' => $_POST['naran_aldeia']
           
    );

        $data = $crud->insert_data('t_aldeia', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../aldeia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "naran_suku='".$_POST['naran_suku']."'",
            "naran_aldeia='".$_POST['naran_aldeia']."'"
        );

        $data = $crud->update_data('t_aldeia', $arrayData, 'id_aldeia', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../aldeia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_aldeia', 'id_aldeia', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../aldeia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
       
}

?>