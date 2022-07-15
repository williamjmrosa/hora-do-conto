<?php
session_start();
include '../modelo/questao.class.php';
include '../dao/questaodao.class.php';
include_once '../dao/questionariodao.class.php';
include '../util/padronizacao.class.php';
include '../util/validacao.class.php';

if(isset($_GET['op']) && isset($_SESSION['privateUser'])){
	
	$OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
	
	switch ($OP) {
		
		
		//Cadastrar Questao
		case 1:
			
			$erro = array();
			
			if(!(isset($_POST['enunciado']) && isset($_POST['tipoQuestao']) && isset($_POST['resposta']) && isset($_POST['idConto']))){
				header('location:../index.php');
				break;
			}
			
			$enunciado = filter_var(@$_POST['enunciado'],FILTER_SANITIZE_STRING);
			if($enunciado == ""){
				$erro[] = 'Enunciado Inválido';
			}
			$tipoQuestao = filter_var(@$_POST['tipoQuestao'],FILTER_SANITIZE_NUMBER_INT);
			if(!filter_var($tipoQuestao,FILTER_VALIDATE_INT)){
				$erro[] = 'Tipo de questão Inválido';
			}
			
			$idConto = filter_var(@$_POST['idConto'],FILTER_SANITIZE_NUMBER_INT);
			if(!filter_var($tipoQuestao,FILTER_VALIDATE_INT)){
				$erro[] = 'ID conto inválido';
			}
			
			$resposta = @$_POST['resposta'];
			
			
			$alternativa = @$_POST['alternativa'];
			
			$_SESSION['tela'] = "questao";
			$_SESSION['id'] = $idConto;
			
			if (count($erro)==0) {
				$q = new Questao;
				$q->resposta = $tipoQuestao == 3? serialize($resposta):$resposta;
				$q->alternativa = serialize($alternativa);
				$q->tipo_questao = $tipoQuestao;
				$q->enunciado = $enunciado;
				$q->id_conto = $idConto;
				
				$qDAO = new QuestaoDAO;
				$qDAO->cadastrarQuestao($q);
				
				$_SESSION['msg'] = "Questão Cadastrado";
				header('location:../visao/area_dos_contos.php');
				
			}else{
				$_SESSION['erros'] = serialize($erro);
				header('location:../visao/area_dos_contos.php');
			}
			
			break;
			
			
			//Alterar Questao
		case 2:
			$erro = array();
			
			if(!(isset($_POST['enunciado']) && isset($_POST['tipoQuestao']) && isset($_POST['resposta']) && isset($_POST['idConto']))){
				header('location:../index.php');
				break;
			}
			
			$enunciado = filter_var(@$_POST['enunciado'],FILTER_SANITIZE_STRING);
			if($enunciado == ""){
				$erro[] = 'Enunciado Inválido';
			}
			$tipoQuestao = filter_var(@$_POST['tipoQuestao'],FILTER_SANITIZE_NUMBER_INT);
			if(!filter_var($tipoQuestao,FILTER_VALIDATE_INT)){
				$erro[] = 'Tipo de questão Inválido';
			}
			
			$idConto = filter_var(@$_POST['idConto'],FILTER_SANITIZE_NUMBER_INT);
			if(!filter_var($idConto,FILTER_VALIDATE_INT)){
				$erro[] = 'ID conto inválido';
			}
			
			$idQuestao = filter_var(@$_POST['idQuestao'],FILTER_SANITIZE_NUMBER_INT);
			if(!filter_var($idQuestao,FILTER_VALIDATE_INT)){
				$erro[] = 'ID questão inválido';
			}
			
			$resposta = @$_POST['resposta'];
			
			
			$alternativa = @$_POST['alternativa'];
			
			$_SESSION['tela'] = "questao";
			$_SESSION['id'] = $idConto;
			
			if (count($erro)==0) {
				$q = new Questao;
				$q->resposta = $tipoQuestao == 3? serialize($resposta):$resposta;
				$q->alternativa = serialize($alternativa);
				$q->tipo_questao = $tipoQuestao;
				$q->enunciado = $enunciado;
				$q->id_conto = $idConto;
				$q->id_questao = $idQuestao;
				
				$qDAO = new QuestaoDAO;
				$qDAO->alterarQuestao($q);
				
				$_SESSION['msg'] = "Questão Alterada";
				header('location:../visao/area_dos_contos.php');
				
			}else{
				$_SESSION['erros'] = serialize($erro);
				header('location:../visao/area_dos_contos.php');
			}
			
			break;
			
			//Excluir Questão
		case 3:
			
			$ID = filter_var(@$_GET['id_questao'],FILTER_SANITIZE_NUMBER_INT);
			$conto = filter_var(@$_GET['conto'],FILTER_SANITIZE_NUMBER_INT);
						
			$_SESSION['tela'] = "questao";
			$_SESSION['id'] = $conto;
			
			$qDAO = new QuestaoDAO;
			$qDAO->excluirQuestao($ID);
			
			$_SESSION['msg'] = "Questão Excluida com sucesso";
			header('location:../visao/area_dos_contos.php');
			
			break;
		//Buscar todas as questões
		case 4:
			$ID = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
			
			$qDAO = new QuestaoDAO;
			$questoes = $qDAO->buscarQuestoesConto($ID);
			
			$_SESSION['tela'] = "questionario";
			
			$_SESSION['id_conto'] = $ID;
			
			$_SESSION['questionario'] = serialize($questoes);
			header('location:../visao/area_dos_contos.php');
			
			break;
			//Buscar Questão
		case 5:
			$ID = filter_var($_GET['id_questao'],FILTER_SANITIZE_NUMBER_INT);
			
			$qDAO = new QuestaoDAO;
			
			$q = $qDAO->buscarQuestao($ID);
			
			$_SESSION['alterarQuestao'] = serialize($q);
			
			$_SESSION['tela'] = "questao";
			$_SESSION['id'] = $q->id_conto;
			
			print_r($q);
			
			//header('location:../visao/area_dos_contos.php');
			
			//volta a home
		default:
			header('location:../index.php');
			break;
	}
	
}else{
	header('location:../index.php');
}
?>