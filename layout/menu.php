<!-- Area Menu Responsivo -->
<nav class="navbar navbar-expand-lg navbar-dark bg" style="background: black; color:white; position: fixed; width: 100%; z-index: 3;">
	  <div class="container-fluid">
	  <a class="link-logo" href=""><img src="img/logos/logo.png" class="img-logo"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="produtos1.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Produtos
			  </a>
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			  	<li><a class="dropdown-item" href="produtos.php">Todos os Produtos</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=camisas">Camisas</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=sapatos">Sapatos</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=tenis">Tênis</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=vestidos">Vestidos</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=acessorios">Acessórios</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=bermudas">Bermudas</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=macacoes">Macacões</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=Sandalias">Sandálias</a></li>	
				<li><a class="dropdown-item" href="produtos1.php?classe=Moda Feminina">Moda Feminina</a></li>
				<li><a class="dropdown-item" href="produtos1.php?classe=Moda Masculina">Moda Masculina</a></li>	
			  </ul>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="promocoes.php">Promoções</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="https://wa.me/5521988416190">Contato</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="login.php">Login</a>
			</li>
		  </ul>
		  <form class="d-flex">
			<input class="form-control me-2" type="search" placeholder="Pesquisar Produtos:" aria-label="Search">
			<button class="btn btn-outline-light" type="submit">Pesquisar</button>
		  </form>
		</div>
		<a class="link-carrinho" href="carrinho.php"><img src="img/carrinho-branco.png" class="img-carrinho"></a>
	  </div>
	</nav>
	<!-- fim menu responsivo -->