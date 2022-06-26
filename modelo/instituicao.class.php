<?php
/**
 * @author Ana Ferreira
 *
 */
Class Instituicao{
    
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
    public function __get($i) {
        return $this->$i;
    }
    
    //Método SET
    public function __set($i,$v) {
        $this->$i = $v;
    }
    
    //Método toString
    public function __toString(){
        return nl2br("CNPJ Instituicao: $this->cpf_cnpj
                        Nome: $this->nome
                        E-mail: $this->email
                        Contato: $this->contato
                        Senha: $this->senha");
    }//fecha toString
    
}//fecha classe
?>