<?php
/**
 * @author Guilherme Ajalla
 *
 */
Class Responsavel{
    
    //Atributo
    private $cpf_cnpj;
    private $nome;
    private $email;
    private $contato;
    private $senha;
    
    //Construtor
    public function __construct() {
    }//fecha construtor
    
    //Método GET
    public function __get($r) {
        return $this->$r;
    }
    
    //Método SET
    public function __set($r,$v) {
        $this->$r = $v;
    }
    
    //Método toString
    public function __toString(){
        return nl2br("CPF Responsavel: $this->cpf_cnpj
                        Nome: $this->nome
                        E-mail: $this->email
                        Contato: $this->contato
                        Senha: $this->senha");
    }//fecha toString
    
}//fecha classe
?>