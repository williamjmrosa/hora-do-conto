<?php
Class Conto{
	
	//Atributo
	private $id_conto;
	private $video;
	private $titulo;
	
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
						Link do Video: $this->video
						Titulo do Conto: $this->conto");
	}
	
}
?>
