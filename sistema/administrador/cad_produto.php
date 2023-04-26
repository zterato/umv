<?php 
include '../controle/auth.php';
?>
<?php 
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
?>
	<!-- opções de cliente -->
	<div class="container">
					<form action="cadastro_produto.php" method="post"  enctype="multipart/form-data">
					    <!-- primeira linha do form -->
					    <br><br>
					    <center><h3>Cadastro de Produto</h3></center><br>
					    <font style="color: red">* Campos Obrigatórios</font>
						<div class="form-row">
							<div class="form-group col-md-4">
								<font style="color: red">*</font><input type="text" class="form-control" name="id_produto" placeholder="Código do Produto:">
							</div>
							<div class="form-group col-md-8">
								<font style="color: red">*</font><input type="text" class="form-control" name="nome" placeholder="Nome do produto:">
							</div>
						</div>
						<!-- fim da primeira linha do form -->
						<!-- Segunda Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="quantidade" placeholder="Quantidade:">
							</div>
							<div class="form-group col-md-4">
								<select class="form-control" name="categoria">
									<option value="">Categoria</option>
									<option value="camisas">Camisas</option>
									<option value="tenis">Tênis</option>
									<option value="sapatos">Sapatos</option>
									<option value="bermudas">Bermudas</option>
									<option value="macacoes">Macacões</option>
									<option value="vestidos">Vestidos</option>
									<option value="Sandalia">Sandália"</option>
									<option value="acessorios">Acessórios</option>
									<option value="Moda Feminina">Moda Feminina</option>
									<option value="Moda Masculina">Moda Masculina</option>
									<option value="Outros">Outros</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<select class="form-control" name="material">
									<option value="">Material</option>
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
								<select class="form-control" name="tipo_produto">
									<option value="">Tipo de Produto</option>
									<option value="joias">Jóias</option>
									<option value="Acessorios">Acessórios</option>
									<option value="Materia Prima">Matéria prima</option>
									<option value="Outros">Outros</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="tamanho" placeholder="Tamanho:"> 
							</div>
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="peso" placeholder="Peso:"> 
							</div>
						</div>
					   <!-- fim da terceira linha do form -->
			 <!-- quarta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">

								<font style="color: red">*</font><b>Fornecedor</b><input type="text"  class="form-control" name="fornecedor" placeholder="Código fornecedor:">
							</div>
							<div class="form-group col-md-4">
							    <b>Quant. Minima:</b>
								<input type="text" class="form-control" name="quant_min" placeholder="Quant. Minima:" > 
							</div>
							<div class="form-group col-md-4">
							    
								<font style="color: red">*</font><b>Valor de Compra:</b><input type="text"  class="form-control" name="valor_de_compra" placeholder="Valor de Compra:"> 
							</div>
						</div>
					   <!-- fim da quarta linha do form -->
					   <!-- quinta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" name="valor_atacado" placeholder="Valor de Atacado:" id="tel2">
							</div>
							<div class="form-group col-md-8">
								<input type="text" class="form-control" name="valor_varejo" placeholder="Valor de Varejo:"> 
							</div>
						</div>
				        <div class="form-row">
				        	<div class="form-group col-md-12">
				        	    Observações
				        		<textarea name="obs" class="form-control-file" placeholder="Observações"></textarea>
				        	</div>
				        </div>
					   <!-- fim da quinta linha do form -->
					   <!-- sexta Linha do form -->
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="submit" class="btn btn-primary" value="Cadastrar">
							</div>
							<div class="form-group col-md-4">
								<input type="button" class="btn btn-danger" value="Imprimir Ficha">
							</div>
							
						</div>
					   <!-- fim da sexta linha do form -->
					</form>
					 
				</div>
   <!-- fim das opções de cliente -->
	

