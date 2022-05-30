<?php
session_start();
include '../modelo/aluno.class.php';
include '../dao/alunodao.class.php';

if(isset($_GET['op'])){

    switch ($_GET['op']) {
        
        
        //Cadastrar aluno
        case 1:
        
        $erro = array();
        
        if (count($erro)==0) {
            $al = new Aluno;
            $al->cpf_cnpj = $_POST['cpf-cnpj'];
            $al->nome = $_POST['nome'];
            $al->email = $_POST['email'];
            $al->senha = $_POST['senha'];
            
            $alDAO = new AlunoDAO;
            $alDAO->cadastrarAluno($al);
        
            $_SESSION['msg'] = "Aluno Cadastrado";
            header('location:../visao/cadastre_se.php');
            
        }
        $_SESSION['erros'] = serialize($erro);
        header('location:../visao/cadastre_se.php');
        
        break;
        
        //Alterar Aluno
        case 2:
            
        break;
        //volta a home
        default:
            header('location:../index.php');
        break;
    }

}else{
    
}
?>