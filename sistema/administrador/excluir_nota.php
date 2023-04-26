<?php
include '../conexao/conexao.php';
//criando métode para deletar nota especificado
try{
$pdo = new PDO($host,$log,$pass);
	//declarar sql para deletar informação pelo cod
	$sql ='DELETE FROM `nota` WHERE id_nota=?';
	//recebendo informação sobre codigo do nora que sera deletado
	$cod_nota = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
	
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(1, $cod_nota);
	if($stmt->execute()){
		echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/relatorio.php'>
												<script type=\"text/javascript\">
													alert(\"Informações excluidas com Sucesso.\");
												</script>
											  ";
	}else{
		echo "
												<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/relatorio.php'>
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