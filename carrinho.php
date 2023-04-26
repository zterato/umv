<?php
session_start();
include "layout/cabecalho.php";
include "layout/menu.php";
$cep_new = 35.75;
$id_carrinho =0;
?>
<!-- pesquisa de  produtos -->
<section class="pesquisa">
		<div class="container-fluid">
			<div class="row">
				<div class="col-3 col-md-3">
					<h3 class="es-top">Meu Carrinho</h3>
				</div>
				<div class="col-3 col-md-3"></div>
				<div class="col-3 col-md-3"></div>
				<div class="col-3 col-md-3" style="float: right;">
				
					<!--<button class="btn btn-light es-top2" name="Finalizar">Finalizar</button>-->
				</div>				
			</div>
		</div>
	</section>
	<!-- fim da pesquisa de produtos -->
	
	<!--area do carrinho -->
	<section class="carrinho">
		<div class="container">
			<div class="row">
				<div class="col-2 col-md-4">
					<h5>Item:</h5>
				</div>
				<div class="col-3 col-md-3" style="text-align: left;">
					<h5>Quantidade:</h5>
				</div>
				<div class="col-4 col-md-3" style="text-align: right;">
					<h5>Valor do Produto:</h5>
				</div>
				<div class="col-2 col-md-2">
					<h5>Opções:</h5>
				</div>
			</div>
			<hr>
			<?php
				$valor_tot = 0;
				$total = 0;
				//conectando ao banco de dados
				include "conexao/conexao_mysqli.php";

				$id_usuario = $_SESSION['id_usuario'];
				$sql = "SELECT * FROM `carrinho` WHERE id_cliente = '$id_usuario' and status='aguardando'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)>0){
					while($dados = mysqli_fetch_assoc($result)){
						$valor_tot +=$dados['valor_total']; 
						$id_carrinho = $dados['id_carrinho'];
			?>
			
			<div class="row">
				<div class="col-3 col-md-4">
					<img src="sistema/administrador/foto/<?php echo $dados['foto']; ?>" class="img-carrinho2">
					<div class="info-prod">
						<h4 class="txt_h"><?php echo $dados['produto']; ?></h4>
						<p class="txt_p"><?php echo $dados['categoria']; ?></p>
					</div>
				</div>
				<div class="col-3 col-md-3" style="text-align: right;">
					<input type="number" class="input-numero" name="quantidade" value="<?php echo $dados['quantidade']; ?>">
				</div>
				<div class="col-3 col-md-3" style="text-align: right;">
					<h4 class="txt_h"><b><?php echo "R$".$dados['valor_total'].",00"; ?></b></h4>
				</div>
				<div class="col-2 col-md-2">
				<?php echo "
											<a  href='excluir.php?id=" .$dados['id_carrinho']."&'><button class='btn btn-danger'>Excluir</button></a>
							";
					?>
				</div>
			</div>
			<?php
					}
				}
			?>
			<hr>
			<div class="row">
				<div class="col-md-4" style="margin-top: 2%;">
					<h6><b>Endereço:</b></h6>
					<div class="row">
						<div class="col-md-12">
							<b>Endereço: </b><?php echo $_SESSION['rua']." - ".$_SESSION['numero']." - ".$_SESSION['bairro']."<br>"."<b>CEP:<b>".$_SESSION['cep']." - ".$_SESSION['municipio']."/ ".$_SESSION['uf']; ?>
							<br>
							<b>Valor Frete:</b><?php echo "R$ ".$cep_new; ?>
						</div>

					</div>	
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4" style="margin-top: 2%; text-align: le">
					<h6><b>Resumo do Pedido</b></h6>
					<hr>
					<p>Subtotal: <b><?php echo "R$ ".$valor_tot.",00"; ?></b></p>
					<hr>
					<h6>Total do Pedido: <b><?php $total = $valor_tot + $cep_new; echo $total; ?></b></h6>
					<div style="text-align: left; font-size: 10px">
					no boleto á vista<br>
					ou 1x sem juros de R$ 30,00 no cartão de crédito<br>
					ou 12x de R$ 03,00 no cartão de crédito.
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-6 col-md-6" style="text-align: left;">
					<a href="index.php"><button type="button" class="btn btn-info">Continuar Comprando</button></a>
				</div>
				<div class="col-6 col-md-6" style="text-align: right;">
				<?php echo "
											<a  href='teste.php?id=".$id_carrinho."&valor=".$total."'><button type='submit' class='btn btn-success' name='finalizar'>Finalizar</button></a>
							";
					?>
					<!--<button type="submit" class="btn btn-success" name="finalizar" onclick="finalizar();">Finalizar</button>-->
					<script>
						function finalizar(){
							var cep = document.getElementById("cep").value;
							if(cep == ""){
								alert("Preencha o campo Cep para continuar");
							}else{
								window.location.href = "http://seusite.com"
							}
						}
					</script>
				</div>
			</div>
			<hr>
		</div>
	</section>
	<!--fim da area do carrinho -->
<?php 
include "layout/rodape.php";
?>