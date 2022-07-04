<?php
session_start();
include '../modelo/questao.class.php';
include '../dao/questaodao.class.php';
include '../util/padronizacao.class.php';
include '../util/validacao.class.php';

if(isset($_GET['op']) && @$_SESSION['privateTipo'] == 3){
	
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