<?php
/**
 * @author Guilherme Ajalla
 *
 */
require_once '../persistencia/conexaobanco.class.php';

Class ResponsavelDAO{
	
	private $conexao = null;
	
	//Construtor
	public function __construct() {
		$this->conexao = ConexaoBanco::getInstancia();
	}
	
	//Cadastrar Responsavel
	public function cadastrarResponsavel($resp) {
		
		try {
			$stat = $this->conexao->prepare("INSERT INTO responsavel(cpf_cnpj,nome,email,contato,senha)values(?,?,?,?,?)");
			
			$stat->bindValue(1, $resp->cpf_cnpj);
			$stat->bindValue(2, $resp->nome);
			$stat->bindValue(3, $resp->email);
			$stat->bindValue(4, $resp->contato);
			$stat->bindValue(5, $resp->senha);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar o responsavel! '. $exc;
		}//fecha catch
		
	}//fecha cadastrar responsavel
	
	//Alterar Responsavel
	public function alterarResponsavel($res) {
		
		try {
			
			$stat = $this->conexao->prepare("UPDATE responsavel SET nome = ?, email = ?, contato = ?, senha = ? WHERE cpf_cnpj = ?");
			$stat->bindValue(1, $res->nome);
			$stat->bindValue(2, $res->email);
			$stat->bindValue(3, $res->contato);
			$stat->bindValue(4, $res->senha);
			$stat->bindValue(5, $res->cpf_cnpj);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo "Erro ao alterar Professor ".$exc;
		}
	}
	
	//Buscar Responsavel
	public function buscarResponsavel($res){
		try {
			
			$stat = $this->conexao->prepare("SELECT * FROM responsavel WHERE cpf_cnpj = ?");
			$stat->bindValue(1, $res->cpf_cnpj);
			
			$stat->execute();
			
			$responsavel = $stat->fetchObject("Responsavel");
			
			return $responsavel;
			
		} catch (PDOException $exc) {
			echo 'Erro ao buscar aluno '.$exc;
		}
	}
	
	//Login Responsavel
	public function verificarResponsavel($resp){
		try {
			$stat = $this->conexao->query("select * from responsavel where email = '$resp->email' and senha = '$resp->senha'");
			$responsavel = null;
			$responsavel = $stat->fetchObject('Responsavel');
			return $responsavel;
		} catch (PDOException $exc) {
			echo 'Erro ao verificar Responsavel! '.$exc;
		}//fecha catch
	}
}
?>