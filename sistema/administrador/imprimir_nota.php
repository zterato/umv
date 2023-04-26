<?php 
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../conexao/conexao.php';
?>
<!-- iniciando bloco cabeçalho e menu de controle-->

<!-- fim do bloco cabeçalho e menu de controle -->
<?php
//recebendo data e hora
date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d h:i:sa");
$time = date("h:i:sa");

?>
<script>
function cont(){
   var conteudo = document.getElementById('print').innerHTML;
   tela_impressao = window.open('Panda');
   tela_impressao.document.write(conteudo);
   tela_impressao.window.print();
   tela_impressao.window.close();
}
</script><br>
<center><button class="btn btn-dark" type="button" onClick="cont()"/>Imprimir Cupom</button>
<a href="relatorio.php"><button class="btn btn-danger">Fechar</button></a>
</center><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12 cadproduto" style="border=1px solid black;" id="print">
				<center><h4>MakeUP10 RIO DE JANEIRO</h4>
				Rua Paulo Lavoier, 51<br>
				MAGÉ - RIO DE JANEIRO - RJ<br>
				Telefones: 21 96584-1983<br>
		
				</center>
				<hr>
				
				<?php 
		                    try{
								$cod_nota = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT nota.id_nota, nota.nota, nota.forma_pg, nota.transporte, nota.v_tot, nota.data_hora, cliente.NOME, cliente.FONEFAX, cliente.CPFCNPJ, cliente.RUANUMERO, cliente.BAIRRO, cliente.CIDADE, cliente.ESTADO, cliente.CEP
								FROM nota
								INNER JOIN cliente
								ON nota.cliente = cliente.ID
								WHERE nota.id_nota =?;";
	                            $stmt = $pdo->prepare($sql);
								$stmt->bindParam(1,$cod_nota);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
								
			              ?>
				
			      
				<b>Recibo nº: <?php echo $value['id_nota']; ?></b><b>Data/Hora: </b><?php echo $value['data_hora']; ?><br>
					<b>Produtos: </b><br>
					<b>Produto -- Quant. -- Valor_uni. -- Valor total </b>
					<br><?php echo $value['nota']; ?><br>
					<b>Valor total R$ <?php echo $value['v_tot'].",00"; ?> (Reais)</b><br>
					<b>Forma de Pagamento: </b> <?php echo $value['forma_pg']; ?><br>
					<b>Valor Transporte: </b> <?php echo $value['transporte']; ?><br>
					<hr>
					<br>
					<b>Cliente: <?php echo $value['NOME']; ?></b><br>
					<b>CPF: </b><?php echo $value['CPFCNPJ']; ?><br>
					<b>Telefone: </b><?php echo $value['FONEFAX']; ?><br>
					<b>Endereço: </b><?php echo $value['RUANUMERO']; ?> - <b>CEP:</b><?php echo $value['CEP']; ?><br>
					<b>Bairro: </b><?php echo $value['BAIRRO']; ?> - <b>Cidade: </b><?php echo $value['CIDADE']; ?> - <b>Estado: </b><?php echo $value['ESTADO']; ?><br>
				
					   <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
		             

		       <center><h5>Rio de Janeiro - RJ</h5>
			       </center>
			       <br>
			       
			</div>
			<!-- separador de recibo -->
			<hr>
			<!-- fim do separador de recibo -->
			

		</div>
	</div>
	
</body>
</html>
