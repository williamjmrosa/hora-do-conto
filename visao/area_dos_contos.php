<?php
session_start ();
include '../util/controle-login.class.php';
if (! isset ( $_SESSION ['conto'] )) {
	header ( "location: ../controle/contos-controle.php?op=4" );
}

ControleLogin::verificarAcesso ();
if ($_SESSION ['privateTipo'] == 1) {
	// Responsavel
	include '../modelo/responsavel.class.php';
} else if ($_SESSION ['privateTipo'] == 2) {
	// Aluno
	include '../modelo/aluno.class.php';
} else if ($_SESSION ['privateTipo'] == 3) {
	// Professor
	include '../modelo/professor.class.php';
} else {
	// Instituição
}
$cli = unserialize ( $_SESSION ['privateUser'] );
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
							<img alt="" src="../img/person_outline.svg"> Bem-vindo, <?php echo $cli->nome?>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<li><a class="dropdown-item" href="#">Perfil</a></li>
							<li><a class="dropdown-item" id="criar-conto">Criar Conto</a></li>
							<li><a href="../controle/login-controle.php?op=2"
								class="dropdown-item">Sair</a></li>
						</ul>
						<a class="fonte" href="../controle/login-controle.php?op=2">Sair<img
							class="ms-2" alt="Sair" src="../img/inputsair.svg">
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Menu Lateral -->
	<div class="d-inline-block w-30" id="menuLateral"></div>
	<!-- Inicio entrada de conteudo -->
	<!-- Atividades -->
	<div id="atividades" class="d-inline-block align-top w-60"></div>

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
	<script type="text/javascript" src="../js/area-do-conto.js"></script>
	<script type="text/javascript">
	<?php
	if (isset ( $_SESSION ['tela'] )) {
		if ($_SESSION ['tela'] == 'questionario') {
			?>
			$("#atividades").load("../visao/questionario-conto.php");
		<?php
		} else {
			?>
			$("#atividades").load("../visao/criar-conto.php");
			<?php
		}
	} else {
		?>
					$("#atividades").load("../visao/home-hora-do-conto.php");
			<?php
	}
	?>
	</script>

</body>