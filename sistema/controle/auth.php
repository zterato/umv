<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if(!isset($_SESSION["login"]) || !isset($_SESSION["senha"])){
	header("Location: ../index.php");
	exit;
}else{
}
?>