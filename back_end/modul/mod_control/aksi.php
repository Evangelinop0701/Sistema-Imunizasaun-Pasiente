<?php 
error_reporting(0);
include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':

        $arrayData = array(
            'email' => $_POST['email'],
            'no_tlf' => $_POST['no_tlf'],
            'instagram' => $_POST['instagram'],
            'facabook' => $_POST['facabook'],
            'wa' => $_POST['wa']
           
    );

        $data = $crud->insert_data('t_control', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../control-panel.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "email='".$_POST['email']."'",
            "no_tlf='".$_POST['no_tlf']."'",
            "instagram='".$_POST['instagram']."'",
            "facabook='".$_POST['facabook']."'",
            "wa='".$_POST['wa']."'"
        );

        $data = $crud->update_data('t_control', $arrayData, 'id_control', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../control-panel.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_control', 'id_control', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../control-panel.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
       
}

?>