<?php 
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php'
?>
<?php
$tot=0;
?>
<!doctype html>


	<!-- opções de pesquisa -->
	<div class="container-fluid">
	<br><br>
	<center><h3>Filtros do relatório</h3></center>
				<div class="icons_cad">
	<script>
function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('Panda');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
</script>
							
							<img src="../img/Crud/impressora.png" class="img_crud" onClick="cont()" style="cursor: pointer;" title="Imprimir relatório">
							<!-- fim botões de crud -->
						</div>
		<form method="post">
			<div class="form-row">
				
				
			</div>
		</form>	
		<div class="row">
			<div class="col-md-12" id="print">
			
				<table class="table table-striped table2excel" data-tableName="Test Table 1">
				
				<center><h3>Lista Geral de Vendas</h3></center>
					<tr>
						<th><b>Código</b></th>
						<th><b>Produto</b></th>
						<th><b>Quantidade</b></th>
						<th><b>Valor total</b></th>
						<th><b>Cliente</b></th>
						<th><b>Opções</b></th>
					</tr>
					<?php
					//conectando ao banco de dados
					include "../conexao/conexao_mysqli.php";

					$sql = "SELECT * FROM `carrinho` ORDER BY id_carrinho DESC";
					$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result)>0){
							while($rows_recibo = mysqli_fetch_assoc($result)){
								?>
							
					<tr>
						<td><?php echo $rows_recibo['id_carrinho']; ?></td>
						<td><?php echo $rows_recibo['produto']; ?></td>
						<td><?php echo $rows_recibo['quantidade']; ?></td>
						<td><?php echo "R$".$rows_recibo['valor_total']; ?></td>
						<td><?php echo $rows_recibo['nome']; ?></td>
						<td><form method="post">
						<select class="form-control">
							<option value="<?php echo $rows_recibo['status']; ?>"><?php echo $rows_recibo['status']; ?></option>
							<option value="aguardando">Aguardando</option>
							<option value="Pago">Pago</option>
						</select>
						
						<?php echo "
											<a  href='editar_relatorio.php?id=" .$rows_recibo['id_carrinho']. "'><input type='button' class='btn btn-primary' value='Editar'></a>
							";
					?>
						</form>
						</td>
					</tr>
						<?php
							}
						}	
					?>
				</table>
				<button class="btn btn-success exportToExcel">Exportar para Excel</button>
		<script>
			$(function() {
				$(".exportToExcel").click(function(e){
					var table = $(this).prev('.table2excel');
					if(table && table.length){
						var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
						$(table).table2excel({
							exclude: ".noExl",
							name: "Excel Document Name",
							filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
							fileext: ".xls",
							exclude_img: true,
							exclude_links: true,
							exclude_inputs: true,
							preserveColors: preserveColors
						});
					}
				});
				
			});
		</script>
  </script>
			</div>
		</div>
	</div>
   <!-- fim das opções de pesquisa-->
	
	
</body>
</html>
