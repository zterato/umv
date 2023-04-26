<?php 
include '../controle/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	</body>
		<?php
header('Content-Type: text/html; charset=utf-8');
			include_once("../conexao/conexao_mysqli.php");
			$arquivo 	= $_FILES['arquivo']['name'];
			
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = 'foto/';
			
			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb
			
			//Array com a extensões permitidas
			$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
			
			//Renomeiar
			$_UP['renomeia'] = false;
			
			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['arquivo']['error'] != 0){
					$id_produto=$_POST['id_produto'];
					$nome=$_POST['nome'];
					$quantidade=$_POST['quantidade'];
					$categoria=$_POST['categoria'];
					$material=$_POST['material'];
					$tipo_produto=$_POST['tipo_produto'];
					$tamanho=$_POST['tamanho'];
					$peso=$_POST['peso'];
					$fornecedor=$_POST['fornecedor'];
					$quant_min=$_POST['quant_min'];
					$valor_compra=$_POST['valor_de_compra'];
					$valor_atacado=$_POST['valor_atacado'];
					$valor_varejo=$_POST['valor_varejo'];
					$obs=$_POST['obs'];
					if(!empty($id_produto) && !empty($nome) && !empty($valor_compra)){
					$query = mysqli_query($conn, "UPDATE `produto` SET `nome`='$nome',`quantidade`='$quantidade',`categoria`='$categoria',`material`='$material',`tipo_produto`='$tipo_produto',`tamanho`='$tamanho',`peso`='$peso',`fornecedor`='$fornecedor',`quantidade_min`='$quant_min',`valor_compra`='$valor_compra',`valor_atacado`='$valor_atacado',`valor_varejo`='$valor_varejo',`OBS`='$obs' WHERE `id_produto`='$id_produto'");
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/editar_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Informações editadas com Sucesso.\");
						</script>
					";	
					}else{
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/editar_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Preencha os campos obrigatórios!.\");
						</script>
						";	
					}
			}
			
			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/editar_produto.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi editada extesão inválida.\");
					</script>
				";
			}
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/editar_produto.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($_UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['arquivo']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
					
					$id_produto=$_POST['id_produto'];
					$nome=$_POST['nome'];
					$quantidade=$_POST['quantidade'];
					$categoria=$_POST['categoria'];
					$material=$_POST['material'];
					$tipo_produto=$_POST['tipo_produto'];
					$tamanho=$_POST['tamanho'];
					$peso=$_POST['peso'];
					$fornecedor=$_POST['fornecedor'];
					$quant_min=$_POST['quant_min'];
					$valor_compra=$_POST['valor_de_compra'];
					$valor_atacado=$_POST['valor_atacado'];
					$valor_varejo=$_POST['valor_varejo'];
					$obs=$_POST['obs'];
					if(!empty($id_produto) && !empty($nome) && !empty($valor_compra)){
					$query = mysqli_query($conn, "UPDATE `produto` SET `nome`='$nome',`quantidade`='$quantidade',`categoria`='$categoria',`material`='$material',`tipo_produto`='$tipo_produto',`tamanho`='$tamanho',`peso`='$peso',`fornecedor`='$fornecedor',`quantidade_min`='$quant_min',`valor_compra`='$valor_compra',`valor_atacado`='$valor_atacado',`valor_varejo`='$valor_varejo',`OBS`='$obs',`img1`='$nome_final' WHERE `id_produto`='$id_produto'");
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/produto.php'>
						<script type=\"text/javascript\">
							alert(\"Informações editadas com Sucesso.\");
						</script>
					";	
					}else{
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/cad_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Preencha os campos obrigatórios!.\");
						</script>
						";	
					}
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.makeuup.com.br/administrador/cad_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi editar com Sucesso.\");
						</script>
					";
				}
			}
			
			
		?>
		
	</body>
</html>