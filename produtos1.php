<?php
session_start();
include "layout/cabecalho.php";
include "layout/menu.php";
?>
<!-- pesquisa de  produtos -->
<section class="pesquisa">
		<div class="container-fluid">
			<div class="row">
				<div class="col-3 col-md-3">
					<h3 class="ess">Produtos</h3>
				</div>
				<div class="col-1 col-md-2"></div>
				<div class="col-1 col-md-2"></div>
				<div class="col-7 col-md-3" style="float: right;">
					<form method="post">
						<div class="row">
							<div class="col-4 col-md-5 ess2" >
								<h6><b>Ordernar por:</b></h6>
							</div>
							<div class="col-8 col-md-7 ess2" >
								<select class="form-control">
									<option value="Lançamento">Lançamento</option>
									<option value="Destaque">Destaque</option>
								</select>
							</div>
						</div>
					</form>
				</div>				
			</div>
		</div>
	</section>
	<!-- fim da pesquisa de produtos -->
	<!-- area produtos -->
	<section class="area-produto">
		<div class="container">
			<div class="row">
				<center><h3>Todos os Produtos:</h3></center>
				<?php include "funcionalidades/pequisa_produtos.php"; ?>
				<?php while($dados= mysqli_fetch_assoc($resultado_pd)){ ?>
					<div class="col-6 col-md-3">
						<div class="prod">
							<img src="sistema/administrador/foto/<?php echo $dados['img1']; ?>" class="img-produto">
							<h4><?php echo $dados['nome']; ?></h4>
							<h2 class="text-prod"><?php echo $dados['valor_varejo']; ?></h2>
							<p><b>Até 3x Cartão</b></p>
							<?php echo "
													<a  href='produto.php?id=" . $dados['id_produto'] ."&valor=".$dados['valor_varejo']."'><button class='btn btn-outline-danger'>Adicionar à Sacola</button></a>
									";
							?>
						</div>
      				</div>
				<?php } ?>
			</div>
			<?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<table class="table" style="margin-top: 5%;">
						<tr>
							<td>
								<?php
									if($pagina_anterior != 0){ ?>
										<a class="list-group-item" href="produtos.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php }  ?>
							</td>
							<?php 
								//Apresentar a paginacao
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
							<td>
							
								<a class="list-group-item" href="produtos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
								
							</td>
							<?php } ?>
							<td style="text-align: right;">
								<?php
									if($pagina_posterior <= $num_pagina){ ?>
										<a class="list-group-item" href="produtos.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&raquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php }  ?>
							</td>

						</tr>
					</table>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</section>
	<!-- fim area produtos -->
<?php 
include "layout/rodape.php";
?>