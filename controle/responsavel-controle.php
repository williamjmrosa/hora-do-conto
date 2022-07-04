<?php
/**
 * @author Guilherme Ajalla
 *
 */
session_start();
include '../modelo/responsavel.class.php';
include '../dao/responsaveldao.class.php';
include '../util/padronizacao.class.php';
include '../util/seguranca.class.php';
include '../util/validacao.class.php';

//Verifica se tem uma op
if(isset($_GET['op'])){
	
	$OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
	
	switch ($OP) {
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
				$resp = new Responsavel();
				$resp->cpf_cnpj = Padronizacao::padronizarCPF($cpf);
				$resp->nome = Padronizacao::padronizarNome($nome);
				$resp->email = Padronizacao::padronizarEmail($email);
				$resp->contato = Padronizacao::padronizarContato($contato);
				$resp->senha = Seguranca::criptografar($senha);
				
				$respDAO = new ResponsavelDAO;
				$respDAO->cadastrarResponsavel($resp);
				
				$_SESSION['msg'] = "Responsavel Cadastrado";
				header('location:../visao/cadastre_se.php');
				
			}
			$_SESSION['erros'] = serialize($erro);
			header('location:../visao/cadastre_se.php');
			
		break;
		
		//Alterar Responsavel
		case 2:
			
		//Volta a home
		default:
			header('location:../index.php');
		break;
	}
	
}else{
	header('location:../index.php');
}//fecha else

?>