<?php
require '../persistencia/conexaobanco.class.php';

Class AlunoDAO{
    
    private $conexao = null;
    
    //Construtor
    public function __construct(){
        $this->conexao = ConexaoBanco::getInstancia();
    }
    
    //Cadastrar Aluno
    public function cadastrarAluno($al){
        try {
        
            $stat = $this->conexao->prepare("INSERT INTO aluno(cpf_cnpj,nome,email,contato,senha)values(?,?,?,?,?)");
            
            $stat->bindValue(1, $al->cpf_cnpj);
            $stat->bindValue(2, $al->nome);
            $stat->bindValue(3, $al->email);
            $stat->bindValue(4, $al->contato);
            $stat->bindValue(5, $al->senha);
            
            $stat->execute();
        
        } catch (PDOException $exc) {
            echo 'Erro ao cadastrar aluno! ' . $exc;
        }//fecha catch
    }//fecha castrar aluno
    
}//Fecha classe
?>