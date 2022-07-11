<?php
Class RealizaQuestionario{
	
	private $questao;
	private $resposta;
	private $id_conto;
	private $cpf_aluno;
	
	public function __construct() {
	}
	
	public function __get($a) {
		return $this->$a;
	}
	
	public function __set($a,$v) {
		$this->$a = $v;
	}
	
	public function __toString() {
		return nl2br("ID Questão: $this->questao
						ID Conto: $this->id_conto
						CPF Aluno: $this->cpf_aluno");
	}
	
}
?>