<?php 
include '../controle/auth.php';
?>
<?php 
include '../layout/cabecalho.php';
include '../layout/menuadm.php';
	$id_produto = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
?>
	<!-- opções de cliente -->
	<div class="container">
					<form action="proc_upload_produto.php" method="post"  enctype="multipart/form-data">
					    <!-- primeira linha do form -->
					    <br><br>
					    <center><h3>Cadastro de imagem do Produto</h3></center><br>
					    
						<div class="form-row">
							<div class="form-group col-md-4">
								<font style="color: red">*</font><input type="text" class="form-control" name="id_produto" placeholder="Código do Produto:" value="<?php echo $id_produto; ?>">
							</div>
							
						</div>
						<!-- fim da primeira linha do form -->
						
				         <div class="form-row">
				        	<div class="form-group col-md-6">
				        	    Adicione a foto
				        		<input type="file" name="arquivo" class="form-control-file" placeholder="Adicione a foto" id="upload">
				        		<img id="img" width="40%">
				        		<script>
                                $(function(){
                                  $('#upload').change(function(){
                                    const file = $(this)[0].files[0]
	                                const fileReader = new FileReader()
	                                fileReader.onloadend = function(){
		                                $('#img').attr('src', fileReader.result)
	                                }
	                                fileReader.readAsDataURL(file)
                                  })
                                })
                                </script>
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
	

