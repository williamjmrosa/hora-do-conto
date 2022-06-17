<?php
require_once '../persistencia/conexaobanco.class.php';

Class InstituicaoDAO{
	
	private $conexao = null;
	
	//Construtor
	public function __construct() {
		$this->conexao = ConexaoBanco::getInstancia();
	}
	
	//Cadastrar Instituiηγo
	public function cadastrarInstituicao($inst) {
		
		try {
			$stat = $this->conexao->prepare("INSERT INTO instituicao(cpf_cnpj,nome,email,contato,senha)values(?,?,?,?,?)");
			
			$stat->bindValue(1, $inst->cpf_cnpj);
			$stat->bindValue(2, $inst->nome);
			$stat->bindValue(3, $inst->email);
			$stat->bindValue(4, $inst->contato);
			$stat->bindValue(5, $inst->senha);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar instituiηγo! '. $exc;
		}//fecha catch
		
	}//fecha cadastrar instituiηγo
	
	//Login Instituiηγo
	public function verificarInstituicao($inst){
		try {
			$stat = $this->conexao->query("select * from professor where email = '$inst->email' and senha = '$inst->senha'");
			$instituicao = null;
			$instituicao = $stat->fetchObject('Instituicao');
			return $instituicao;
		} catch (PDOException $exc) {
			echo 'Erro ao verificar Instituiηγo! '.$exc;
		}//fecha catch.
	}
}
?>