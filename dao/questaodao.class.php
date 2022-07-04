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
	
}
?>