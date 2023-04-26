<?php
include 'layout/cabecalho.php';
?>
<!-- iniciando estrutura do login -->
<section class="login">
	<div class="container-fluid">
		<div class="row">
		    <!-- lado esquerdo de espaçamento -->
		    <div class="col-md-3"></div>
		    <!-- fim do lado esquerdo -->
		    
		    <!-- areado do formulario de menu -->
			<div class="col-md-6 loginform" style="margin-top: 4%;">
			    <center><img src="img/logos/logo.jpeg" class="img img-fluid" width="10%"></center>
				<br>
                <center><h1 style="color: white">Registre-se</h1></center>
                <br>
				<form method="post">
                <div class="form-group">
						<input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu Nome Completo:">
					</div>
					<div class="form-group">
						<input type="text" name="email" id="email" class="form-control" placeholder="Digite seu email:">
					</div>
					<div class="form-group">
						<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite seu Telefone:">
					</div>
					<div class="form-group">
						<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha:">
					</div>
					<div class="form-group">
						<h3 style="color:white;">Endereço:</h3>
					</div>
					<div class="form-group">
						<input type="text" name="rua" id="rua" class="form-control" placeholder="Rua:">
					</div>
					<div class="row">
						<div class="col-md-4">
						<input type="text" name="numero" id="numero" class="form-control" placeholder="Número:">
						</div>
						<div class="col-md-8">
						<input type="text" name="cep" id="cep" class="form-control" placeholder="CEP:">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
						<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro:">
						</div>
						<div class="col-md-4">
						<input type="text" name="municipio" id="municipio" class="form-control" placeholder="Municipio:">
						</div>
						<div class="col-md-4">
						<input type="text" name="uf" id="uf" class="form-control" placeholder="Estado:">
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento:">
					</div>
					<div class="row" style="margin-top:2%;">
                        <div class="col-6 col-md-6">
						    <input type="submit" value="Cadastrar-se" class="btn btn-light">
                        </div>
                        <div class="col-6 col-md-6">
						    <a href="login.php"><input type="button" value="Login" class="btn btn-primary"></a>
                        </div>
					</div>
                    <div class="row" style="margin-top:2%;">
                        <a href="index.php"><input type="button" class="btn btn-danger" style="width:100%;" value="Voltar ao Site"></a>
                    </div>
				</form>
			</div>
			<!-- fim da area de formulario do menu -->
			<!-- inicio do php de autenticação do adm -->
			
			<?php 
						if(isset($_POST['nome'])){
								include "conexao/conexao_mysqli.php";

								$nome = $_POST['nome'];
								$email = $_POST['email'];
								$telefone = $_POST['telefone'];
								$rua = $_POST['rua'];
								$numero = $_POST['numero'];
								$cep = $_POST['cep'];
								$bairro = $_POST['bairro'];
								$municipio = $_POST['municipio'];
								$uf = $_POST['uf'];
								$complemento = $_POST['complemento'];
                                $senha = $_POST['senha'];
								if(!empty($nome) and !empty($email) and !empty($senha) and !empty($telefone) and !empty($cep) and !empty($numero)){
								$sql = "INSERT INTO `usuario`(`nome`, `email`, `senha`, `telefone`, `rua`, `numero`, `cep`, `bairro`, `municipio`, `uf`, `complemento`) VALUES ('$nome','$email','$senha','$telefone','$rua','$numero','$cep','$bairro','$municipio','$uf','$complemento')";
								if(mysqli_query($conn, $sql)){
									echo 
									"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=login.php'>
										<script type=\"text/javascript\">
											confirm(\"Cadastrado com sucesso!!\");
										</script>" 
									;
								}else{
                                    echo "<script>confirm('Erro ao Cadastrar');</script>";
                                }
								}else{
									echo "<script>confirm('Preencha os campos obrigatórios!');</script>";
								}
							}
					?>
			<!-- lado direito de espaçamento -->
	        <div class="col-md-3"></div>
		    <!-- fim do lado direito -->
		</div>
	</div>
</section>
<!-- fim da estrutura do login -->
