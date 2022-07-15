<?php
session_start ();
if (isset ( $_SESSION ['privateUser'] ) && isset ( $_SESSION ['privateTipo'] ) && isset($_SESSION['perfil'])) {
	$TIPO = filter_var ( $_SESSION ['privateTipo'], FILTER_SANITIZE_NUMBER_INT );

	switch ($TIPO) {
		case 1 :
			include '../modelo/responsavel.class.php';
			$alterar = "Responsavel";
			break;
		case 2 :
			include '../modelo/aluno.class.php';
			$alterar = "Aluno";
			break;
		case 3 :
			include '../modelo/professor.class.php';
			$alterar = "Professor";
			break;
		case 4 :
			include '../modelo/instituicao.class.php';
			$alterar = "Instituição";
			break;
		default :
			header("location: ../index.php");
			break;
	}
	
	$perfil = unserialize($_SESSION['perfil']);
	unset($_SESSION['tela']);
	unset($_SESSION['perfil']);

?>
<div class="terciaria ms-2">
	<?php
	if(isset($_SESSION['erros'])){?>
		<div class="alert alert-danger">
			<?php foreach (unserialize($_SESSION['erros']) as $erro){
				echo "<p>$erro</p>";
			}
			unset($_SESSION['erros'])?>
		</div>	
	<?php
	}
	if(isset($_SESSION['msg'])){?>
		<div class="alert alert-success">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php
	}
	?>
	
	<form class="ms-3 me-3 pb-2" action="../controle/perfil-controle.php?op=1" method="POST">
	<input id="tipo" hidden="true" type="text" value="<?php echo $TIPO?>">
	<div class="mb-3 pt-2">
		<label for="formGroupExampleInput" class="form-label">Nome</label>
		<input type="text" class="form-control" id="cliente"
			placeholder="Nome do Cliente" value="<?php echo $perfil->nome?>" name="nome">
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput2" class="form-label"><?php echo $TIPO == 4? "CNPJ":"CPF"?></label>
		<input type="text" class="form-control" id="cpf-cnpj"
			placeholder="CPF/CNPJ" value="<?php echo $perfil->cpf_cnpj?>" name="cpf-cnpj" disabled>
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput2" class="form-label">E-mail</label>
		<input type="text" class="form-control" id="email"
			placeholder="Email" value="<?php echo $perfil->email?>" name="email">
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput2" class="form-label">Contato</label>
		<input type="text" class="form-control" id="contato"
			placeholder="Contato" value="<?php echo $perfil->contato?>" name="contato">
	</div>
	<div class="mb-3">
		<label for="formGroupExampleInput2" class="form-label">Nova Senha</label>
		<input type="password" class="form-control" id="senha"
			placeholder="Nova Senha" name="senha">
	</div>
	<div class="mb-3 text-end">
		<button class="btn secundaria fonte" type="submit">Alterar <?php echo $alterar?></button>
	</div>
	</form>
</div>
<!-- JQuery -->
<script src="../Framework/jquery.mask.js"></script>
<script type="text/javascript">
$("#contato").mask('(00) 00000-0000');
<?php
if($TIPO == 4){
	echo "$('#cpf-cnpj').mask('00.000.000/0000-00');";
}else{
	echo "$('#cpf-cnpj').mask('000.000.000-00');";
}
?>
</script>
<?php
}else{
	unset($_SESSION['tela']);
	header('location: ../index.php');
}
?>