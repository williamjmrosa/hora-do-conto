<?php

Class Questao{
	
	//Atributos
	private $id_questao;
	private $id_conto;
	private $resposta;
	private $alternativa;
	private $enunciado;
	private $tipo_questao;
	
	//Contrutor
	public function __construct() {
	}//fecha construtor
	
	//Método GET
	public function __get($a){
		return $this->$a;
	}
	
	//Método SET
	public function __set($a,$v){
		$this->$a = $v;
	}
	
	//Método toString
	public function __toString(){
		return nl2br("ID Conto:$this->id_conto
						ID Questão: $this->id_questao
						Resposta: $this->resposta
						Alternativas: $this->alternativa
						Enunciado: $this->enunciado
						Tipo Questão: $this->tipo_questao");
	}
	
}

?>