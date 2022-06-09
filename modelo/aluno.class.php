<?php
/**
 * @author William José
 *
 */
Class Aluno{
    
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
    public function __get($a) {
        return $this->$a;
    }
    
    //Método SET
    public function __set($a,$v) {
        $this->$a = $v;
    }
    
    //Método toString
    public function __toString(){
        return nl2br("CPF Aluno: $this->cpf_cnpj
                        Nome: $this->nome
                        E-mail: $this->email
                        Contato: $this->contato
                        Senha: $this->senha");
    }//fecha toString
    
}//fecha classe
?>