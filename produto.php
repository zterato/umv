<?php
session_start();
$id_produto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$valor_produto = filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_STRING);
include "layout/cabecalho.php";
include "layout/menu.php";
$cep_new = 0;
?>
<!--espaço do menu -->
<div class="container">
		<div class="col-md-12">
			<img src="" class="espaco">
		</div>
	</div>
	<!-- fim do despaço do menu -->
	
	<!-- area de venda do produto -->
	<section class="venda">
		<div class="container">
		<?php include "funcionalidades/ind_produtos.php" ?>
      	<?php 
		$categoria = 0;
		$img = 0;
		$produto = 0;
        	if(mysqli_num_rows($result)>0){
          	while($dados=mysqli_fetch_assoc($result)){
				$img = $dados['img1'];
				$produto = $dados['nome'];
     	 ?> 
			<div class="row">
				<!-- foto do produto -->
				<div class="col-md-6">
					<img src="sistema/administrador/foto/<?php echo $dados['img1']; ?>" class="img-prod-venda">	
				</div>
				<!-- fim do produto -->
				<!-- informações de venda -->
				<div class="col-md-6">
					<h1 class="titulo-prod"><b><?php echo $dados['nome']; ?></b></h1>
					<h4><h2 class="titulo-valor"><b><?php echo $dados['valor_varejo']; ?></b></h2></h4>
					<h6>5X <b>Sem Juros</b> nos cartões</h6>
					<p> Categoria: <?php $categoria = $dados['categoria'];  echo $dados['categoria']; ?></p>
					<p><b>Quantidade:</b></p>
					<form method="post">
						<div class="row">
							<div class="col-md-4">
								<input type="number" id="quantity" name="quantity" min="1" max="10" class="form-control" value="1">
							</div>
						</div>
					
					<?php      
          				}
        			}
     				 ?>
					<hr>
					<center><input type="submit" value="Comprar" class="btn btn-outline-danger" style="width: 100%;"></center>
					</form>
					<?php 
						if(isset($_POST['quantity'])){
							if(!empty($_SESSION['id_usuario'])){
								include "conexao/conexao_mysqli.php";

								$quantity = $_POST['quantity'];
								$valor_total = $valor_produto * $quantity;
								$id_usuario = $_SESSION['id_usuario'];
								$status = "aguardando";
								$sql = "INSERT INTO `carrinho`(`produto`, `categoria`, `quantidade`, `valor_unitario`, `valor_total`, `id_cliente`, `status`, `foto`) VALUES ('$produto','$categoria','$quantity','$valor_produto','$valor_total', '$id_usuario', '$status', '$img')";
								if(mysqli_query($conn, $sql)){
									echo 
									"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=carrinho.php'>
										<script type=\"text/javascript\">
											confirm(\"Bem vindo ao seu carrinho!!\");
										</script>" 
									;
								}
							}else{
								echo 
									"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login.php'>
										<script type=\"text/javascript\">
											confirm(\"Faça o Login para continuar sua compra!\");
										</script>" 
									;
							}
						}
					?>
					<br>
					<h6><b>Calcule o valor de frete</b></h6>
					<form method="post">
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="cep" placeholder="Seu CEP:" class="form-control">
							</div>
							<div class="col-md-4">
								<center><button class="btn btn-outline-primary" style="width: 100%;">Calcular Frete</button></center>
							</div>
						</div>
					</form>
					<?php 
					if(isset($_POST['cep'])){
						$cep = $_POST['cep'];
						if(!empty($cep)){
							$cep_new += 35.75;
						}else{
							echo "<script>alert('Preencha os campos corretamente');</script>";
						}
					}
					?>
					<div class="col-md-4">
								<h5><?php echo "Valor do Frete R$ ".$cep_new;?></h5>
							</div>
				</div>
				<!-- fim das informações de venda -->
			</div>
			<div class="row p-rel">
				<center> <h5 style="margin-top: 5%;"><b>Produtos Relacionados</b></h5></center>
				<?php

					//conectando ao banco de dados
					include "conexao/conexao_mysqli.php";
					$sql2 = "SELECT * FROM `produto` WHERE categoria='$categoria' LIMIT 4";
					$result2 = mysqli_query($conn, $sql2);
					if(mysqli_num_rows($result2)>0){
						while($dados2=mysqli_fetch_assoc($result2)){

				?>
				<div class="col-6 col-md-3">
					<div class="prod">
					<img src="sistema/administrador/foto/<?php echo $dados2['img1']; ?>" class="img-produto">
					<h4><?php echo $dados2['nome']; ?></h4>
					<h2 class="text-prod"><?php echo $dados2['valor_varejo']; ?></h2>
					<p><b>Até 3x Cartão</b></p>
					<?php echo "
											<a  href='produto.php?id=" .$dados2['id_produto'] ."&valor=".$dados2['valor_varejo']. "'><button class='btn btn-outline-danger'>Adicionar à Sacola</button></a>
							";
					?>
					</div>
      			</div>
				<?php      
          				}
        			}
     				 ?>
			</div>
		</div>
	</section>
	<!-- fim da area de venda do produto -->
<?php 
include "layout/rodape.php";
?>