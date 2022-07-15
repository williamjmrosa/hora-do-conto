<?php
session_start();
include '../modelo/professor.class.php';
include '../dao/professordao.class.php';
include '../util/padronizacao.class.php';
include '../util/seguranca.class.php';
include '../util/validacao.class.php';

//Verifica se tem uma op
if(isset($_GET['op'])){
	
	$OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
	
	switch ($OP) {
		//Cadastrar Professor
		case 1:
			if(!(isset($_POST['cpf-cnpj']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['contato']) && isset($_POST['senha']))){
				header('location:../index.php');
				break;
			}
			
			$erro = array();
			
			$cpf = filter_var(@$_POST['cpf-cnpj'],FILTER_SANITIZE_STRING);
			if(!Validacao::validarCPF($cpf)){
				$erro[] = '<br>CPF Inválido';
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
			if(!Validacao::validarSenha($senha)){
				$erro[] = '<br>Senha Inválida';
			}
			
			if (count($erro)==0) {
				$prof = new Professor();
				$prof->cpf_cnpj = Padronizacao::padronizarCPF($cpf);
				$prof->nome = Padronizacao::padronizarNome($nome);
				$prof->email = Padronizacao::padronizarEmail($email);
				$prof->contato = Padronizacao::padronizarContato($contato);
				$prof->senha = Seguranca::criptografar($senha);
				
				$profDAO = new ProfessorDAO;
				$profDAO->cadastrarProfessor($prof);
				
				$_SESSION['msg'] = "Professor Cadastrado";
				header('location:../visao/cadastre_se.php');
				
			}
			$_SESSION['erros'] = serialize($erro);
			header('location:../visao/cadastre_se.php');
			
		break;
		
		//Alterar Professor
		case 2:
			if(isset($_SESSION['AlterarCliente'])){
				
				$prof = unserialize($_SESSION['AlterarCliente']);
				unset($_SESSION['AlterarCliente']);
				$profDAO = new ProfessorDAO();
				$profDAO->alterarProfessor($prof);
				$_SESSION['msg'] = "Professor alterado com sucesso";
				$novoPrivate = $profDAO->verificarProfessor($prof);
				$_SESSION['privateUser'] = serialize($novoPrivate);
				$_SESSION['perfil'] = serialize($novoPrivate);
				
			}else{
				$erro = array();
				$erro[] = "sem professor pra alterar";
				$_SESSION['erros'] = serialize($erro);
				
			}
			$_SESSION['tela'] = "perfil";
			header("location: ../visao/area_dos_contos.php");
			break;
		//Volta a home
		default:
			header('location:../index.php');
		break;
	}
	
}else{
	header('location:../index.php');
}//fecha else

?>