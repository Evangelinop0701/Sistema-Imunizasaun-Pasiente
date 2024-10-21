<?php 
error_reporting(0);

include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':
        
        $arrayData = array(
            'id_pasiente' => $_POST['id_pasiente'],
            'data_imunizasaun' => $_POST['data_imunizasaun'],
            'id_tipo' => $_POST['id_tipo'],
            'data_durasaun' => $_POST['data_durasaun'],
            'doses' => $_POST['doses'],
            'id_doutor' => $_POST['id_doutor'],
            'komentario' => $_POST['komentario'],
            'id_periodo' => $_POST['id_periodo']
           
    );

        $data = $crud->insert_data('t_imunisasaun', $arrayData);
        $id = $_POST['id_pasiente'];

        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../detalho-kalender-".$id.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "id_pasiente='".$_POST['id_pasiente']."'",
            "id_doutor='".$_POST['id_doutor']."'",
            "data_imunizasaun='".$_POST['data_imunizasaun']."'",
            "id_tipo='".$_POST['id_tipo']."'",
            "data_durasaun='".$_POST['data_durasaun']."'",
            "doses='".$_POST['doses']."'",
            "komentario='".$_POST['komentario']."'",
            "id_periodo='".$_POST['id_periodo']."'"
        );

        $data = $crud->update_data('t_imunisasaun', $arrayData, 'id_imunisasaun', $id);
 $id = $_POST['id_pasiente'];
        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../detalho-kalender-".$id.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $pas = $_GET['id_pass'];
        $data = $crud->delete_data('t_imunisasaun', 'id_imunisasaun', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../detalho-kalender-".$pas.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
       
}

?>