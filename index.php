<?php
session_start();
require_once('config.inc.php');

//process logins
if(isset($_POST['username']) && isset($_POST['password'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    foreach ($login['native'] as $v){
        if ( $v['user'] == $username && $v['password'] == $password ){
            $_SESSION['active'] = true;
            $_SESSION['method'] = 'native';
            $_SESSION['user'] = $username;
        }
    }
}



if(!isset($_SESSION['active']) || $_SESSION['active'] == false){
	include('login.php');
    exit;
}
else{
	include('protected.php');
}


?>