<?php
session_start();
require_once('config.inc.php');

if($_SESSION['active'] == false){
	include('login.html');
    exit;
}
else{
	include('protected.php');
}


?>