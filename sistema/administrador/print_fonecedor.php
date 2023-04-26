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
$result_pd = "SELECT * FROM `fornecedor`";
$resultado_pd = mysqli_query($conn, $result_pd);

//Contar o total de cursos
$total_pd = mysqli_num_rows($resultado_pd);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 500;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_pd/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_pd = "SELECT * FROM `fornecedor` order by nome asc LIMIT $incio, $quantidade_pg ";
$resultado_pd = mysqli_query($conn, $result_pd);
$total_pd = mysqli_num_rows($resultado_pd);
	
?>


<?php include "../layout/cabecalho.php" ?>
	

	<!-- opções de cliente -->
	<div class="container-fluid">
					<br>
					<script>
function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('Panda');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
</script>
<center><button class="btn btn-dark" type="button" onClick="cont()"/>Imprimir Relatório</button><a href="cliente.php"><button class="btn btn-primary" type="button">Voltar</button></a></center><br><br>
				<div id="print">
					<table class="table table-striped">
						<tr>
							<td>Nome</td>
							<td>Telefone</td>
							<td>E-mail</td>
							<td>CPF</td>
						</tr>
						<?php while($rows_cliente = mysqli_fetch_assoc($resultado_pd)){ ?>
						<tr>
							<td><?php echo $rows_cliente['nome']; ?></td>
							<td><?php echo $rows_cliente['telefone']; ?></td>
							<td><?php echo $rows_cliente['email']; ?></td>
							<td><?php echo $rows_cliente['cpf']; ?></td>
						</tr>
						<?php } ?>	
					</table>
	</div>
				</div>

   <!-- fim das opções de cliente -->
	
	
</body>
</html>
