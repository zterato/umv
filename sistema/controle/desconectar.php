<?php
session_start();
$_SESSION['erroulogin'] = "Deslogado";
session_destroy();
header("Location: ../index.php");

?>