<?php 
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
<!-- iniciando bloco cabeçalho e menu de controle-->
<?php
$quantidade_atual = 0;
$cliente_id = 0;
$dentista_id = 0;
$tot =0;
?>
<!-- fim do bloco cabeçalho e menu de controle -->
<?php
//recebendo data e hora
date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d h:i:sa");
$time = date("h:i:sa");
?>
<script>
$(document).ready(function(){
  $("#transporte").blur(function(){
	var valortot = document.getElementById('v_tot').value;
	var valor_transporte = document.getElementById('transporte').value;
	valortot = parseFloat(valortot) + parseFloat(valor_transporte);
	document.getElementById('v_tot').value= valortot;
	  
    $(this).css("background-color", "black");
	  $(this).css("color:", "white");
  });
});
</script>
	<!-- opções de recibo-->
	<!-- inicio do Home-->
<section class="cadproduto">
	<div class="container" style="background-color: #C5C3C3">
		<div class="row">
			<div class="col-md-12">
				<center><h1>Sistema de Vendas MakeUp10</h1><br><br></center>
				<!-- adicionando produtos a venda -->
				<form method="post">
					<div class="form-row">
						<div class="form-group col-lg-10">
						    <h4><b>Produto:</b></h4>
							<input type="text" name="pd_pesq" id="pd_pesq" class="form-control" placeholder="Selecione o Produto:" list="novo">
							<datalist id="novo">
                         <!-- iniciando php de consulta da pesquisa -->
                         <?php 
							
		                    include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT * FROM produto";
	                            $stmt = $pdo->prepare($sql);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
								
			              ?>
								<option value="<?php echo $value['nome']; ?>"><?php echo $value['nome']; ?></option>
                          <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
                          <!-- fim da pesquisa no php -->
                        </datalist>
						</div>
						<div class="form-group col-lg-2">
							<h4><b>.</b></h4>
							<input type="submit"  class="btn btn-primary" value="Selecionar">
						</div>
						
					</div>
				</form>
				<?php 
						if(isset($_POST['pd_pesq'])){
							$pesquisa = $_POST['pd_pesq'];
							$soNumeros = preg_replace("/[^0-9]/","", $pesquisa);
							include_once("../conexao/conexao_mysqli.php");
							
							$sql = "SELECT * FROM `produto` WHERE nome='$pesquisa';";
							$result=mysqli_query($conn, $sql);
							if(mysqli_num_rows($result)>0){
								while($rows_pesq = mysqli_fetch_assoc($result)){
						?>
				<form method="post">
					
					<div class="form-row">
						<!-- id produto invisivel -->
							<input type="text" name="id_produto" id="id_produto" class="form-control" placeholder="Produto:" value="<?php echo $rows_pesq['id_produto']; ?>" style="display: none;">
						<!-- fim do id produto invisivel -->
						<div class="form-group col-lg-6">
							<input type="text" name="pd" id="pd" class="form-control" placeholder="Produto:" value="<?php echo $rows_pesq['nome']; ?>">
						</div>
						<div class="form-group col-lg-2">
							<input type="text" name="valor_uni" id="valor_uni" class="form-control" placeholder="Valor Unitario:" value="<?php echo $rows_pesq['valor_varejo']; ?>">
						</div>
						<div class="form-group col-lg-2">
							<input type="text" name="quant" id="quant" class="form-control" placeholder="Quantidade:">
						</div>
						<div class="form-group col-lg-2">
							<input type="submit"  class="btn btn-primary" value="Adicionar Produto">
						</div>	
					</div>
					
				</form>
				<?php	
									$quantidade_atual = $rows_pesq['quantidade']; 
								}
							}
						}
						?>
				<?php 
				  
				  if(isset($_POST['pd'])){
					   function controle_estoque($id_prod, $quant, $nome, $valor_uni, $valor_to){
						  //definindo consulta
					   include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT * FROM produto WHERE id_produto = ?";
	                            $stmt = $pdo->prepare($sql);
								$stmt->bindParam(1,$id_prod);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
									
									$quantidade_a = $value['quantidade'];
									
									if($quantidade_a>$quant){
										
										$quantidade_n = $quantidade_a - $quant;
										$sql2 = "UPDATE `produto` SET `quantidade`=? WHERE  `id_produto`=?";
										$stmt = $pdo->prepare($sql2);
										$stmt->bindParam(1,$quantidade_n);
										$stmt->bindParam(2,$id_prod);
										
										if($stmt->execute()){
											echo "
												<script type=\"text/javascript\">
													alert(\"Estoque Atualizado com Sucesso.\");
												</script>
											  ";
											$sql="INSERT INTO `produto_temp`(`cod_produto`,`nome`, `quant`, `valor_uni`, `valor_tot`) VALUES(?,?,?,?,?)";
					 						//setando parametros de conexão e cadastro
	                 						$stmt= $pdo->prepare($sql);
											$stmt->bindParam(1,$id_prod);
					 						$stmt->bindParam(2,$nome);
					 						$stmt->bindParam(3,$quant);
					 						$stmt->bindParam(4,$valor_uni);
											$stmt->bindParam(5,$valor_to);
					
		                      				$stmt->execute();
						          
									 
						           
					           			}else{
						           
						            		echo "<script>alert('Erro ao Atualizar estoque!');</script>"; 
						           
					           			}
									}else{
										echo "<script>alert('Valor da quantidade em estoque é menor do que o selecionado para venda!)</script>";
										echo "<script>alert('Confira seu estoque antes de continuar a venda.)</script>";
									}
									
								}

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
						  
				   }
					  
					  
					  $id_produto = $_POST['id_produto'];
					  $nome_prod = $_POST['pd'];
					  $quant = $_POST['quant'];
					  $valor_uni = $_POST['valor_uni'];
					  $valor_tot = 0.0;
					  $valor_tot += ((float)$quant * (float)$valor_uni);
					  //chamar função controle de estoque
					  controle_estoque($id_produto, $quant, $nome_prod, $valor_uni, $valor_tot);
					  //chamar função cadastrar protuto em nota
				  }
				?>
				
				
				
			</div>
		</div>
		</div>
		<div class="container" style="background-color: #C5C3C3">
		<div class="row">
			<div class="col-md-7">
			<form method="post">
			<textarea class="form-control" name="nota" style="height: 50vh;" readonly> 
				<?php
				echo "\n";
				try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT * FROM produto_temp";
	                            $stmt = $pdo->prepare($sql);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
								$tot +=$value['valor_tot'];
								
			            		echo $value['nome']."     --     ".$value['quant']."     --     "."R$ ".$value['valor_uni']."     --     "."R$ ".$value['valor_tot']." <br> \n";
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
		
			</textarea>
			
			</div>
			<div class="col-md-5">
			
			<!-- Informações nota -->
				<div class="form-row">
					<div class="form-group col-md-12">
						<input type="text" name="cliente_n" id="cliente_n" class="form-control" placeholder="Selecione um cliente:" list="cliente">
					</div>
					<datalist id="cliente">
                         <!-- iniciando php de consulta da pesquisa -->
                         <?php 
							
		                    include '..conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT * FROM cliente";
	                            $stmt = $pdo->prepare($sql);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
								
			              ?>
							<option value="<?php echo $value['ID']."-".$value['NOME']; ?>">
                          <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
                          <!-- fim da pesquisa no php -->
                        </datalist>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
					<h5><b>Forma de Pagamento</b></h5>
						<select class="form-control" name="forma_pg">
							<option value="Cartão de Crédito">Cartão de Crédito</option>
							<option value="Cartão de Débito">Cartão de Débito</option>
							<option value="Pix">Pix</option>
							<option value="Transferência Bancaria">Transferência Bancaria</option>
							<option value="Dinheiro">Dinheiro</option>
						</select>
					</div>
					<div class="form-group col-md-6">
					<h5><b>Valor de Transporte</b></h5>
						<input type="text" name="transporte" id="transporte" class="form-control" placeholder="Valor de Transporte:">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12" style="margin-top: 40%;">
						<center><h3 style="color: red;"><b>Valor Total da Compra:</b></h3></center>
						R$<input type="text" class="form-control" name="v_tot" id="v_tot" value="<?php echo (float)$tot;?>" readonly>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="submit" class="btn btn-primary" value="Finalizar Venda">
					</div>
					<div class="form-group col-md-6">
						<a href="homesistema.php"><input type="button" class="btn btn-danger" value="Voltar"></a>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<a href="cancelar_item.php"><input type="button" class="btn btn-success" value="Cancelar Item"></a>
					</div>
				</div>
				</form>
			</div>
			<!-- area de informações dos produtos adionados na venda -->
			
			<!-- criando método de salvar nota -->
			<?php
			if(isset($_POST['forma_pg'])){
				function cad_nota($nota,$cliente_n,$forma_pg,$transporte,$v_tot){
					include("../conexao/conexao.php");
							try{
								$pdo = new PDO($host,$log,$pass);
								$sql="INSERT INTO `nota`(`nota`, `cliente`, `forma_pg`, `transporte`, `v_tot`) VALUES(?,?,?,?,?)";
					 			//setando parametros de conexão e cadastro
	                 			$stmt= $pdo->prepare($sql);
					 			$stmt->bindParam(1,$nota);
					 			$stmt->bindParam(2,$cliente_n);
					 			$stmt->bindParam(3,$forma_pg);
								$stmt->bindParam(4,$transporte);
					 			$stmt->bindParam(5,$v_tot);
					 			
					
		                       if($stmt->execute()){
								   $sql2 ="DELETE FROM `produto_temp`";
								   $stmt= $pdo->prepare($sql2);
								   $stmt->execute();
						           ?>
						           <?php 
								   
								   echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/recibo_print.php'>
												<script type=\"text/javascript\">
													alert(\"Venda Efetuada com sucesso.\");
												</script>
											  ";	
									 ?>
						           <?php
					           }else{
						           ?>
						           <?php echo "<script>alert('Erro ao Finalizar venda!');</script>"; ?>
						           <?php
					           }
					            }catch(PDOException $ex){
			                       //mens de erro
	                                echo 'Erro: '.$ex->getMessage();
                                }
				}
				$info = $_POST['nota'];
				$cliente = $_POST['cliente_n'];
				$soNumeros = preg_replace("/[^0-9]/","", $cliente);
				$forma_pg = $_POST['forma_pg'];
				$transporte = $_POST['transporte'];
				$v_tot = $_POST['v_tot'];
				cad_nota($info, $cliente, $forma_pg, $transporte, $v_tot);
				}
			?>
			<!--fim do método -->
			
		
		</div>
	</div>
</section>
<!-- fim do Home-->
   <!-- fim das opções de recibo-->
	
	
</body>
</html>
