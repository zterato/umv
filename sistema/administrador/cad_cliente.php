<?php
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
<div class="container">
					<form  method="post" >
					    <!-- primeira linha do form --><br><br>
					    <center><h3>Cadastro de Clientes</h3></center><br>
					    <font style="color: red">* Campos Obrigatórios</font>
						<div class="form-row">
							<div class="form-group col-md-8">
								<font style="color: red">*</font><input type="text" class="form-control" name="nome" placeholder="Nome Completo:">
							</div>
							<div class="form-group col-md-4">
							<br>
								<input type="text" class="form-control" name="apelido" placeholder="Nome Fantasia / Apelido:"> 
							</div>
						</div>
						<!-- fim da primeira linha do form -->
						<!-- Segunda Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-12">
								<input type="text" class="form-control" name="end" placeholder="Endereço:">
							</div>
	
						</div>
					   <!-- fim da segunda linha do form -->
					   	<!-- Terceira Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="bairro" placeholder="Bairro:">
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="cidade" placeholder="Cidade:"> 
							</div>
							<div class="form-group col-md-2">
								<input type="text" class="form-control" name="uf" placeholder="UF:"> 
							</div>
							<div class="form-group col-md-2">
								<input type="text" class="form-control" name="cep" placeholder="CEP:"> 
							</div>
						</div>
					   <!-- fim da terceira linha do form -->
			 <!-- quarta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">

								<font style="color: red">*</font><b>CPF ou CNPJ</b><input type="text" id="cpf" class="form-control" name="cpf" placeholder="CPF:">
							</div>
							<div class="form-group col-md-4">
							    <b>RG: (opicional)</b>
								<input type="text" class="form-control" name="id" placeholder="RG:" id="rg"> 
							</div>
							<div class="form-group col-md-4">
							    
								<font style="color: red">*</font><b>Telefone:</b><input type="text" id="tel1" class="form-control" name="telefone" placeholder="Telefone:"> 
							</div>
						</div>
					   <!-- fim da quarta linha do form -->
					   <!-- quinta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="contato" placeholder="Telefone C/c:" id="tel2">
							</div>
							<div class="form-group col-md-8">
								<input type="text" class="form-control" name="email" placeholder="E-mail:"> 
							</div>
						</div>
				        <div class="form-row">
				        	<div class="form-group col-md-12">
				        	    Observações
				        		<textarea name="obs" class="form-control-file" placeholder="Observações"></textarea>
				        	</div>
				        </div>
					   <!-- fim da quinta linha do form -->
					   <!-- sexta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="submit" class="btn btn-primary" value="Cadastrar">
							</div>
							<div class="form-group col-md-4">
								<a href="cliente.php"><input type="button" class="btn btn-danger" value="Voltar"></a>
							</div>
							
						</div>
					   <!-- fim da sexta linha do form -->
					</form>
					 <script>
						 $('#cpf').mask('000.000.000-00');
						 $('#cnpj').mask('00.000.000/0000-00');
						 $('#rg').mask('00.000.000-0');
						 $('#cep').mask('00000-000');
						 $('#data').mask('00/00/0000');
					  	 $('#cpf1').mask('000.000.000-00');
						 $('#cnpj1').mask('00.000.000/0000-00');
						 $('#rg1').mask('00.000.000-0');
						 $('#cep1').mask('00000-000');
						 $('#data1').mask('00/00/0000');
						 $('#tel1').mask('00 00000-0000');
						 $('#tel2').mask('Contato: 00 00000-0000');
					     $('#tel3').mask('00 00000-0000');
						 $('#dia2').mask('00');
						 $('#ano2').mask('0000');
						 $('#dia3').mask('00');
						 $('#ano3').mask('0000');
						 $('#dia4').mask('00');
						 $('#ano4').mask('0000');
						 $('#dia5').mask('00');
						 $('#ano5').mask('0000');
						 $('#dia6').mask('00');
						 $('#ano6').mask('0000');
					
						 $('.placaCarro').mask('AAA-0000');
						 $('.horasMinutos').mask('00:00');
						 $('.cartaoCredito').mask('0000 0000 0000 0000');
					</script>
					
					<?php
						if(isset($_POST['nome'])){
							$nome=$_POST['nome'];
							$email=$_POST['email'];
							$ende=$_POST['end'];
							$apelido=$_POST['apelido'];
							$bairro=$_POST['bairro'];
							$cidade=$_POST['cidade'];
							$uf=$_POST['uf'];
							$cep=$_POST['cep'];
							$cpf=$_POST['cpf'];
							$id=$_POST['id'];
							$contato=$_POST['telefone'];
							$telefone=$_POST['contato'];
							$obs=$_POST['obs'];
							if(empty($nome) and empty($cpf) and empty($telefone)){
								echo "<script>alert('Preencha os campos obrigatorios! (nome, cpf ou cnpj e telefone)');</script>";
							}else{
							include("../conexao/conexao.php");
							try{
								$pdo = new PDO($host,$log,$pass);
								$sql="INSERT INTO `cliente`(`NOME`, `RUANUMERO`, `APELIDO`, `BAIRRO`, `CIDADE`, `ESTADO`, `CEP`, `CPFCNPJ`, `RG`, `FONEFAX`, `TELC`, `EMAIL`, `OBS`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
					 			//setando parametros de conexão e cadastro
	                 			$stmt= $pdo->prepare($sql);
					 			$stmt->bindParam(1,$nome);
					 			$stmt->bindParam(2,$ende);
					 			$stmt->bindParam(3,$apelido);
								$stmt->bindParam(4,$bairro);
					 			$stmt->bindParam(5,$cidade);
					 			$stmt->bindParam(6,$uf);
								$stmt->bindParam(7,$cep);
					 			$stmt->bindParam(8,$cpf);
					 			$stmt->bindParam(9,$id);
								$stmt->bindParam(10,$telefone);
					 			$stmt->bindParam(11,$contato);
					 			$stmt->bindParam(12,$email);
								$stmt->bindParam(13,$obs);
					
		                       if($stmt->execute()){
						           ?>
						           <?php echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/cliente.php'>
												<script type=\"text/javascript\">
													alert(\"Informações Cadastradas com Sucesso.\");
												</script>
											  ";	
									 ?>
						           <?php
					           }else{
						           ?>
						           <?php echo "<script>alert('Erro ao Cadastrar!');</script>"; ?>
						           <?php
					           }
					            }catch(PDOException $ex){
			                       //mens de erro
	                                echo 'Erro: '.$ex->getMessage();
                                }
					          
						}
							}
						else{
							echo "Preencha o campo nome!";
						}
					?>
					
				</div>