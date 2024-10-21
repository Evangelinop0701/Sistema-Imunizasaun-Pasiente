<?php

error_reporting(0);
session_start();

include 'back_end/class/class.php';

$db = new database();
$user = new user();


$username = substr($_POST['username'], 0, 2);
if ($username <> 20) {
    // addslashes --> nia funsaun atu fo seguransa atu nune'e atu nune'e ema labele login tama arbiru ba sistema
    $login = $user->chek_login(addslashes($_POST['username']), $_POST['password']);
    if ($login) {
        echo "<script>   
            alert('Login ho sucessu..!!');
            document.location='back_end/home.html';</script>";
    } else {
        echo "<script>   
            alert('Sorry, Username ou password Lalos!!');
            document.location='login.html';</script>";

    }
}
