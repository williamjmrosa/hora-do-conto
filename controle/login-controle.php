<?php
session_start();
include '../util/seguranca.class.php';
include '../util/controle-login.class.php';
include '../modelo/aluno.class.php';
include '../modelo/professor.class.php';
include '../modelo/responsavel.class.php';

if (isset($_GET['op'])) {
	$OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
	
	switch ($OP) {
		//Login
		case 1:
			$email = filter_var(@$_POST['email'],FILTER_SANITIZE_STRING);
			$senha = filter_var(@$_POST['senha'],FILTER_SANITIZE_STRING);
			$tipo = filter_var(@$_POST['tipoLogin'],FILTER_SANITIZE_NUMBER_INT);
			$senha = Seguranca::criptografar($senha);
			$cliente = null;
			
			if($tipo == 1){
				$cliente = new Responsavel;
			}else if($tipo == 2){
				$cliente = new Aluno;
			}else if($tipo == 3){
				$cliente = new Professor;
			}else{
				
			}
			$cliente->email = $email;
			$cliente->senha = $senha;
			
			ControleLogin::logar($cliente, $tipo);
		break;
		
		case 2:
			ControleLogin::deslogar();
		break;
		
		default:
			header('location:../visao/index.php');
		break;
	}
}else{
	header('location:../visao/index.php');
}

?>