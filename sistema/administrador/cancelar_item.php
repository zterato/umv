<?php 
include '../controle/auth.php';
?>
<?php 
include '../layout/cabecalho.php';
include '../layout/menuadm.php'
?>
	<!-- opções de cliente -->
	<div class="container">
					<div class="row" style="margin-top: 5%;">
						<div class="form_cad">
							<!-- formulario de filtro -->
							<form method="post">
								<div class="form-row">
									<div class="form-group col-md-6">
										<input type="text" name="info" class="form-control" placeholder="Informação a ser pesquisada!" list="pesquisa">
								<datalist id="pesquisa">
										<?php
									include_once("../conexao/conexao_mysqli.php");
							
									$sql = "SELECT * FROM `produto_temp`;";
									$result=mysqli_query($conn, $sql);
									if(mysqli_num_rows($result)>0){
										while($rows_list = mysqli_fetch_assoc($result)){
								?>
									<option value="<?php echo $rows_list['nome']; ?>"><?php echo $rows_list['nome']; ?></option>
								<?php	
										}
									}
				
								?>
								</datalist>
									</div>
									<div class="form-group col-md-4">
										<input type="submit" value="Cancelar Produto" class="btn btn-primary">
									</div>
								</div>
								</form>
								<?php 
								if(isset($_POST['info'])){
								include '../conexao/conexao.php';
								
								$pesq = $_POST['info'];
								$soNumeros = preg_replace("/[^0-9]/","", $id_prod);
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT produto_temp.id_prod, produto_temp.quant, produto.quantidade, produto.id_produto
								FROM produto
								INNER JOIN produto_temp
								ON produto_temp.cod_produto = produto.id_produto
								WHERE produto_temp.nome=?;";
	                            $stmt = $pdo->prepare($sql);
								$stmt->bindParam(1,$pesq);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
									$quantidade_a = $value['quantidade'];
									$quantidade_b = $value['quant'];
									$id_produto = $value['id_produto'];
									$id_prod = $value['id_prod'];
									if($quantidade_b>0){
										$quant_t = $quantidade_a + $quantidade_b;
										$sql2 = "UPDATE `produto` SET `quantidade`=? WHERE  `id_produto`=?";
										$stmt = $pdo->prepare($sql2);
										$stmt->bindParam(1,$quant_t);
										$stmt->bindParam(2,$id_produto);
										
										if($stmt->execute()){
											$sql3 = "DELETE FROM `produto_temp` WHERE id_prod=?";
										    $stmt = $pdo->prepare($sql3);
											$stmt->bindParam(1,$id_prod);
											$stmt->execute();
											echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/recibo.php'>
												<script type=\"text/javascript\">
													alert(\"Estoque Atualizado com Sucesso.\");
												</script>
											  ";
									           
					           			}else{
						           
						            		echo "<script>alert('Erro ao Atualizar estoque!');</script>"; 
						           
					           			}
									}
									}

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
						  
				   }
								?>
								
								
						
							<!-- fim do formulario de filtro -->
						</div>
					</div>
</div>
					
	

