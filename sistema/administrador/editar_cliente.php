<?php
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
<div class="container">
				<?php 
							
		                    include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
								$cod_cliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
                                $sql ="SELECT * FROM cliente WHERE ID = ?";
	                            $stmt = $pdo->prepare($sql);
								$stmt->bindParam(1, $cod_cliente);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value1){
								
			              ?>
					<form  method="post">
									    <!-- primeira linha do form -->
					    <center><h3>Editar Cliente</h3></center><br>
					    <font style="color: red">* Campos Obrigatórios</font>
						<div class="form-row">
						     	<div class="form-group col-md-4">
						     	<br>
									<input type="text" name="id_cl" class="form-control" value="<?php echo $cod_cliente; ?>">
								</div>
							<div class="form-group col-md-8">
								<font style="color: red">*</font><input type="text" class="form-control" name="nome" placeholder="Nome Completo:" value="<?php echo $value1['NOME']; ?>">
							</div>
							
						</div>
						<!-- fim da primeira linha do form -->
						<!-- Segunda Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-8">
								<input type="text" class="form-control" name="end" placeholder="Endereço:" value="<?php echo $value1['RUANUMERO']; ?>">
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="apelido" placeholder="Nome Fantasia / Apelido:" value="<?php echo $value1['APELIDO']; ?>"> 
							</div>
						</div>
					   <!-- fim da segunda linha do form -->
					   	<!-- Terceira Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="bairro" placeholder="Bairro:" value="<?php echo $value1['BAIRRO']; ?>">
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="cidade" placeholder="Cidade:" value="<?php echo $value1['CIDADE']; ?>"> 
							</div>
							<div class="form-group col-md-2">
								<input type="text" class="form-control" name="uf" placeholder="UF:" value="<?php echo $value1['ESTADO']; ?>"> 
							</div>
							<div class="form-group col-md-2">
								<input type="text" class="form-control" name="cep" placeholder="CEP:" value="<?php echo $value1['CEP']; ?>"> 
							</div>
						</div>
					   <!-- fim da terceira linha do form -->
					   <!-- quarta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
							    
								<font style="color: red">*</font><b>CPF</b><input type="text" id="cpf" class="form-control" name="cpf" placeholder="CPF:" value="<?php echo $value1['CPFCNPJ']; ?>">
							</div>
							<div class="form-group col-md-4">
							    
								<b>RG</b><input type="text" class="form-control" name="id" id="rg" placeholder="RG:" value="<?php echo $value1['RG']; ?>"> 
							</div>
							<div class="form-group col-md-4">
								<font style="color: red">*</font><b>Telefone</b><input type="text" id="tel1" class="form-control" name="telefone" placeholder="Telefone:" value="<?php echo $value1['FONEFAX']; ?>"> 
							</div>
						</div>
					   <!-- fim da quarta linha do form -->
					   <!-- quinta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="contato" id="tel2" placeholder="Telefone C/c:" value="<?php echo $value1['TELC']; ?>">
							</div>
							<div class="form-group col-md-8">
								<input type="text" class="form-control" name="email" placeholder="E-mail:" value="<?php echo $value1['EMAIL']; ?>"> 
							</div>
						</div>
				        <div class="form-row">
				           		<div class="form-group col-md-12">
				        	    Observações
				        		<textarea name="obs" class="form-control-file">
				        		    <?php echo $value1['OBS']; ?>
				        		</textarea>
				        	</div>
				        </div>
				        <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
					   <!-- fim da quinta linha do form -->
					   <!-- sexta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="submit" class="btn btn-primary" value="Editar">
							</div>
							<div class="form-group col-md-4">
							    	<?php echo "
								<a  href='imprimir_cliente.php?id=" . $cod_cliente . "'><img src='../img/Crud/impressora.png' class='img_crud'></a>
								";
							    ?>
							</div>
							
						</div>
					   <!-- fim da sexta linha do form -->
					</form>
					<?php
						if(isset($_POST['nome'])){
							$id_c = $_POST['id_cl'];
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
							$contato=$_POST['contato'];
							$telefone=$_POST['telefone'];
							$obs=$_POST['obs'];
							if(empty($nome) and empty($cpf) and empty($telefone)){
								echo "<script>alert('Preencha os campos obrigatorios! (nome, cpf ou cnpj e telefone)');</script>";
							}else{
							include("../conexao/conexao.php");
							try{
								$pdo = new PDO($host,$log,$pass);
								$sql="UPDATE `cliente` SET `NOME`=?,`FONEFAX`=?,`EMAIL`=?,`CPFCNPJ`=?,`RG`=?,`RUANUMERO`=?,`BAIRRO`=?,`CIDADE`=?,`ESTADO`=?,`APELIDO`=?,`CEP`=?,`TELC`=?, `OBS`=? WHERE `ID`=?;";
					 			//setando parametros de conexão e cadastro
	                 			$stmt= $pdo->prepare($sql);
					 			$stmt->bindParam(1,$nome);
					 			$stmt->bindParam(2,$telefone);
					 			$stmt->bindParam(3,$email);
								$stmt->bindParam(4,$cpf);
					 			$stmt->bindParam(5,$id);
					 			$stmt->bindParam(6,$ende);
								$stmt->bindParam(7,$bairro);
					 			$stmt->bindParam(8,$cidade);
					 			$stmt->bindParam(9,$uf);
								$stmt->bindParam(10,$apelido);
					 			$stmt->bindParam(11,$cep);
					 			$stmt->bindParam(12,$contato);
								$stmt->bindParam(13,$obs);
								$stmt->bindParam(14,$id_c);
					
		                       if($stmt->execute()){
						           ?>
						           <?php echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador'>
												<script type=\"text/javascript\">
													alert(\"Informações Editadas com Sucesso.\");
												</script>
											  ";	
									?>
						           
						           <?php
					           }else{
						           ?>
						           <?php echo "<script>alert('Erro ao Editar!');</script>"; ?>
						           <?php
					           }
					            }catch(PDOException $ex){
			                       //mens de erro
	                                echo 'Erro: '.$ex->getMessage();
                                }
					          
						}
							}
						
					?>
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
					
				</div>