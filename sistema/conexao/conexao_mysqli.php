<?php
//conexão mysqli
$host="localhost";
$log="u776878653_umv";
$pass="Tera0606";
$database="u776878653_umv";

$conn = mysqli_connect($host, $log, $pass, $database) or die(mysqli_errno());
mysqli_set_charset($conn,"utf8");	
?>