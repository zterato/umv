<?php

//conectando ao banco de dados
include "conexao/conexao_mysqli.php";

$id_produto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$sql = "SELECT * FROM `produto` WHERE id_produto='$id_produto'";
$result = mysqli_query($conn, $sql);

?>