<?php
require_once '../persistencia/conexaobanco.class.php';
include_once '../dao/questaodao.class.php';

Class ContoDAO{
	
	private $conexao = null;
	
	//Construtor
	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}
	
	//Cadastrar Conto
	public function cadastrarConto($conto){
		try {
			
			$stat = $this->conexao->prepare("INSERT INTO conto(id_conto,video,titulo) values(null,?,?)");
			
			$stat->bindValue(1, $conto->video);
			$stat->bindValue(2, $conto->titulo);
			
			$stat->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar conto '. $exc;
		}
	}
	
	//Cadastrar Contos de 1 Professor
	public function cadastrarContos($conto,$ID){
		try {
			
			$ID_CONTO = ContoDAO::cadastrarConto($conto);
			
			$stat = $this->conexao->prepare("INSERT INTO contos(cpf_professor,id_conto) values(?,?)");
			
			$stat->bindValue(1, $ID);
			$stat->bindValue(2, $ID_CONTO);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar conto'.$exc;
		}
	}
	
	public function excluirConto($ID){
		try {
			
			$qDAO = new QuestaoDAO();
			$qDAO->excluirQuestaoIDConto($ID);
			
			$stat = $this->conexao->prepare("DELETE FROM contos WHERE id_conto = ?");
			$stat->bindValue(1, $ID);
			
			$stat->execute();
				
			
		} catch (PDOException $exc) {
			echo 'Erro ao excluir conto '.$exc;
		
		}
	}
	
	//Buscar lista de contos professor
	public function buscarContosProfessor($prof){
		
		try {
			$stat = $this->conexao->prepare("SELECT c.id_conto, video, titulo  FROM conto c INNER JOIN contos cs on c.id_conto = cs.id_conto WHERE cs.cpf_professor = ?;");
			$stat->bindValue(1, $prof->cpf_cnpj);
			
			$stat->execute();
			
			$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Conto');
			
			return $array;
		} catch (PDOException $exc) {
			echo 'Erro ao Buscar lista de contos';
		}
		
	}
	
	//Listar todos os contos
	public function listarContos(){
		try {
			$stat = $this->conexao->prepare("SELECT * FROM conto");
			$stat->execute();
			
			$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Conto');
			
			return $array;
			
		} catch (PDOException $exc) {
			echo 'Erro ao listar contos';
		}
	}
	
	//Buscar conto
	public function buscarConto($id){
		try {
			$stat = $this->conexao->prepare("SELECT * FROM conto WHERE id_conto = ?");
			$stat->bindValue(1, $id);
			$stat->execute();
			
			$conto = $stat->fetchObject('Conto');
			
			return $conto;
		} catch (PDOException $exc) {
			echo 'Erro ao buscar conto '.$exc;
		}
	}
	
	
	//Buscar conto home
	public function buscarContoHome(){
		try {
			$stat = $this->conexao->prepare("SELECT * FROM conto LIMIT 1");
			$stat->execute();
			
			$conto = $stat->fetchObject('Conto');
			return $conto;
			
		} catch (PDOException $exc) {
			echo 'Erro ao buscar conto home '.$exc;
		}
	}
	
}

?>