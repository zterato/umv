<?php
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
	<!-- opções de cliente -->
	<div class="container">
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
				<?php 
							
		                    include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
								$cod_fornecedor = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
                                $sql ="SELECT * FROM fornecedor WHERE id_fornecedor = ?";
	                            $stmt = $pdo->prepare($sql);
								$stmt->bindParam(1, $cod_fornecedor);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value1){
								
			              ?>
			        <div class="container-fluid" id="print">
<center><h1>Ficha de Fornecedor</h1></center><br>
				    <table class="table table-striped">
				    	<tr>
				    		<td><b>Código:</b></td>
				    		<td><b>Nome:</b></td>
				    	</tr>
				    	<tr>
				    		<td><?php echo $cod_fornecedor; ?></td>
				    		<td><?php echo $value1['nome']; ?></td>
				    	</tr>
				    	<tr>
				    		<td><b>Endereço</b></td>
				    		<td><b>Bairro</b></td>
				    		<td><b>Cidade</b></td>
				    		<td><b>Estado</b></td>
				    	</tr>
				    	<tr>
				    		<td><?php echo $value1['endereco']; ?></td>
				    		<td><?php echo $value1['bairro']; ?></td>
				    		<td><?php echo $value1['cidade']; ?></td>
				    		<td><?php echo $value1['uf']; ?></td>
				    	</tr>
				    	<tr>
				    		<td><b>CEP</b></td>
				    		<td><b>CPF</b></td>
				    	</tr>
				    	<tr>
				    		<td><?php echo $value1['cep']; ?> </td>
				    		<td><?php echo $value1['cpf']; ?></td>
				    	</tr>
				    	<tr>
				    		<td><b>Telefone</b></td>
				    		<td><b>Contato</b></td>
				    		<td><b>Email</b></td>
				    		<td><b>Observações</b></td>
				    	</tr>
				    	<tr>
				    		<td><?php echo $value1['telefone']; ?></td>
				    		<td><?php echo $value1['telefone2']; ?></td>
				    		<td><?php echo $value1['email']; ?></td>
				    		<td><?php echo $value1['obs']; ?></td>
				    	</tr>
				    </table>
					</div>  
				        <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
					   <!-- fim da quinta linha do form -->
		
					
				</div>
   <!-- fim das opções de cliente -->