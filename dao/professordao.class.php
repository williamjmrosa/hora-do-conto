<?php
require_once '../persistencia/conexaobanco.class.php';

Class ProfessorDAO{
	
	private $conexao = null;
	
	//Construtor
	public function __construct() {
		$this->conexao = ConexaoBanco::getInstancia();
	}
	
	//Cadastrar Professor
	public function cadastrarProfessor($prof) {
		
		try {
			$stat = $this->conexao->prepare("INSERT INTO professor(cpf_cnpj,nome,email,contato,senha)values(?,?,?,?,?)");
			
			$stat->bindValue(1, $prof->cpf_cnpj);
			$stat->bindValue(2, $prof->nome);
			$stat->bindValue(3, $prof->email);
			$stat->bindValue(4, $prof->contato);
			$stat->bindValue(5, $prof->senha);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo 'Erro ao cadastrar professor! '. $exc;
		}//fecha catch
		
	}//fecha cadastrar professor
	
	//Alterar Professor
	public function alterarProfessor($prof) {
		
		try {
			
			$stat = $this->conexao->prepare("UPDATE professor SET nome = ?, email = ?, contato = ?, senha = ? WHERE cpf_cnpj = ?");
			$stat->bindValue(1, $prof->nome);
			$stat->bindValue(2, $prof->email);
			$stat->bindValue(3, $prof->contato);
			$stat->bindValue(4, $prof->senha);
			$stat->bindValue(5, $prof->cpf_cnpj);
			
			$stat->execute();
			
		} catch (PDOException $exc) {
			echo "Erro ao alterar Professor ".$exc;
		}
	}
	
	//Buscar Professor
	public function buscarProfessor($prof) {
		try {
			$stat = $this->conexao->prepare("SELECT * FROM professor WHERE cpf_cnpj = ?");
			
			$stat->bindValue(1, $prof->cpf_cnpj);
			
			$stat->execute();
			
			$p = $stat->fetchObject("Professor");
			
			return $p;
			
		} catch (PDOException $exc) {
			echo  'Erro ao buscar Professor '.$exc;
		}
	}
	
	//Login Professor
	public function verificarProfessor($prof){
		try {
			$stat = $this->conexao->query("select * from professor where email = '$prof->email' and senha = '$prof->senha'");
			$professor = null;
			$professor = $stat->fetchObject('Professor');
			return $professor;
		} catch (PDOException $exc) {
			echo 'Erro ao verificar Professor! '.$exc;
		}//fecha catch
	}
}
?>