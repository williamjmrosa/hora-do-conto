<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Hora do Conto</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../CSS/styles.css">
<link rel="icon" type="image/jpg" href="../img/Logo1.png" />

<!-- Bootstrap CSS-->
<link rel="stylesheet" href="../Framework/css/bootstrap.min.css">

</head>
<body class="fundo">
	<header class="p-3 primaria fonte mb-2">

		<!-- Menu Superior -->
		<div class="m-0">
			<div
				class="d-flex flex-wrap align-items-center justify-content-center">
				<a href="index.php"
					class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
					<img class="me-4 tamanho" alt="Hora do conto"
					src="../img/logo1.png">
				</a>

				<ul
					class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a class="fonte me-3" href="../visao/sobre.php">Sobre Nós</a>
					
					<li><a class="fonte me-3" href="../visao/sorvicos.php">Serviços</a></li>
					<li><a class="fonte me-3" href="../visao/contato.php">Contato</a></li>
				</ul>

				<div class="text-end">
					<a href="../visao/cadastre_se.php" class="btn secundaria me-3 fonte">Cadastre-se</a>
					<a href="../visao/login.php" class="btn secundaria fonte">Acessar</a>
				</div>
			</div>
		</div>
	</header>

	<div class="align-middle container d-flex justify-content-center mb-5 mt-5">
		<form class="fundo-branco w-75 rounded-3 fonte-cinza" method="POST" action="../controle/login-controle.php?op=1">
			<?php 
			if(isset($_SESSION['msg'])){?>
    		<div class="alert alert-danger m-2" role="alert"> <p><?php echo $_SESSION['msg']; ?></p></div>
    		<?php unset($_SESSION['msg']);}?>
			<h1 class="fonte-secundaria text-secundaria text-center">Entrar</h1>
			<div class="text-center mb-3 mt-4">
				<div class="form-check form-check-inline fonte-cinza">
					<input class="form-check-input" type="radio" name="tipoLogin" id="exampleRadios1" value="1" checked>
					<label class="form-check-label" for="exampleRadios1">Responsavel</label>
				</div>
				<div class="form-check form-check-inline fonte-cinza">
					<input class="form-check-input" type="radio" name="tipoLogin" id="exampleRadios2" value="2">
					<label class="form-check-label" for="exampleRadios2">Aluno</label>
				</div>
				<div class="form-check form-check-inline fonte-cinza">
					<input class="form-check-input" type="radio" name="tipoLogin" id="exampleRadios3" value="3">
					<label class="form-check-label" for="exampleRadios3">Professor</label>
				</div>
				<div class="form-check form-check-inline fonte-cinza">
					<input class="form-check-input" type="radio" name="tipoLogin" id="exampleRadios3" value="4">
					<label class="form-check-label" for="exampleRadios3">Instituição</label>
				</div>
			</div>
				
			<div class="mb-3 centralizar">
				<label for="email" class="form-label fonte-cinza">Email</label>
				<input type="email" name="email" class="form-control" id="email">
			</div>
			<div class="mb-3 centralizar">
				<label for="senha" class="form-label fonte-cinza">Senha</label>
				<input type="password" name="senha" class="form-control"
					id="senha">
				<div id="esqueceusenha" class="form-text">Esqueceu sua senha? <a href="#" class="text-secundaria text-decoration-underline">Recuperar</a></div>
			</div>
			<div class="container mb-4 text-center">
				<button type="submit" class="btn secundaria fonte fs-3 pe-5 ps-5 ">Entrar</button>
				<div id="esqueceusenha" class="form-text mb-5 mt-5">Não possui uma conta? <a href="../visao/cadastre_se.php" class="text-secundaria text-decoration-underline">Cadastre-se</a></div>
			</div>

		</form>
	</div>
	<footer class="primaria mt-4 pt-4">
		<div class="ms-4 fonte d-inline-block">
			<h4 class="mb-2">Nossos Planos</h4>
			<p>Alunos</p>

			<p>Instituições</p>

			<p>Professores</p>
		</div>
		<div class="ms-5 fonte d-inline-block align-top">
			<h4 class="mb-2">Contato</h4>
			<p>(51) 3333-3333</p>
			<p>Canoas</p>

		</div>
		<div class="text-center d-inline-block align-center w-50 mb-5">
			<h4>Acompanhe nossas redes!</h4>
			<a class="me-3"><img alt="FB" src="../img/fb.svg"> </a> <a
				class="me-3"><img alt="Google" src="../img/google.svg"> </a> <a
				class="me-3"><img alt="Twitter" src="../img/twitter.svg"> </a> <a
				class="me-3"><img alt="Linkedin" src="../img/linkedin.svg"> </a> <a
				class="me-3"><img alt="Instagram" src="../img/instagram.svg"> </a>
		</div>
	</footer>
	<!-- JavaScript -->
	<script src="../Framework/js/popper.min.js"></script>
	<script src="../Framework/js/bootstrap.min.js"></script>
	<!-- JQuery -->
	<script src="../Framework/jquery-3.6.0.min.js"></script>
</body>