<?php

error_reporting(0);
include "../../class/class.php";
$db = new database();
$crud = new CRUD();

switch ($_GET['act']) {
    case 'input':
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $wite_list = ['jpg','jpeg','png'];
        $extensi = explode('.', $name_file);
        $extensi = strtolower(end($extensi));

        if (!empty($lokasi_file)) {
            if (!in_array($extensi, $wite_list)) {
                move_uploaded_file($lokasi_file, '../../foto_info/' . $name_file_unik);
                $name_file_unik = $_POST['titulu_informasaun '] . '-' . $nama_file;
            }
            $arrayData = array(
                'titulu_informasaun' => $_POST['titulu_informasaun'],
                'data_puvlica' => $_POST['data_puvlica'],
                'conten' => $_POST['conten'],
                'refersensia' => $_POST['refersensia'],
                'foto' => $name_file_unik
            );
            $data = $crud->insert_data('t_informsasaun', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../info-control.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $foto = " ";

            $arrayData = array(
                        'titulu_informasaun' => $_POST['titulu_informasaun'],
                        'data_puvlica' => $_POST['data_puvlica'],
                        'conten' => $_POST['conten'],
                        'refersensia' => $_POST['refersensia'],
                        'foto' => $foto
                       );
            $data = $crud->insert_data('t_informsasaun', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../info-control.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }

        }
        break;
    case 'update':
        $id = $_GET['id'];

        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];


        $wite_list = ['jpg','jpeg','png'];
        $extensi = explode('.', $name_file);
        $extensi = strtolower(end($extensi));


        $foto = $_POST['foto'];

        if (empty($lokasi_file)) {
            $arrayData = array(
                 "titulu_informasaun='" . $_POST['titulu_informasaun'] . "'",
                 "data_puvlica='" . $_POST['data_puvlica'] . "'",
                 "conten='" . $_POST['conten'] . "'",
                 "refersensia='" . $_POST['refersensia'] . "'",
                 "foto='" . $foto . "'"


            );
            $data = $crud->update_data('t_informsasaun', $arrayData, 'id_informasaun ', $id);

            if($data) {
                echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                echo "<script>window.location='../../info-control.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $del = $_POST['foto'];
            if (!empty($del)) {
                unlink("../../foto_info/$del");
                if (!in_array($extensi, $wite_list)) {
                    $name_file_unik = $_POST['titulu_informasaun'] . '-' . $nama_file;
                    move_uploaded_file($lokasi_file, '../../foto_info/' . $name_file_unik);

                }


                $arrayData = array(
                                "titulu_informasaun='" . $_POST['titulu_informasaun'] . "'",
                                "data_puvlica='" . $_POST['data_puvlica'] . "'",
                                "conten='" . $_POST['conten'] . "'",
                                "refersensia='" . $_POST['refersensia'] . "'",
                                "foto='" . $name_file_unik . "'"
                           );

                $data = $crud->update_data('t_informsasaun', $arrayData, 'id_informasaun ', $id);

                if($data) {
                    echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                    echo "<script>window.location='../../info-control.html'</script>";
                } else {
                    echo "<script>alert('ERROR!')</script>";
                }


            }
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        $file = $_GET['foto'];
        unlink('../../foto_info/' . $file);
        $data = $crud->delete_data('t_informsasaun ', 'id_informasaun', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../info-control.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: chefe-familia.html');
        }
        break;

}
