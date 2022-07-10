<?php
include '../modelo/questao.class.php';
include '../dao/contodao.class.php';
include '../modelo/conto.class.php';

session_start ();
if (isset ( $_SESSION ['questionario'] ) && isset ( $_SESSION ['id_conto'] )) {
	$questões = unserialize ( $_SESSION ['questionario'] );
	$cDAO = new ContoDAO ();
	$conto = $cDAO->buscarConto ( $_SESSION ['id_conto'] );
	//unset($_SESSION['questionario']);
	//unset($_SESSION['id_conto']);
	//unset($_SESSION['tela']);

	?>
<div class="w-100 m-3">
	<h2><?php echo $conto->titulo?></h2>
	<hr class="hr-questao">
	<form action="">
	<?php
	foreach ( $questões as $chave => $q ) {
		echo "<p>Questão " . ($chave + 1) . ": $q->enunciado</p>";
		$q->alternativa = unserialize ( $q->alternativa );

		if ($q->tipo_questao == 1) {
			?>
		 <div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="A"
					value="0"> <label class="form-check-label" for="A">A) <?php echo $q->alternativa[0]?></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="B"
					value="1"> <label class="form-check-label" for="B">B) <?php echo $q->alternativa[1]?></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="C"
					value="2"> <label class="form-check-label" for="C">C) <?php echo $q->alternativa[2]?></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="D"
					value="3"> <label class="form-check-label" for="D">D) <?php echo $q->alternativa[3]?></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="E"
					value="4"> <label class="form-check-label" for="E">E) <?php echo $q->alternativa[4]?></label>
			</div>
		</div>	
	<?php
		} else if ($q->tipo_questao == 2) {
			?>
		<div class="form-floating">
			<textarea name="resposta[<?php echo $q->id_questao?>]" class="form-control"
				placeholder="resposta[<?php echo $q->id_questao?>] aqui" id="floatingTextarea2"
				style="height: 100px"></textarea>
			<label class="fonte-cinza">Resposta dissertativa</label>
		</div>	
			<?php
		} else {
			?>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao?>]" id="A" value="0">
			<label class="form-check-label" for="A">A) <?php echo $q->alternativa[0]?></label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao?>]" id="B" value="1">
			<label class="form-check-label" for="B">B) <?php echo $q->alternativa[1]?></label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao?>]" id="C" value="2">
			<label class="form-check-label" for="C">C) <?php echo $q->alternativa[0]?></label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao?>]" id="D" value="3">
			<label class="form-check-label" for="D">D) <?php echo $q->alternativa[3]?></label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao?>]" id="E" value="4">
			<label class="form-check-label" for="E">E) <?php echo $q->alternativa[4]?></label>
		</div>
		
<?php

} // fecha else if
	}//fecha foreach?>
	<div class="form-check mt-2 p-0 float-end">
		<button type="submit" class="btn secundaria fonte">Enviar Questionario</button>
	</div>
</form>
</div>
<?php
}else{
	unset($_SESSION['tela']);
	header('location: ../visao/area_dos_contos.php');
}
?>