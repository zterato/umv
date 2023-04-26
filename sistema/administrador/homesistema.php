<?php
include '../controle/auth.php';
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
<br><br>
<section class="obs_produto">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<center><h3>Lista de Produtos com estoque baixo</h3></center><br>
				<table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">código</th>
                      <th scope="col">Produto</th>
                      <th scope="col">Quantidade</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
					  include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT * FROM `produto` WHERE quantidade <= 30;";
	                            $stmt = $pdo->prepare($sql);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
								
			              ?>
                    <tr style="background: orange;">
                      <th scope="row"><?php echo $value['id_produto']; ?></th>
                      <td><?php echo $value['nome']; ?></td>
                      <td><?php echo $value['quantidade']; ?></td>
	                </tr>
	                  <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
                  </tbody>
                </table>
			</div>
			<div class="col-lg-6">
				<center><h3>Lista de Produtos 0 estoque</h3></center><br>
				<table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">código</th>
                      <th scope="col">Produto</th>
                      <th scope="col">Quantidade</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
					  include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
                                $sql ="SELECT * FROM `produto` WHERE quantidade <= 0;";
	                            $stmt = $pdo->prepare($sql);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value){
								
			              ?>
                    <tr style="background: red; color: white;">
                      <th scope="row"><?php echo $value['id_produto']; ?></th>
                      <td><?php echo $value['nome']; ?></td>
                      <td><?php echo $value['quantidade']; ?></td>
	                </tr>
	                <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>
                  </tbody>
                </table>
			</div>
		</div>
	</div>
</section>
