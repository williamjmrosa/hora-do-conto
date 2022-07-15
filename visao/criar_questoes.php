<?php
session_start ();
include '../modelo/conto.class.php';
include '../modelo/questao.class.php';
include '../dao/contodao.class.php';

if(isset($_SESSION['alterarQuestao'])){
	$alterar = unserialize($_SESSION['alterarQuestao']);
	$ID = $alterar->id_conto;
	$cDAO = new ContoDAO();
	$conto = $cDAO->buscarConto($ID);
	$OP = 2;
	$submit = "Alterar Questão";
	unset($_SESSION['alterarQuestao']);
	
}elseif (isset ( $_GET ['id'] )) {
	$ID = filter_var ( @$_GET ['id'], FILTER_SANITIZE_NUMBER_INT );
	$cDAO = new contoDAO ();
	$conto = $cDAO->buscarConto ( $ID );
	$OP = 1;
	$submit = "Cadastrar Questão";	
}else {
	$_SESSION ['erros'] = 'Não foi aberto apartir de um conto';
}
?>
<div class="w-100 d-inline-block">
	<?php

	if (isset ( $_SESSION ['msg'] )) {
		?>
		<div class="alert alert-success" role="alert">
	<?php echo $_SESSION['msg'];?>
		</div>
	<?php

		unset ( $_SESSION ['msg'] );
	}
	if (isset ( $_SESSION ['erros'] )) {
		?>
		<div class="alert alert-danger" role="alert">
		<?php
		$erros = unserialize ( $_SESSION ['erros'] );
		for($i = 0; $i < sizeof ( $erros ); $i ++) {
			echo '<p class="mb-1">' . str_replace ( '<br>', "", $erros [$i] ) . '</p>';
		}

		unset ( $_SESSION ['erros'] );
	
		?>
		</div>
	<?php
	}
	?>
	<form class="terciaria rounded p-4"
		action="../controle/questao-controle.php?op=<?php echo $OP;?>" method="POST">
		<h2>Conto: <?php echo $conto->titulo;?></h2>
		<h4 class="fs-1">Criar Questão</h4>
		<div class="questao form-floating">
			<input value="<?php echo $conto->id_conto?>" name="idConto"
				hidden="true">
			<?php if(isset($alterar)){?>
				<input value="<?php echo $alterar->id_questao?>" name="idQuestao" hidden="true">
			<?php }?>
			<div class="form-floating">
				<textarea class="form-control" placeholder="Enunciado aqui"
					id="floatingTextarea2" name="enunciado" style="height: 100px"><?php echo isset($alterar)?  $alterar->enunciado:"";?></textarea>
				<label class="fonte-cinza">Enunciado da questão</label>
			</div>
			<div class="mt-4 mb-4">
				<label class="fs-5 fonte">Tipo de Questão</label>
			</div>
			<div class="form-check form-check-inline fonte">
				<input class="form-check-input tipoQuestao" type="radio"
					name="tipoQuestao" value="1" id="multiplaEscolha" required> <label
					class="form-check-label" for="multiplaEscolha">Multipla escolha</label>
			</div>
			<div class="form-check form-check-inline fonte">
				<input class="form-check-input tipoQuestao" type="radio"
					name="tipoQuestao" value="2" id="dissertativa"> <label
					class="form-check-label" for="dissertativa">Dissertativa</label>
			</div>
			<div class="form-check form-check-inline fonte">
				<input class="form-check-input tipoQuestao" type="radio"
					name="tipoQuestao" value="3" id="multiplaResposta"> <label
					class="form-check-label" for="multiplaResposta">Multipla Resposta</label>
			</div>
			<div class="form-floating alternativas">
				<!-- Alternativar em funçao do tipo de questão -->
			</div>
		</div>
		<div class="pt-2">
			<button class="btn secundaria fonte" type="submit"><?php echo $submit?></button>
		</div>
	</form>
</div>
<script type="text/javascript" src="../js/cadastrar-conto.js"></script>