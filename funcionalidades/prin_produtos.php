<?php

//conectando ao banco de dados
include "conexao/conexao_mysqli.php";

$sql = "SELECT * FROM `produto` ORDER BY id_produto DESC LIMIT 8";
$result = mysqli_query($conn, $sql);

?>