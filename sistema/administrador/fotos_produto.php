<?php 
include '../controle/auth.php';
?>
<?php
	
$id_produto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
	//Incluindo a conexão com banco de dados
include_once("../conexao/conexao_mysqli.php");
	
	
	//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
//Selecionar todos os cursos da tabela
$result_pd = "SELECT * FROM `img_produto` WHERE id_produto='$id_produto'";
$resultado_pd = mysqli_query($conn, $result_pd);

//Contar o total de cursos
$total_pd = mysqli_num_rows($resultado_pd);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 5;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_pd/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_pd = "SELECT * FROM `img_produto` WHERE id_produto='$id_produto' LIMIT $incio, $quantidade_pg ";
$resultado_pd = mysqli_query($conn, $result_pd);
$total_pd = mysqli_num_rows($resultado_pd);
	
?>
<?php 
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
	<!-- opções de cliente -->
	<div class="container-fluid">
					<div class="row" style="margin-top: 5%;">
						<div class="icons_cad">
							<!-- botões de Crud -->
							<a href="cad_img.php?id=<?php echo $id_produto; ?>"><img src="../img/Crud/adicionar.png" class="img_crud"  title="Adicionar"></a>
					
							<!-- fim botões de crud -->
						</div>
						<div class="form_cad">
							<!-- formulario de filtro -->
							<form method="post">
								<div class="form-row">
								
								</div>
								
								
								
							</form>
							<!-- fim do formulario de filtro -->
						</div>
					</div>
					<br>
					<table class="table table-striped">
					  <thead>
   						 <tr>
     						 <th scope="col">Id produto</th>
     						 <th scope="col">Imagem</th>
     						 <th scope="col">Data do cadastro</th>
      						 <th scope="col">Opções</th>
    					 </tr>
						</thead>
					  <tbody>
												
						<!-- fim da area de pesquisa -->
						<?php while($rows_cliente = mysqli_fetch_assoc($resultado_pd)){ ?>
						<tr>
							<td><h4><?php echo $rows_cliente['id_produto']; ?></h4></td>
							<td><img src="foto/<?php echo $rows_cliente['nome']; ?>" class="img_crud"></td>
							<td><?php echo $rows_cliente['data']; ?></td>
							<td>
								<?php echo "
								<a onclick='apagar_cliente();' href='excluir_img.php?id=" . $rows_cliente['id_produto'] . "'><img src='../img/Crud/excluir.png' class='img_crud'></a>
								";
							    ?>
							</td>
						</tr>
						<?php } ?>	
						</tbody>
					</table>
					<?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			<div class="row">
			<div class="col-md-10">
			<nav class="pagination">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item">
						<?php
						if($pagina_anterior != 0){ ?>
							<a class="list-group-item" href="produto.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a class="list-group-item" href="produto.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li class="list-group-item">
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a class="list-group-item" href="produto.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&raquo;</span>
					<?php }  ?>
					</li>
				</ul>
			</nav>
			</div>
			</div>
				</div>
				<div class="container-flud">
        
    </div>
   <!-- fim das opções de cliente -->
	

