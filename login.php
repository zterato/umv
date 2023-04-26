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
			    <center><img src="img/logos/logo.jpeg" class="img img-fluid logologin"></center>
				
				<form method="post">
					<div class="form-group">
						<input type="text" name="email" id="email" class="form-control" placeholder="Digite seu email:">
					</div>
					<div class="form-group">
						<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha:">
					</div>
					<div class="form-group">
						<a href="controle/esqueci.php">Esqueci minha Senha!</a>
					</div>
					<div class="row" style="margin-top:2%;">
                        <div class="col-6 col-md-6">
						    <input type="submit" value="Logar" class="btn btn-light">
                        </div>
                        <div class="col-6 col-md-6">
						    <a href="cadastro.php"><input type="button" value="Registre-se" class="btn btn-primary"></a>
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
			//incluindo conexão
			include "conexao/conexao.php";
			//gatilho para autenticação
			if(isset($_POST['email'])){
				 try{
                     $pdo = new PDO($host,$log,$pass);
				
				
				//recebendo informações do get
				$email = $_POST['email'];
			    $senha = $_POST['senha'];
				if(!empty($email) and !empty($senha)){
					//recebendo SQL para consulta do adm
	                $sql="SELECT* FROM usuario WHERE email=:e and senha=:s";
					//setando parametros de conexão
	                $stmt= $pdo->prepare($sql);
		            $stmt->bindParam(':e',$email);
		            $stmt->bindParam(':s',$senha);
		            $stmt->execute();
					//retornando informações de autenticaçao
					if($stmt->rowCount()>0){
						//entrar no sistema sessão
			            $dado = $stmt->fetch();
			            session_start();
			            
			            //finalizando instancias
			            //chmando informações de autenticação do método get
			            $_SESSION['id_usuario']=$dado['id_usuario'];
			            $_SESSION['email']=$_POST['email']; 
			           	$_SESSION['senha']=$_POST['senha'];
						$_SESSION['telefone']=$dado['telefone'];
						$_SESSION['rua']=$dado['rua'];
						$_SESSION['numero']=$dado['numero'];
						$_SESSION['cep']=$dado['cep'];
						$_SESSION['bairro']=$dado['bairro'];
						$_SESSION['municipio']=$dado['municipio'];
						$_SESSION['uf']=$dado['uf'];
						$_SESSION['complemento']=$dado['complemento'];
			            //finalizando autenticação do adm
			            // redirecionando para página inicial do sistema
						
			            header("Location: produtos.php");
						
					}else{
			
			         ?>
				
			          <br><p class="txt2"><?php echo "<script>alert('Informações incorretas para autenticação');</script>"; ?></p><?php
		            }
				}
				else{
		        ?><br><p class="txt3"><?php echo "<script>alert('Preencha os campos acima!');</script>"; ?></p><?php
	 }
			}catch(PDOException $ex){
	         echo 'Erro: '.$ex->getMessage();
             }
			
				
			}
			?>
			<!-- fim do php -->
			
			<!-- lado direito de espaçamento -->
	        <div class="col-md-3"></div>
		    <!-- fim do lado direito -->
		</div>
	</div>
</section>
<!-- fim da estrutura do login -->
