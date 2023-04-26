<?php 
include '../controle/auth.php';
?>
<?php
	
	//Incluindo a conexão com banco de dados
include_once("../conexao/conexao_mysqli.php");
	
	
	//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
//Selecionar todos os cursos da tabela
$result_pd = "SELECT * FROM `cliente`";
$resultado_pd = mysqli_query($conn, $result_pd);

//Contar o total de cursos
$total_pd = mysqli_num_rows($resultado_pd);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 22;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_pd/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_pd = "SELECT * FROM `cliente` order by nome asc LIMIT $incio, $quantidade_pg ";
$resultado_pd = mysqli_query($conn, $result_pd);
$total_pd = mysqli_num_rows($resultado_pd);
	
?>
<?php 
include '../layout/cabecalho.php';
include '../layout/menuadm.php'
?>
	<!-- opções de cliente -->
	<div class="container-fluid">
					<div class="row" style="margin-top: 5%;">
						<div class="icons_cad">
							<!-- botões de Crud -->
							<a href="cad_cliente.php"><img src="../img/Crud/adicionar.png" class="img_crud"  title="Adicionar"></a>
					
							<a href="print_cliente.php"><img src="../img/Crud/impressora.png" class="img_crud" title="Imprimir"></a>
							<!-- fim botões de crud -->
						</div>
						<div class="form_cad">
							<!-- formulario de filtro -->
							<form method="post">
								<div class="form-row">
									<div class="form-group col-md-6">
										<input type="text" name="info" class="form-control" placeholder="Informação a ser pesquisada!" list="pesquisa">
								<datalist id="pesquisa">
								<?php
									include_once("../conexao/conexao_mysqli.php");
							
									$sql = "SELECT * FROM `cliente`;";
									$result=mysqli_query($conn, $sql);
									if(mysqli_num_rows($result)>0){
										while($rows_list = mysqli_fetch_assoc($result)){
								?>
									<option value="<?php echo $rows_list['NOME']; ?>"><?php echo $rows_list['NOME']; ?></option>
								<?php	
										}
									}
				
								?>
								</datalist>
									</div>
									<div class="form-group col-md-2">
										<input type="submit" value="Pesquisar" class="btn btn-primary">
									</div>
								</div>
								
								
								
							</form>
							<!-- fim do formulario de filtro -->
						</div>
					</div>
					<br>
					<table class="table table-striped">
					  <thead>
   						 <tr>
     						 <th scope="col">Id Cliente</th>
     						 <th scope="col">Nome</th>
     						 <th scope="col">Telefone</th>
      						 <th scope="col">CPF</th>
      						 <th scope="col">Opções</th>
    					 </tr>
						</thead>
					  <tbody>
						<!-- adicionando a area de pesquisa -->
						<?php 
						if(isset($_POST['info'])){
							$pesquisa = $_POST['info'];
							$soNumeros = preg_replace("/[^0-9]/","", $pesquisa);
							include_once("../conexao/conexao_mysqli.php");
							
							$sql = "SELECT * FROM `cliente` WHERE NOME='$pesquisa';";
							$result=mysqli_query($conn, $sql);
							if(mysqli_num_rows($result)>0){
								while($rows_pesq = mysqli_fetch_assoc($result)){
						?>
						<tr>
							<td><h4><?php echo $rows_pesq['ID']; ?></h4></td>
							<td><?php echo $rows_pesq['NOME']; ?></td>
							<td><?php echo $rows_pesq['FONEFAX']; ?></td>
							<td><?php echo $rows_pesq['CPFCNPJ']; ?></td>
							<td>
								<?php echo "
								<a  href='editar_cliente.php?id=" . $rows_pesq['ID'] . "'><img src='../img/Crud/editar.png' class='img_crud'></a>
								<a onclick='apagar_cliente();' href='/excluir_cliente.php?id=" . $rows_pesq['ID'] . "'><img src='../img/Crud/excluir.png' class='img_crud'></a>
								<a  href='imprimir_cliente.php?id=" . $rows_pesq['ID'] . "'><img src='../img/Crud/impressora.png' class='img_crud'></a>
								";
							    ?>
							</td>
						</tr>
						<?php	
								}
							}
						}
						?>
						
						<!-- fim da area de pesquisa -->
						<?php while($rows_cliente = mysqli_fetch_assoc($resultado_pd)){ ?>
						<tr>
							<td><h4><?php echo $rows_cliente['ID']; ?></h4></td>
							<td><?php echo $rows_cliente['NOME']; ?></td>
							<td><?php echo $rows_cliente['FONEFAX']; ?></td>
							<td><?php echo $rows_cliente['CPFCNPJ']; ?></td>
							<td>
								<?php echo "
								<a  href='editar_cliente.php?id=" . $rows_cliente['ID'] . "'><img src='../img/Crud/editar.png' class='img_crud'></a>
								<a onclick='apagar_cliente();' href='excluir_cliente.php?id=" . $rows_cliente['ID'] . "'><img src='../img/Crud/excluir.png' class='img_crud'></a>
								<a  href='imprimir_cliente.php?id=" . $rows_cliente['ID'] . "'><img src='../img/Crud/impressora.png' class='img_crud'></a>
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
							<a class="list-group-item" href="cliente.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a class="list-group-item" href="cliente.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li class="list-group-item">
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a class="list-group-item" href="cliente.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
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
	

