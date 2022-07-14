<?php
session_start ();
include '../dao/contodao.class.php';
include '../modelo/professor.class.php';
include '../modelo/conto.class.php';
$prof = unserialize ( $_SESSION ['privateUser'] );
?>
<div id="conto" class="w-100 d-inline-block">
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
		if(@$_SESSION['tela'] != "questao"){
			
			unset ( $_SESSION ['erros'] );
		}
		?>
		</div>
	<?php
	}
	?>
	<form class="terciaria rounded p-4"
		action="../controle/contos-controle.php?op=1" method="POST">
		<h2 class="fs-1">Criar Conto</h2>
		<div class="mb-3">
			<label for="link" class="form-label">Link do Conto</label> <input
				type="text" name="link" class="form-control" id="link"
				aria-describedby="linkAjuda">
			<div id="linkAjuda" class="form-text fonte">Link de video do YouTube.</div>
		</div>
		<div class="mb-3">
			<label for="link" class="form-label">Titulo do Conto</label> <input
				type="text" name="titulo" class="form-control" id="titulo">
		</div>
		<div class="pt-2">
			<button class="btn secundaria fonte" type="submit">Cadastrar Conto</button>
		</div>
	</form>
</div>
<div id="lista" class="w-100 d-inline-block mt-2">
	<div class="terciaria rounded p-4">
		<table class="table fundo">
			<thead>
				<tr>
					<th scope="col">ID Conto</th>
					<th scope="col">Link do video</th>
					<th scope="col">Titulo do Video</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$cDAO = new contoDAO ();
	$contos = $cDAO->buscarContosProfessor ( $prof );
	foreach ( $contos as $conto ) {
		?>
		
		
				<tr>
					<th scope="row"><?php echo $conto->id_conto;?></th>
					<th scope="row"><?php echo $conto->video;?></th>
					<th scope="row"><?php echo $conto->titulo;?></th>
					<th scope="row"><a id="<?php echo $conto->id_conto;?>"
						class="btn secundaria criarQuestao">Criar Questão</a></th>
				</tr>

			
	

		
		
	<?php }?>
		</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="../js/cadastrar-conto.js"></script>
<script type="text/javascript">
	<?php
	
	
	if(isset($_SESSION['tela'])){
		$ID_CONTO = $_SESSION['id'];
		unset($_SESSION['id']);
		$tela = $_SESSION['tela'];
		unset($_SESSION['tela']);
		if($tela == "questao"){
			echo "$('#conto').load('../visao/criar_questoes.php?id=$ID_CONTO');";
			echo "$('#lista').load('../visao/listar-questoes-conto.php?id=$ID_CONTO');";
		}
	}
		?>
</script>