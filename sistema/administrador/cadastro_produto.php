<?php 

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
						$sql = "INSERT INTO `produto`(`id_produto`, `nome`, `quantidade`, `categoria`, `material`, `tipo_produto`, `tamanho`, `peso`, `fornecedor`, `quantidade_min`, `valor_compra`, `valor_atacado`, `valor_varejo`, `OBS`) VALUES ('$id_produto','$nome','$quantidade','$categoria','$material','$tipo_produto','$tamanho','$peso','$fornecedor','$quant_min','$valor_compra','$valor_atacado','$valor_varejo','$obs')";
					if(mysqli_query($conn, $sql)){
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/cad_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Informações cadastradas com Sucesso.\");
						</script>
					";	
					}else{
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/cad_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Erro.\");
						</script>
					";	
					}
					
					}else{
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://sistema.lojaumv.com.br/administrador/cad_produto.php'>
						<script type=\"text/javascript\">
							alert(\"Preencha os campos obrigatórios!.\");
						</script>
						";	
					}
			