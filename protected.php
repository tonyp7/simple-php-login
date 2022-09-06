<?php
session_start();
require_once('config.inc.php');

if($_SESSION['active'] == false){
	header('location:index.php');
	exit;
}

?>
<h1>Welcome to protected space</h1>
