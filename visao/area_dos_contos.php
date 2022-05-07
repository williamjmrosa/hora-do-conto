<?php
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
<body class="primaria">
	<header class="p-3 primaria fonte mb-2">

		<!-- Menu Superior -->
		<div class="m-0">
			<div class="m-0">
				<a class="d-inline-block w-25" href="index.php"
					class="mb-2 mb-lg-0 text-decoration-none"> <img
					class="me-4 tamanho" alt="Hora do conto" src="../img/logo1.png">
				</a>

				<div class="text-end d-inline-block float-end">
					<div class="dropdown">
						<button class="btn fonte dropdown-toggle" type="button"
							id="dropdownMenuButton1" data-bs-toggle="dropdown"
							aria-expanded="false">
							<img alt="" src="../img/person_outline.svg"> Bem-vindo, Teste!
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
						<a class="fonte" href="#">Sair<img class="ms-2" alt="Sair"
							src="../img/inputsair.svg">
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Menu Lateral -->
	<div class="d-inline-block">
		<div class="d-flex flex-column flex-shrink-0 p-0 text-white terciaria"
			style="width: auto;">
			<a href="../visao/area_dos_contos.php"
				class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
				<img class="w-100" alt="Hora do Conto" src="../img/logo2.svg">
			</a> <input type="text" placeholder="Pesquisar..."
				class="perquisar border-0 border-bottom bg-transparent border-dark mb-4 m-3">

			<ul id="menu-lateral"
				class="nav nav-pills flex-column mb-auto menu-lateral pb-2">
				<li class="nav-item"><a href="#" class="nav-link text-white abrir"
					aria-current="page">Atividade</a>
					<ul class="list-unstyled ">
						<li class="mb-2"><a class="text-secundaria ms-4" href="">Conto 1:
								Teste</a></li>
						<li class="mb-2"><a class="text-secundaria ms-4 " href="">Atividade</a></li>
					</ul></li>
				<li><a href="#" class="nav-link text-white abrir">Atividade 2</a>
					<ul class="list-unstyled ">
						<li class="mb-2"><a class="text-secundaria ms-4" href="">Conto 1:
								Teste</a></li>
						<li class="mb-2"><a class="text-secundaria ms-4 " href="">Atividade</a></li>
					</ul></li>
				<li><a class="nav-link text-white abrir" href="#"
					class="nav-link text-white">Atividade 3</a></li>
				<li><a class="nav-link text-white abrir" href="#"
					class="nav-link text-white">Atividade 4</a></li>
				<li><a class="nav-link text-white abrir" href="#"
					class="nav-link text-white">Atividade 5</a></li>
			</ul>
		</div>
	</div>
	<!-- Inicio entrada de conteudo -->
	<!-- Atividades -->
	<div class="d-inline-block align-top ms-4 me-4">
		<iframe width="560" height="315"
			src="https://www.youtube.com/embed/nEK9EO7hl6Q"
			title="YouTube video player" frameborder="0"
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen></iframe>
		<div class="d-inline-block align-top text-center terciaria">
			<h4 class="text-center">Anotações</h4>
			<textarea class="rounded ms-3 me-3 mb-2" rows="15" cols="40"></textarea>
		</div>
		<hr style="border: 2px solid #FFB82F;">
		<form action="">
		<h3>Comentários e Duvidas</h3>
		<textarea id="comentario" name="comentario" class="textarea-fundo" rows="5" cols="120"></textarea>
		<div class="text-end">
			<a class="btn fonte secundaria ps-5 pe-5">Enviar</a>
		</div>
		</form>
		
	</div>

	<!-- Fim entrada de conteudo -->
	<footer class="primaria mt-4 pt-4">
		<div class="text-center d-inline-block align-center w-100 mb-5">
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
	<!-- JavaScript -->
	<script type="text/javascript" src="../Framework/menuLateral.js"></script>
</body>