<?php

							include("../conexao/conexao.php");
							try{
								$status = "Pago";
								$id_carrinho = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
								$pdo = new PDO($host,$log,$pass);
								$sql="UPDATE `carrinho` SET `status`=? WHERE `id_carrinho`=?;";
					 			//setando parametros de conexão e cadastro
	                 			$stmt= $pdo->prepare($sql);
					 			$stmt->bindParam(1,$status);
					 			$stmt->bindParam(2,$id_carrinho);
					
		                       if($stmt->execute()){
						           ?>
						           <?php echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=relatorio.php'>
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
					          
						
						
					?>