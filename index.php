<?php
session_start();
require_once('config.inc.php');

if($_SESSION['active'] == false){
    //header("location:login.php");
	include('login.html')
    exit;
}


?>