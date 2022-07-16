<?php
session_start();
include '../modelo/instituicao.class.php';
include '../dao/instituicaodao.class.php';
include '../util/padronizacao.class.php';
include '../util/seguranca.class.php';
include '../util/validacao.class.php';

if(isset($_GET['op'])){
    
    $OP = filter_var(@$_REQUEST['op'],FILTER_SANITIZE_NUMBER_INT);
    
    switch ($OP) {
        
        
        //Cadastrar Instituição.
        case 1:
            
            $erro = array();
            
            if(!(isset($_POST['cpf-cnpj']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['contato']) && isset($_POST['senha']))){
                header('location:../index.php');
                break;
            }
            
            $cnpj = filter_var(@$_POST['cpf-cnpj'],FILTER_SANITIZE_STRING);
            if(!Validacao::validarCNPJ($cnpj)){
                $erro[] = '<br>CNPJ Inválido';
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
                $inst = new Instituicao;
                $inst->cpf_cnpj = Padronizacao::padronizarCNPJ($cnpj);
                $inst->nome = Padronizacao::padronizarNome($nome);
                $inst->email = Padronizacao::padronizarEmail($email);
                $inst->contato = Padronizacao::padronizarContato($contato);
                $inst->senha = Seguranca::criptografar($senha);
                
                $instDAO = new InstituicaoDAO();
                $instDAO->cadastrarInstituicao($inst);
                
                
                $_SESSION['msg'] = "Instituição Cadastrada.";
                header('location:../visao/cadastre_se.php');
                
            }
            $_SESSION['erros'] = serialize($erro);
            header('location:../visao/cadastre_se.php');
            
            
            break;
            
            
            //Alterar Instituição.
        case 2:
        	
        	if(isset($_SESSION['AlterarCliente'])){
        		
        		$inst = unserialize($_SESSION['AlterarCliente']);
        		unset($_SESSION['AlterarCliente']);
        		$instDAO = new InstituicaoDAO();
        		$instDAO->alterarInstituicao($inst);
        		$_SESSION['msg'] = "Instituição alterada com sucesso";
        		$novoPrivate = $instDAO->verificarInstituicao($inst);
        		$_SESSION['privateUser'] = serialize($novoPrivate);
        		$_SESSION['perfil'] = serialize($novoPrivate);
        		
        	}else{
        		$erro = array();
        		$erro[] = "sem instituicao pra alterar";
        		$_SESSION['erros'] = serialize($erro);
        		
        	}
        	$_SESSION['tela'] = "perfil";
        	header("location: ../visao/area_dos_contos.php");
            
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