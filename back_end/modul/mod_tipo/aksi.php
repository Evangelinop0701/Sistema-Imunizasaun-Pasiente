<?php 
error_reporting(0);
include "../../class/class.php";

$db = new database();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
    case 'input':

        $arrayData = array(
            'naran_tipo' => $_POST['naran_tipo'],
            'deskrisaun' => $_POST['deskrisaun']
           
    );

        $data = $crud->insert_data('t_tipu', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../dados-tipo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "naran_tipo='".$_POST['naran_tipo']."'",
            "deskrisaun='".$_POST['deskrisaun']."'"
        );

        $data = $crud->update_data('t_tipu', $arrayData, 'id_tipo', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../dados-tipo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_tipu', 'id_tipo', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../dados-tipo.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
            

            case 'import':
             $filename=$_FILES["file"]["tmp_name"];
             $file_name = $_FILES['file']['name'];
             $size = $_FILES["file"]["size"];
             $file_extension = explode('.', $file_name);
             $file_extension = strtolower(end($file_extension));
        
         if ($file_extension == "csv") {

                $file = fopen($filename, "r");
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                    if (empty($emapData[1])) {
                        echo "<script>alert('Empty data..!')</script>";
                        echo "<script>window.location='../../dados-tipo.html'</script>";
                    }else {
                        
                    $arrayData = array(
                        'naran_tipo' =>$emapData[1],
                        'deskrisaun' =>$emapData[2]
                    );

                    $data = $crud->insert_data('t_tipu',$arrayData);
                     if($data) {
                        echo "<script>alert('Dados Importe sucesfuly')</script>";
                        echo "<script>window.location='../../dados-tipo.html'</script>";
                    } else {
                        echo "<script>alert('ERROR!')</script>";
                    }
            }
        }
            
         }else {
             echo "<script>alert('File extension is not .csv but this file is extension .".$file_extension."')</script>";
             echo "<script>window.location='../../dados-tipo.html'</script>";
         }


     break;
       
}

?>