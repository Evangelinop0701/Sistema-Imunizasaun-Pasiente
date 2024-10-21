<?php 
error_reporting(0);
include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':

        $arrayData = array(
            'id_doutor' => $_POST['id_doutor'],
            'username' => $_POST['username'],
            'password' => sha1(md5($_POST['password'])),
            'pass' => $_POST['password'],
           
    );

        $data = $crud->insert_data('t_user', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../user.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "id_doutor='".$_POST['id_doutor']."'",
            "username='".$_POST['username']."'",
            "password='".sha1(md5($_POST['password']))."'",
            "pass='".$_POST['password']."'",
        );

        $data = $crud->update_data('t_user', $arrayData, 'id_user', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../user.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_user', 'id_user', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../user.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 

        case 'update_pass':
              $id = $_GET['id'];
                $arrayData = array(
                    "username='".$_POST['username']."'",
                    "password='".sha1(md5($_POST['password']))."'",
                    "pass='".$_POST['password']."'",
                );

                $data = $crud->update_data('t_user', $arrayData, 'id_user', $id);

                if($data) {
                    echo "<script>alert('Hadia dados ho sucessu...!')</script>";
                    echo "<script>window.location='../../home.html'</script>";
                } else {
                    echo "<script>alert('ERROR!')</script>";
                }
                break;
       
}

?>