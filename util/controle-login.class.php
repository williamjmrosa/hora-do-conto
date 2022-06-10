<?php
include '../dao/alunodao.class.php';
include '../dao/professordao.class.php';
Class ControleLogin{
	public static function logar($cliente,$tipo) {
		switch ($tipo) {
			case 1:
				//Logar Responsavel
				
			break;
			case 2:
				//Login Aluno
				//include '';
				$alDAO = new AlunoDAO;
				$aluno = $alDAO->verificarAluno($cliente);
				
				if($aluno && !is_null($aluno)){
					//Foi encontrado aluno no banco
					$_SESSION['privateUser']=serialize($aluno);
					$_SESSION['privateTipo']= $tipo;
					//Direciona para areas dos contos
					header('location:../visao/area_dos_contos.php');
					
				}else{
					$_SESSION['msg'] = "email/senha inválido(s)";
					header('location:../visao/login.php');
				}
			break;
			
			case 3:
				//Login Professor
				//include '';
				$profDAO = new ProfessorDAO;
				$professor = $profDAO->verificarProfessor($cliente);
				
				if($professor && !is_null($professor)){
					//Foi encontrado professor no banco
					$_SESSION['privateUser']=serialize($professor);
					$_SESSION['privateTipo']= $tipo;
					//Direciona para areas dos contos
					header('location:../visao/area_dos_contos.php');
				}else{
					$_SESSION['msg'] = "email/senha inválido(s)";
					header('location:../visao/login.php');
				}
				
			break;
			
			default:
				
				header('location:../visao/login.php');
			break;
		}
		
	}
	
	public static function deslogar() {
		unset($_SESSION['privateUser']);
		unset($_SESSION['privateTipo']);
		$_SESSION['msg'] = 'Você foi deslogado!';
		header('location:../visao/index.php');
	}
	
	public static function verificarAcesso() {
		if(!isset($_SESSION['privateUser'])){
			$_SESSION['msg'] = 'Você precisa estar logado para ver este conteúdo!';
			header('location:../visao/index.php');
		}
	}
}
?>