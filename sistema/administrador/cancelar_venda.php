<?php
include '../conexao/conexao.php';
//criando métode para deletar cliente especificado
try{
$pdo = new PDO($host,$log,$pass);
	//declarar sql para deletar informação pelo cod
	$sql ='DELETE FROM `produto_temp`';
	//recebendo informação sobre codigo do cliente que sera deletado
	
	$stmt = $pdo->prepare($sql);
	if($stmt->execute()){
		echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/recibo.php'>
												<script type=\"text/javascript\">
													alert(\"Venda cancelada com sucesso.\");
												</script>
											  ";
	}else{
		echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/recibo.php'>
												<script type=\"text/javascript\">
													alert(\"Erro ao cancelar venda.\");
												</script>
											  ";
	}
	}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
}
?>

?>