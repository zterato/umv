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
			<div class="col-md-6 loginform">
			    <center><img src="img/logo_joias.png" class="img img-fluid logologin"></center>
				
				<form method="post">
					<div class="form-group">
						<input type="text" name="login" id="login" class="form-control" placeholder="Digite o Login:">
					</div>
					<div class="form-group">
						<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha:">
					</div>
					<div class="form-group">
						<a href="controle/esqueci.php">Esqueci minha Senha!</a>
					</div>
					<div class="form-group">
						<input type="submit" value="Acessar Sistema" class="btn btn-light">
					</div>
				</form>
			</div>
			<!-- fim da area de formulario do menu -->
			<!-- inicio do php de autenticação do adm -->
			<?php
			//incluindo conexão
			include "conexao/conexao.php";
			//gatilho para autenticação
			if(isset($_POST['login'])){
				 try{
                     $pdo = new PDO($host,$log,$pass);
				
				
				//recebendo informações do get
				$login = $_POST['login'];
			    $senha = $_POST['senha'];
				if(!empty($login) and !empty($senha)){
					//recebendo SQL para consulta do adm
	                $sql="SELECT* FROM funcionario WHERE login=:e and senha=:s";
					//setando parametros de conexão
	                $stmt= $pdo->prepare($sql);
		            $stmt->bindParam(':e',$login);
		            $stmt->bindParam(':s',$senha);
		            $stmt->execute();
					//retornando informações de autenticaçao
					if($stmt->rowCount()>0){
						//entrar no sistema sessão
			            $dado = $stmt->fetch();
			            session_start();
			            
			            //finalizando instancias
			            //chmando informações de autenticação do método get
			            $_SESSION['id']=$dado['id'];
			            $_SESSION['login']=$_POST['login'];
	                    $_SESSION['cargo']=$dado['cargo'];
			           	$_SESSION['senha']=$_POST['senha'];
			            //finalizando autenticação do adm
			            // redirecionando para página inicial do sistema
						if($_SESSION['cargo'] == "Administrador"){
			            header("Location: homesistema.php");
						}else{
						header("Location: userp/homeuser.php");
						}
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
