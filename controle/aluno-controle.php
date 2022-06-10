<?php
session_start();
include '../modelo/aluno.class.php';
include '../dao/alunodao.class.php';
include '../util/padronizacao.class.php';
include '../util/seguranca.class.php';
include '../util/validacao.class.php';

if(isset($_GET['op'])){

    $OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
    
    switch ($OP) {
        
        
        //Cadastrar aluno
        case 1: 	
        	
        $erro = array();
        
        if(!(isset($_POST['cpf-cnpj']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['contato']) && isset($_POST['senha']))){
        	header('location:../index.php');
        	break;
        }
        
        $cpf = filter_var(@$_POST['cpf-cnpj'],FILTER_SANITIZE_STRING);
        if(!Validacao::validarCPF($cpf)){
            $erro[] = '<br>CPF Inválido';
        }
        $nome = filter_var(@$_POST['nome'],FILTER_SANITIZE_STRING);
        if(!Validacao::validarNome($nome)){
            $erro[] = '<br>Nome Inválido';
        }
        $email = filter_var(@$_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!Validacao::validarEmail($email)){
            $erro[] = '<br>E-mail Inválido';
        }
        $contato = filter_var(@$_POST['contato'],FILTER_SANITIZE_STRING);
        if(!Validacao::validarContato($contato)){
        	$erro[] = '<br>Contato Inválido';
        }
        $senha = filter_var(@$_POST['senha'],FILTER_SANITIZE_STRING);
        if(!Validacao::validarSenha($senha)){
        	$erro[] = '<br>Senha Inválida';
        }
        
        if (count($erro)==0) {
            $al = new Aluno;
            $al->cpf_cnpj = Padronizacao::padronizarCPF($cpf);
            $al->nome = Padronizacao::padronizarNome($nome);
            $al->email = Padronizacao::padronizarEmail($email);
            $al->contato = Padronizacao::padronizarContato($contato);
            $al->senha = Seguranca::criptografar($senha);
            
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
    header('location:../index.php');
}
?>