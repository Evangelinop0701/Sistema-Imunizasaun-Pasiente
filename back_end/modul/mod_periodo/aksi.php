<?php 
error_reporting();

include "../../class/class.php";

$db = new database();
$crud = new CRUD();
$periodo = new periodo();
switch ($_GET['act']) {

    case 'update_status':
        $id = $_GET['id'];
       $periodo->update_status($id);
       header('location: ../../periodo.html');
        break;
    
   case 'input':

        $arrayData = array(
            'periodo' => $_POST['periodo']
           
           
    );

        $data = $crud->insert_data('t_periodo', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../periodo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;
        case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_periodo', 'id_periodo', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../periodo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 

}

?>