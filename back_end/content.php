<?php

error_reporting(0);

if (!isset($_GET['module'])) {
    include "home.php";
} elseif ($_GET['module'] == "home") {
    include "home.php";
} elseif ($_GET['module'] == "pasiente") {
    include "modul/mod_labarik/dados_pasiente.php";
} elseif ($_GET['module'] == "doutor") {
    include "modul/mod_doutor/dados_doutor.php";
} elseif ($_GET['module'] == "tipo") {
    include "modul/mod_tipo/dados_tipo.php";
} elseif ($_GET['module'] == "user") {
    include "modul/mod_user/user.php";
} elseif ($_GET['module'] == "imunisasaun") {
    include "modul/mod_vasina/imo.php";
} elseif ($_GET['module'] == "doses") {
    include "modul/mod_polio/doses.php";
} elseif ($_GET['module'] == "info") {
    include "modul/mod_info/info.php";
} elseif ($_GET['module'] == "control") {
    include "modul/mod_control/control.php";
} elseif ($_GET['module'] == "aldeia") {
    include "modul/mod_aldeia/aldeia.php";
} elseif ($_GET['module'] == "periodo") {
    include "modul/mod_periodo/periodo.php";
}
