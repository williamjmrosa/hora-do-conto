<?php
require_once '../persistencia/conexaobanco.class.php';

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
    
    //Login Aluno
    public function verificarAluno($al) {
    	try {
    		$stat = $this->conexao->query("select * from aluno where email = '$al->email' and senha = '$al->senha'");
    		$aluno = null;
    		$aluno = $stat->fetchObject('Aluno');
    		return $aluno;
    	} catch (PDOException $exc) {
    		echo 'Erro ao verificar Aluno! '.$exc;
    	}//Fecha catch
    }
    
}//Fecha classe
?>