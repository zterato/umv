<?php
session_start();
include 'conexao/conexao.php';
$id_usuario = $_SESSION['id_usuario'];
//criando métode para deletar cliente especificado
try{
								$status = "Pago";
								$pdo = new PDO($host,$log,$pass);
								$sql="UPDATE `carrinho` SET `status`=? WHERE `id_cliente`=?;";
					 			//setando parametros de conexão e cadastro
	                 			$stmt= $pdo->prepare($sql);
					 			$stmt->bindParam(1,$status);
					 			$stmt->bindParam(2,$id_usuario);
					
		                       if($stmt->execute()){
						           ?>
						           <?php echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://makeuup.com.br/'>
												<script type=\"text/javascript\">
													alert(\"Compra Finalizada.\");
												</script>
											  ";	
									?>
						           
						           <?php
					           }else{
						           ?>
						           <?php echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://makeuup.com.br/'>
												<script type=\"text/javascript\">
													alert(\"Erro na Compra.\");
												</script>
											  ";	
						           <?php
					           }
					            }catch(PDOException $ex){
			                       //mens de erro
	                                echo 'Erro: '.$ex->getMessage();
                                }
?>

