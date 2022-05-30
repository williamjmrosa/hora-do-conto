<?php session_start();?>
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
					<a class="btn secundaria fonte" href="../visao/login.php">Acessar</a>
				</div>
			</div>
		</div>
	</header>
	<!-- Inicio entrada de conteudo -->	
		<div class="d-flex justify-content-center mb-5 mt-5">
		
		<form method="POST" action="../controle/aluno-controle.php?op=1" class="fundo-branco w-50 rounded-3">
			<?php 
            if (isset($_SESSION['msg'])){
    		?>
    		<div class="alert alert-danger m-2" role="alert"> <p><?php echo $_SESSION['msg']; ?></p></div>
    		<?php }
    		unset($_SESSION['msg']);
    		?>
			<div class="centralizar mb-2">
				<h1 class="text-secundaria fonte text-center mt-3">Cadastre-se</h1>
    			<label>Eu sou</label>
    			<select name="tipo" class="form-select" aria-label="Default select example">
                    <option selected>Selecione</option>
                    <option value="1">Responsavel</option>
                    <option value="2">Aluno</option>
                	<option value="3">Professor</option>
                	<option value="4">Instituição</option>
                </select>
			</div>
			<div class="centralizar mb-2">
				<div class="input-group flex-nowrap">
                	<span class="input-group-text" id="nome">Nome</span>
					<input type="text" name="nome" class="form-control" placeholder="Nome Completo" aria-label="Nome Completo" aria-describedby="nome">
                </div>
			</div>
			<div class="centralizar mb-2">
				<div class="input-group flex-nowrap">
                	<span class="input-group-text" id="cpf">CPF/CNPJ</span>
					<input type="text" name="cpf-cnpj" class="form-control" placeholder="CPF/CNPJ" aria-describedby="cpf">
                </div>
			</div>
			<div class="centralizar mb-2">
				<div class="input-group flex-nowrap">
                	<span class="input-group-text" id="email">Email</span>
					<input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email">
                </div>
			</div>
			<div class="centralizar mb-2">
				<div class="input-group flex-nowrap">
                	<span class="input-group-text" id="senha">Senha</span>
					<input type="password" name="senha" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="senha">
                </div>
			</div>
			<div class="container mb-4 text-center mt-4">
				<button type="submit" class="btn secundaria fonte fs-3 pe-5 ps-5 ">Cadastrar</button>
				<div id="esqueceusenha" class="form-text mb-5 mt-5">Já possui uma conta? <a href="../visao/login.php" class="text-secundaria text-decoration-underline">Entrar</a></div>
			</div>
			
		</form>
		</div>
	
	<!-- Fim entrada de conteudo -->
	
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
		<a class="me-3"><img alt="FB" src="../img/fb.svg"> </a>
		<a class="me-3"><img alt="Google" src="../img/google.svg"> </a>
		<a class="me-3"><img alt="Twitter" src="../img/twitter.svg"> </a>
		<a class="me-3"><img alt="Linkedin" src="../img/linkedin.svg"> </a>
		<a class="me-3"><img alt="Instagram" src="../img/instagram.svg"> </a>
		</div>
	</footer>
	<!-- JavaScript -->
	<script src="../Framework/js/popper.min.js"></script>
	<script src="../Framework/js/bootstrap.min.js"></script>
	<!-- JQuery -->
	<script src="../Framework/jquery-3.6.0.min.js"></script>
</body>