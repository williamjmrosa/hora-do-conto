<?php
include '../modelo/questao.class.php';
include '../dao/contodao.class.php';
include '../dao/questionariodao.class.php';
include '../modelo/realizaquestionario.class.php';
include '../modelo/conto.class.php';
include '../modelo/aluno.class.php';
//session_start ();
if (isset ( $_SESSION ['questionario'] ) && isset ( $_SESSION ['id_conto'] ) && isset($_SESSION['privateUser'])) {
	$questões = unserialize ( $_SESSION ['questionario'] );
	$cDAO = new ContoDAO ();
	$conto = $cDAO->buscarConto ( $_SESSION ['id_conto'] );
	//unset($_SESSION['tela']);
	$aluno = unserialize($_SESSION['privateUser']);
	
	
	?>
<div class="w-100 m-3">
	<h2><?php echo $conto->titulo?></h2>
	<hr class="hr-questao">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
		</symbol>
		<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
		<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
		</symbol>
		<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
		<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
		</symbol>
		</svg>
	<?php 
	if(isset($_SESSION['msg'])){?>
		<div class="alert alert-success d-flex align-items-center" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		<div>
			<?php echo $_SESSION['msg'];
			unset($_SESSION['msg']);?>
		</div>
		</div>
	<?php
	}
	?>
	<?php 
	if(isset($_SESSION['erros'])){?>
		<div class="alert alert-danger  d-flex align-items-center" role="alert">
		  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
		<div>
			<?php echo implode("<br>", $_SESSION['erros']);
			unset($_SESSION['erros']);?>
		</div>
		</div>
	<?php
	}
	?>
	<form action="../controle/questionario-controle.php?op=1" method="POST">
	<?php
	$qDAO = new QuestionarioDAO;
	$realiza = null;
	foreach ( $questões as $chave => $q ) {
		echo "<p>Questão " . ($chave + 1) . ": $q->enunciado</p>";
		$q->alternativa = unserialize ( $q->alternativa );
		$realiza = $qDAO->buscarQuestoesContoAluno($q->id_questao,$aluno->cpf_cnpj);
		if ($q->tipo_questao == 1) {
			?>
		 <div>
		 <?php 
		 function certo($r,$rr,$qr,$lo) {
		 	if($r != "" && $rr == $qr && $rr == $lo){
		 		echo "alert alert-success";
		 	}elseif($r != "" && $rr !=  $qr && $rr ==$lo){
		 		echo "alert alert-danger";
		 	}elseif($r != "" && $lo == $qr){
		 		echo "alert alert-success";
		 	}
		 }
		 
		 ?>
			<div class="form-check <?php certo($realiza,$realiza->resposta, $q->resposta, 0)?>">
				<input <?php echo $realiza != "" && $realiza->resposta == 0 ? "checked disabled":"";?> class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="A"
					value="0" required> <label class="form-check-label" for="A">A) <?php echo $q->alternativa[0]?></label>
			</div>
			<div class="form-check <?php certo($realiza,$realiza->resposta, $q->resposta, 1)?>">
				<input <?php echo $realiza != "" && $realiza->resposta == 1 ? "checked disabled":"";?> class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="B"
					value="1"> <label class="form-check-label" for="B">B) <?php echo $q->alternativa[1]?></label>
			</div>
			<div class="form-check <?php certo($realiza,$realiza->resposta, $q->resposta, 2)?>">
				<input <?php echo $realiza != "" && $realiza->resposta == 2 ? "checked disabled":"";?> class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="C"
					value="2"> <label class="form-check-label" for="C">C) <?php echo $q->alternativa[2]?></label>
			</div>
			<div class="form-check <?php certo($realiza,$realiza->resposta, $q->resposta, 3)?>">
				<input <?php echo $realiza != "" && $realiza->resposta == 3 ? "checked disabled":"";?> class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="D"
					value="3"> <label class="form-check-label" for="D">D) <?php echo $q->alternativa[3]?></label>
			</div>
			<div class="form-check <?php certo($realiza,$realiza->resposta, $q->resposta, 4)?>">
				<input <?php echo $realiza != "" && $realiza->resposta == 4 ? "checked disabled":"";?> class="form-check-input" type="radio" name="resposta[<?php echo $q->id_questao?>]" id="E"
					value="4"> <label class="form-check-label" for="E">E) <?php echo $q->alternativa[4]?></label>
			</div>
		</div>	
	<?php
		} else if ($q->tipo_questao == 2) {
			?>
		<div class="form-floating">
			<textarea required name="resposta[<?php echo $q->id_questao?>]" class="form-control"
				placeholder="Resposta aqui" id="floatingTextarea2"
				style="height: 100px"></textarea>
			<label class="fonte-cinza">Resposta dissertativa</label>
		</div>
		<?php 
			if($realiza != ""){
			?>
				<div class="alert alert-success"><h4>Gabarito</h4><p><?php echo $realiza->resposta?></p> </div>
			<?php
			}
			?>	
			<?php
		} else {
			?>
			<?php 
			function certoMultiplaResposta($r,$rr,$qr,$lo) {
				$qr = unserialize($qr);
				if($r != "" && in_array($lo, $rr) && in_array($lo, $qr)){
					echo "alert alert-success";
				}elseif($r != "" && in_array($lo,$rr) && !in_array($lo, $qr)){
					echo "alert alert-danger";
				}elseif($r != "" && in_array($lo, $qr)){
					echo "alert alert-success";
				}
			}
			$realiza->resposta = explode(",", $realiza->resposta);
			?>
		<div class="form-check <?php certoMultiplaResposta($realiza, $realiza->resposta, $q->resposta, 0)?>">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao;?>][]" id="A" value="0" <?php echo $realiza != "" && in_array(0, $realiza->resposta) != ""?"checked disabled":"";?>>
			<label class="form-check-label" for="A">A) <?php echo $q->alternativa[0]?></label>
		</div>
		<div class="form-check <?php certoMultiplaResposta($realiza, $realiza->resposta, $q->resposta, 1)?>">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao;?>][]" id="B" value="1" <?php echo $realiza != "" && in_array(1, $realiza->resposta) != ""?"checked disabled":"";?>>
			<label class="form-check-label" for="B">B) <?php echo $q->alternativa[1]?></label>
		</div>
		<div class="form-check <?php certoMultiplaResposta($realiza, $realiza->resposta, $q->resposta, 2)?>">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao;?>][]" id="C" value="2" <?php echo $realiza != "" && in_array(2, $realiza->resposta) != ""?"checked disabled":"";?>>
			<label class="form-check-label" for="C">C) <?php echo $q->alternativa[0]?></label>
		</div>
		<div class="form-check <?php certoMultiplaResposta($realiza, $realiza->resposta, $q->resposta, 3)?>">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao;?>][]" id="D" value="3" <?php echo $realiza != "" && in_array(3, $realiza->resposta) != ""?"checked disabled":"";?>>
			<label class="form-check-label" for="D">D) <?php echo $q->alternativa[3]?></label>
		</div>
		<div class="form-check <?php certoMultiplaResposta($realiza, $realiza->resposta, $q->resposta, 4)?>">
			<input class="form-check-input" type="checkbox" name="resposta[<?php echo $q->id_questao;?>][]" id="E" value="4" <?php echo $realiza != "" && in_array(4, $realiza->resposta) != ""?"checked disabled":"";?>>
			<label class="form-check-label" for="E">E) <?php echo $q->alternativa[4]?></label>
		</div>
		
<?php

} // fecha else if
	}//fecha foreach?>
		<div><input type="text" name="conto" hidden="true" value="<?php echo $conto->id_conto;?>"> </div>
	<div class="form-check mt-2 p-0 float-end">
		<button type="submit" class="btn secundaria fonte" <?php echo $realiza != ""? "disabled":"";?>>Enviar Questionario</button>
	</div>
</form>
</div>
<?php
}else{
	unset($_SESSION['tela']);
	header('location: ../visao/area_dos_contos.php');
}
?>