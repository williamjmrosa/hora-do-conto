<?php
require_once '../persistencia/conexaobanco.class.php';
Class QuestaoDAO{
	
	private $conexao;

	//Construtor
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}
	
	//Cadastrar Questao
	public function cadastrarQuestao($q) {
		
		try {
			$stat = $this->conexao->prepare("INSERT INTO questao(id_questao, id_conto, resposta, alternativa, enunciado, tipo_questao)values(null,?,?,?,?,?)");
			$stat->bindValue(1, $q->id_conto);
			$stat->bindValue(2, $q->resposta);
			$stat->bindValue(3, $q->alternativa);
			$stat->bindValue(4, $q->enunciado);
			$stat->bindValue(5, $q->tipo_questao);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar Questao'.$exc;
		}
	}
	
	//Alterar Questão
	public function alterarQuestao($q){
		try {
			$stat = $this->conexao->prepare("UPDATE questao SET resposta = ?, alternativa = ?, enunciado = ?, tipo_questao = ? WHERE id_questao = ?");
			$stat->bindValue(1, $q->resposta);
			$stat->bindValue(2, $q->alternativa);
			$stat->bindValue(3, $q->enunciado);
			$stat->bindValue(4, $q->tipo_questao);
			$stat->bindValue(5, $q->id_questao);
						
			$stat->execute();
			//print_r($stat->errorInfo());
		} catch (PDOException $exc) {
			echo 'Erro ao Alterar questao Questao'.$exc;
		}
	}
	
	//Buscar questões de um conto
	public function buscarQuestoesConto($id) {
		try {
			$stat = $this->conexao->prepare("SELECT * FROM questao WHERE id_conto = ?");
			$stat->bindValue(1, $id);
			
			$stat->execute();
			
			$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Questao');
			
			return $array;
		} catch (PDOException $exc) {
			echo 'Erro ao buscar questões de um conto'.$exc;
		}
	}
	
	//Buscar questões por id
	public function buscarQuestao($id) {
		try {
			$stat = $this->conexao->prepare("SELECT * FROM questao WHERE id_questao = ?");
			$stat->bindValue(1, $id);
			
			$stat->execute();
			
			$questao = $stat->fetchObject('Questao');
			
			return $questao;
		} catch (PDOException $exc) {
			echo 'Erro ao buscar questão'.$exc;
		}
	}
	
	//Excluir questão
	public function excluirQuestao($id) {
		try {
			$quesDAO = new QuestionarioDAO();
			$quesDAO->excluirPeloIDQuestao($id);
			
			
			$stat = $this->conexao->prepare("DELETE FROM questao WHERE id_questao=?");
			$stat->bindValue(1, $id);
			
			$stat->execute();
						
			
		} catch (PDOException  $exc) {
			echo 'Erro ao excluir conto'.$exc;
		}
	}
	
}
?>