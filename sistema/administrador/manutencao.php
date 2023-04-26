<?php 
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
<!-- iniciando bloco cabeçalho e menu de controle-->
<?php
$cliente_id = 0;
$dentista_id = 0;
?>
<!-- fim do bloco cabeçalho e menu de controle -->
<?php
//recebendo data e hora
date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d h:i:sa");
$time = date("h:i:sa");
?>

	<!-- opções de recibo-->
	
	<section class="suporte">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<a href="https://wa.me/5521959049587"><img src="../img/ajuda.png" class="img img-fluid" style="cursor: pointer"></a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</section>
	
	
</body>
</html>
