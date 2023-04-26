<?php
include '../conexao/conexao.php';
//criando métode para deletar cliente especificado
try{
$pdo = new PDO($host,$log,$pass);
	//declarar sql para deletar informação pelo cod
	$sql ='DELETE FROM `fornecedor` WHERE id_fornecedor=?';
	//recebendo informação sobre codigo do cliente que sera deletado
	$cod_fornecedor = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
	
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(1, $cod_fornecedor);
	if($stmt->execute()){
		echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/fornecedor.php'>
												<script type=\"text/javascript\">
													alert(\"Informações excluidas com Sucesso.\");
												</script>
											  ";
	}else{
		echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/fornecedor.php'>
												<script type=\"text/javascript\">
													alert(\"Erro ao Excluir informações.\");
												</script>
											  ";
	}
	}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
}
?>

?>