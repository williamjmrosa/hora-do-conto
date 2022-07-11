<?php
//session_start();
include '../modelo/questao.class.php';
include '../modelo/realizaquestionario.class.php';
include '../dao/questionariodao.class.php';
include '../dao/questaodao.class.php';
include '../modelo/aluno.class.php';

if(isset($_SESSION['privateUser']) && $_GET['op']){
	$OP = filter_var($_GET['op'],FILTER_SANITIZE_STRING);
	
	$aluno = unserialize($_SESSION['privateUser']);
	
	switch ($OP) {
		case 1:
		
			$erro = array();
			
			if(!isset($_POST['resposta']) && !isset($_POST['conto'])){
				//header('location: ../visao/area_dos_contos.php');
				break;
			}
			
			$conto = filter_var($_POST['conto'],FILTER_SANITIZE_NUMBER_INT);
			
			$respostas = array();
			//print_r($_POST['resposta']);
			foreach ($_POST['resposta'] as $chave=>$r){
				
				if(is_array($r)){
					foreach ($r as $al){
						$respostas[$chave][] = filter_var($al,FILTER_SANITIZE_NUMBER_INT);
						
					}//fecha foreach
					//print_r($resposta[$chave]);
				}else{
						$respostas[$chave] = filter_var($r,FILTER_SANITIZE_STRING);
						if($respostas[$chave] == ""){
							$erro[] = 'Uma Resposta está em branco';
						}//fecha if
				}//fecha else
			}//fecha foreach
			
			if(count($erro) == 0){
				$qDAO = new QuestionarioDAO;
				foreach ($respostas as $chave=>$res) {
					
					$q = new RealizaQuestionario;
					
					if(is_array($res)){
						$q->resposta = implode(",", $res);
					}else{
						$q->resposta = $res;
					}
					
					$q->questao = $chave;
					$q->id_conto = $conto;
					$q->cpf_aluno = $aluno->cpf_cnpj;
				
					
					
					$qDAO->cadastrarRealiza($q);
					
				}
				
				$_SESSION['msg'] = 'Questionario respondido';
							
			}else{
				$_SESSION['erros'] = $erro;
			}
			$_SESSION['tela'] = 'questionario';
			
			header('location: ../visao/area_dos_contos.php');
			
			
		break;
		
		default:
			;
		break;
	}
	
}else{
	header('location: ../visao/area_dos_contos.php');
}

?>