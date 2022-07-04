<?php
session_start();
include '../modelo/conto.class.php';
include '../modelo/professor.class.php';
include '../dao/contodao.class.php';
include '../util/padronizacao.class.php';
include '../util/validacao.class.php';

if(isset($_GET['op']) && @$_SESSION['privateTipo'] == 3){
	
	$OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
	
	$prof = unserialize($_SESSION['privateUser']);
	
	switch ($OP) {
		
		
		//Cadastrar aluno
		case 1:
			
			$erro = array();
			
			if(!(isset($_POST['link']) && isset($_POST['titulo']))){
				header('location:../index.php');
				break;
			}
			
			$titulo = filter_var(@$_POST['titulo'],FILTER_SANITIZE_STRING);
			if($titulo == ""){
				$erro[] = '<br>Titulo Inválido';
			}
			$link = filter_var(@$_POST['link'],FILTER_SANITIZE_URL);
			if(!filter_var($link,FILTER_VALIDATE_URL)){
				$erro[] = '<br>Nome Inválido';
			}
			
			if (count($erro)==0) {
				$c = new Conto;
				$c->titulo = $titulo;
				$c->video = $link;
				
				$cDAO = new ContoDAO;
				$cDAO->cadastrarContos($c,$prof->cpf_cnpj);
				
				$_SESSION['msg'] = "Conto Cadastrado";
				header('location:../visao/area_dos_contos.php');
				
			}else{
				$_SESSION['erros'] = serialize($erro);
				header('location:../visao/area_dos_contos.php');
			}
			
			break;
			
			
			//Alterar Contos
		case 2:
			
			break;
		//volta a home
		default:
			header('location:../index.php');
			break;
	}
	
}else{
	header('location:../index.php');
}
?>