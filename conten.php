<?php 

error_reporting(0);

if (!isset($_GET['page'])) {
    include "baranda.php";
}elseif ($_GET['page'] == "estatistika") {
    include "statistika.php";
}elseif ($_GET['page'] == "baranda") {
    include "baranda.php";
}elseif ($_GET['page'] == "informasaun") {
    include "mod_info/informasaun.php";
}elseif ($_GET['page'] == "dados") {
    include "mod_dados/dados.php";
}

?>