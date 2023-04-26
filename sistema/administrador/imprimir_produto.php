<?php 
include '../controle/auth.php';
?>
<?php 
include '../layout/cabecalho.php';
include '../layout/menuadm.php'
?>
	<!-- opções de cliente -->
	<div class="container">
				<?php 
							
		                    include '../conexao/conexao.php';
		                    try{
			                    $pdo = new PDO($host,$log,$pass);
								$id_produto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
                                $sql ="SELECT * FROM produto WHERE id_produto = ?";
	                            $stmt = $pdo->prepare($sql);
								$stmt->bindParam(1, $id_produto);
	                            $stmt->execute();
	                            $result = $stmt->fetchAll();
	                            foreach($result as $value1){
								
			              ?>
					<form method="post">
					    <!-- primeira linha do form -->
					    <br><br>
					    <center><h3>Informações do Produto</h3></center><br>
					    <font style="color: red">* Campos Obrigatórios</font>
						<div class="form-row">
							<div class="form-group col-md-4">
								<font style="color: red">*</font><input type="text" class="form-control" name="id_produto" placeholder="Código do Produto:" value="<?php echo $id_produto; ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<font style="color: red">*</font><input type="text" class="form-control" name="nome" placeholder="Nome do produto:" value="<?php echo $value1['nome']; ?>" readonly>
							</div>
						</div>
						<!-- fim da primeira linha do form -->
						<!-- Segunda Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="quantidade" placeholder="Quantidade:" value="<?php echo $value1['quantidade']; ?>" readonly>
							</div>
							<div class="form-group col-md-4">
								<select class="form-control" name="categoria" readonly>
									<option value="<?php echo $value1['categoria']; ?>"><?php echo $value1['categoria']; ?>"</option>
									<option value="Brincos">Brincos</option>
									<option value="Pulseiras">Pulseiras</option>
									<option value="Anéis">Anéis</option>
									<option value="Colar">Colar</option>
									<option value="Acessórios">Acessórios</option>
									<option value="Outros">Outros</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<select class="form-control" name="material" readonly>
									<option value="<?php echo $value1['material']; ?>"><?php echo $value1['material']; ?></option>
									<option value="Prata">Prata</option>
									<option value="Folheado a prata">Folheado a prata</option>
									<option value="Ouro">Ouro</option>
									<option value="Folheado a ouro">Folheado a ouro</option>
									<option value="Outros">Outros</option>
								</select>
							</div>
						</div>
					   <!-- fim da segunda linha do form -->
					   	<!-- Terceira Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<select class="form-control" name="tipo_produto" readonly>
									<option value="<?php echo $value1['tipo_produto']; ?>"><?php echo $value1['tipo_produto']; ?></option>
									<option value="joias">Jóias</option>
									<option value="Acessorios">Acessórios</option>
									<option value="Materia Prima">Matéria prima</option>
									<option value="Outros">Outros</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="tamanho" placeholder="Tamanho:" value="<?php echo $value1['tamanho']; ?>" readonly> 
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="peso" placeholder="Peso:" value="<?php echo $value1['peso']; ?>" readonly> 
							</div>
						</div>
					   <!-- fim da terceira linha do form -->
			 <!-- quarta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">

								<font style="color: red">*</font><b>Fornecedor</b><input type="text"  class="form-control" name="fornecedor" placeholder="Código fornecedor:" value="<?php echo $value1['fornecedor']; ?>" readonly>
							</div>
							<div class="form-group col-md-4">
							    <b>Quant. Minima:</b>
								<input type="text" class="form-control" name="quant_min" placeholder="Quant. Minima:" value="<?php echo $value1['quantidade_min']; ?>" readonly> 
							</div>
							<div class="form-group col-md-4">
							    
								<font style="color: red">*</font><b>Valor de Compra:</b><input type="text"  class="form-control" name="valor_de_compra" placeholder="Valor de Compra:" value="<?php echo $value1['valor_compra']; ?>" readonly> 
							</div>
						</div>
					   <!-- fim da quarta linha do form -->
					   <!-- quinta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="valor_atacado" placeholder="Valor de Atacado:" id="tel2" value="<?php echo $value1['valor_atacado']; ?>" readonly>
							</div>
							<div class="form-group col-md-8">
								<input type="text" class="form-control" name="valor_varejo" placeholder="Valor de Varejo:" value="<?php echo $value1['valor_varejo']; ?>" readonly> 
							</div>
						</div>
				        <div class="form-row">
				        	<div class="form-group col-md-12">
				        	    Observações
				        		<textarea name="obs" class="form-control-file" placeholder="Observações" readonly><?php echo $value1['OBS']; ?></textarea>
				        	</div>
				        </div>
			           <div class="form-row">
				        	<div class="form-group col-md-12">
				        	    <img src="foto/<?php echo $value1['img1']; ?>" width="300">
				        	</div>
				        </div>
				          <?php
	                             }

		                     }catch(PDOException $ex){
	                             echo 'Erro: '.$ex->getMessage();
                             }
		                   ?>

					   <!-- fim da quinta linha do form -->
					   <!-- sexta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<a  href="editar_produto.php?id=<?php echo $id_produto ?>"><input type="button" class="btn btn-primary" value="Editar Produto"></a>
							</div>
						</div>
					   <!-- fim da sexta linha do form -->
					</form>
					 
				</div>
   <!-- fim das opções de cliente -->
	

