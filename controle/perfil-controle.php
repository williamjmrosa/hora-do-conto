<?php
session_start();
include '../modelo/aluno.class.php';
include '../modelo/professor.class.php';
include '../modelo/responsavel.class.php';
include '../modelo/instituicao.class.php';
include '../dao/responsaveldao.class.php';
include '../dao/professordao.class.php';
include '../dao/alunodao.class.php';
include '../dao/instituicaodao.class.php';
include '../util/seguranca.class.php';
include '../util/padronizacao.class.php';
include '../util/validacao.class.php';
if(isset($_SESSION['privateUser']) && isset($_SESSION['privateTipo']) && isset($_GET['op'])){
	
	$OP = filter_var($_GET['op'],FILTER_SANITIZE_NUMBER_INT);
	$Tipo = filter_var($_SESSION['privateTipo'],FILTER_SANITIZE_NUMBER_INT);
	$clientePrivado = unserialize($_SESSION['privateUser']);
	
	switch ($OP) {
			//Alterar Cliente
		case 1:
			$erro = array();
			
			if($Tipo == 1){
				$cliente = new Responsavel();
				$location = '../controle/responsavel-controle.php?op=2';
			}elseif($Tipo == 2){
				$cliente = new Aluno();
				$location = '../controle/aluno-controle.php?op=2';
			}elseif($Tipo == 3){
				$cliente = new Professor();
				$location = '../controle/professor-controle.php?op=2';
			}elseif($Tipo == 4){
				$cliente = new Instituicao();
				$location = '../controle/instituicao-controle.php?op=2';
			}else{
				
				$erro[] = "Acesso ilegal";
				$_SESSION['erros'] = serialize($erro);
				header("location: ../index.php");
			}
			
			if(!(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['contato']) && isset($_POST['senha']))){
				header('location:../index.php');
				break;
			}
			
			$nome = filter_var(@$_POST['nome'],FILTER_SANITIZE_STRING);
			if(!Validacao::validarNome($nome)){
				$erro[] = '<br>Nome Inválido';
			}
			$email = filter_var(@$_POST['email'],FILTER_SANITIZE_EMAIL);
			if(!Validacao::validarEmail($email)){
				$erro[] = '<br>E-mail Inválido';
			}
			$contato = filter_var(@$_POST['contato'],FILTER_SANITIZE_STRING);
			if(!Validacao::validarContato($contato)){
				$erro[] = '<br>Contato Inválido';
			}
			$senha = filter_var(@$_POST['senha'],FILTER_SANITIZE_STRING);
			if($senha != ""){
				if(!Validacao::validarSenha($senha)){
					$erro[] = '<br>Senha Inválida';
				}
			}
			$_SESSION['tela'] = 'perfil';
			if(count($erro) == 0){
				$cliente->cpf_cnpj = $clientePrivado->cpf_cnpj;
				$cliente->nome = Padronizacao::padronizarNome($nome);
				$cliente->email = Padronizacao::padronizarEmail($email);
				$cliente->contato = Padronizacao::padronizarContato($contato);
				$cliente->senha = $senha != ""? Seguranca::criptografar($senha):$clientePrivado->senha;
				
				$_SESSION['AlterarCliente'] = serialize($cliente);
				
				header("location: $location");
				break;
			}else{
				$_SESSION['erros'] = serialize($erro);
				header("location: ../controle/perfil-controle.php?op=2");
			}
			
			
			
			
			
		break;
			//Buscar Perfil
		case 2:
			
			if($Tipo == 1){
				$resDAO = new ResponsavelDAO();
				$cliente = $resDAO->buscarResponsavel($clientePrivado);
			}elseif($Tipo == 2){
				$aDAO = new AlunoDAO();
				$cliente = $aDAO->buscarAluno($clientePrivado);
			}elseif($Tipo == 3){
				$pDAO = new ProfessorDAO();
				$cliente = $pDAO->buscarProfessor($clientePrivado);
			}elseif($Tipo == 4){
				$insDAO = new InstituicaoDAO();
				$cliente = $insDAO->buscarProfessor($clientePrivado);
			}else{
				$_SESSION['erros'] = "Acesso ilegal";
				header("location: ../index.php");
			}
			
			$_SESSION['tela'] = "perfil";
			$_SESSION['perfil'] = serialize($cliente);
			header('location: ../visao/area_dos_contos.php');
		
		break;
		
		default:
			header("location: ../index.php");
		break;
	}
	
}else{
	$_SESSION['erros'] = "Você não tem acesso a essa area";
	header("location: ../index.php");
}
?>
