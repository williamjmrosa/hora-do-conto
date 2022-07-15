<?php

require_once '../persistencia/conexaobanco.class.php';

Class QuestionarioDAO{

	private $conexao = null;
	
	public function __construct() {
		$this->conexao = ConexaoBanco::getInstancia();
	}
	
	//Cadastrar questão realizada
	public function cadastrarRealiza($que){
		
		try {
			
			$stat = $this->conexao->prepare("INSERT INTO realiza(questao,resposta,id_conto,cpf_aluno)values(?,?,?,?)");
			
			$stat->bindValue(1, $que->questao);
			$stat->bindValue(2, $que->resposta);
			$stat->bindValue(3, $que->id_conto);
			$stat->bindValue(4, $que->cpf_aluno);
			
			$stat->execute();
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar realiza '.$exc;
		}
	}
	
	//Buscar questões por conto e aluno
	public function buscarQuestoesContoAluno($id_questao,$cpf) {
		try {
			
			$stat = $this->conexao->prepare("SELECT * FROM realiza WHERE questao = ? AND cpf_aluno = ?");
			$stat->bindValue(1, $id_questao);
			$stat->bindValue(2, $cpf);
			
			$stat->execute();
			
			$realiza = $stat->fetchObject('RealizaQuestionario');
			return $realiza;
			
		} catch (PDOException $exc) {
			echo 'Erro ao buscar questões realizadas '.$exc;
		}
	}
	
	//Excluir todas as questões pelo id_conto
	public function excluirPeloIDConto($id) {
		
		try {
			
			$stat = $this->conexao->prepare("DELETE FROM realiza WHERE id_conto = ?");
			$stat->bindValue(1, $id);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo "Erro ao excluir questão pelo ID Conto. ".$exc;
		}
		
	}
	
	//Excluir todas as questões pelo questao
	public function excluirPeloIDQuestao($id) {				
	
		try {
			
			$stat = $this->conexao->prepare("DELETE FROM realiza WHERE questao = ?");
			$stat->bindValue(1, $id);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo "Erro ao excluir questão pelo ID Questao. ".$exc;
		}
		
	}
	
}

?>