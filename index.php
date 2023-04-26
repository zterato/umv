<?php
session_start();
include "layout/cabecalho.php";
include "layout/menu.php";
?>
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="img/banner/banner1.jpg" alt="Los Angeles" class="d-block img-banner" style="width:100%;">
  </div>
  <div class="carousel-item">
    <img src="img/banner/banner2.jpg" alt="Chicago" class="d-block img-banner" style="width:100%;">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>
<!-- fim banner-->
<!-- Inicio principais produtos -->
<section class="principais">
<div class="container-fluid" style="background: black; border-top: 3px solid white;">
  <div class="row">
	  <div class="col-6 col-md-2"></div>
      <div class="col-6 col-md-2">
          <a href="produtos1.php?classe=skincare"><img src="img/principais_1.png" class="img-info"></a>
      </div>
      <div class="col-6 col-md-2">
        <a href="produtos1.php?classe=linha premium"><img src="img/principais_2.png" class="img-info"></a>
      </div>
      <div class="col-6 col-md-2">
        <a href="produtos1.php?classe=labios"><img src="img/principais_3.png" class="img-info"></a>
        </div>
      <div class="col-6 col-md-2">
        <a href="produtos1.php?classe=face"><img src="img/principais_4.png" class="img-info"></a>
      </div>
      <div class="col-6 col-md-2"></div>
  </div>
</div>
</section>
<!-- fim principais produtos -->
<!-- Inicio Mais vendidos -->
<section class="vendidos" style="margin-top: 5%">
<div class="container">
  <div class="row">
      <div class="titulo">
      <h1>Os mais vendidos da loja!</h1>
      </div>
      <?php include "funcionalidades/prin_produtos.php" ?>
      <?php 
        if(mysqli_num_rows($result)>0){
          while($dados=mysqli_fetch_assoc($result)){
      ?> 
      <div class="col-6 col-md-3">
          <div class="prod">
          <img src="sistema/administrador/foto/<?php echo $dados['img1']; ?>" class="img-produto">
          <h4><?php echo $dados['nome']; ?></h4>
          <h2 class="text-prod"><?php echo $dados['valor_varejo']; ?></h2>
          <p><b>Até 3x Cartão</b></p>
          <?php echo "
								<a  href='produto.php?id=" . $dados['id_produto'] ."&valor=".$dados['valor_varejo']."'><button class='btn btn-outline-dark'>Adicionar à Sacola</button></a>
                ";
          ?>
          </div>
      </div>
      <?php      
          }
        }
      ?>
  </div>
</div>
</section>
<!-- fim do mais vendidos -->
<?php 
include "layout/rodape.php";
?>