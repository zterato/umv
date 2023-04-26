<?php

//conectando ao banco de dados
include "conexao/conexao_mysqli.php";
    $classe_p = filter_input(INPUT_GET, 'classe', FILTER_SANITIZE_STRING);
	//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

    //Selecionar todos os cursos da tabela
    //Selecionar todos os cursos da tabela
    $result_pd = "SELECT * FROM `produto` WHERE categoria='$classe_p'";
    $resultado_pd = mysqli_query($conn, $result_pd);
    
    //Contar o total de cursos
    $total_pd = mysqli_num_rows($resultado_pd);
    
    //Seta a quantidade de cursos por pagina
    $quantidade_pg = 12;
    
    //calcular o número de pagina necessárias para apresentar os cursos
    $num_pagina = ceil($total_pd/$quantidade_pg);
    
    //Calcular o inicio da visualizacao
    $incio = ($quantidade_pg*$pagina)-$quantidade_pg;
    
    //Selecionar os cursos a serem apresentado na página
    $result_pd = "SELECT * FROM `produto` WHERE categoria='$classe_p' order by id_produto asc LIMIT $incio, $quantidade_pg ";
    $resultado_pd = mysqli_query($conn, $result_pd);
    $total_pd = mysqli_num_rows($resultado_pd);
?>