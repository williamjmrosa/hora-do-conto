<?php
session_start();
include '../modelo/questao.class.php';
include '../dao/questaodao.class.php';

if(isset($_GET['id'])){
	$ID = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
}else{
	header('location:../visao/area_dos_contos.php');
}
?>
<div class="terciaria rounded p-4">
	<table class="table fundo">
		<thead>
			<tr>
				<th scope="col">ID Questao</th>				
				<th scope="col">Resposta</th>
				<th scope="col">Enunciado</th>
			</tr>
		</thead>
		<tbody>
	<?php
	$qDAO = new questaoDAO;
	$questoes = $qDAO->buscarQuestoesConto($ID);
	foreach ( $questoes as $questao) {
		
		$questao->alternativa = unserialize($questao->alternativa);
		?>
		
		
				<tr>
				<th scope="row"><?php echo $questao->id_questao;?></th>
				<th><?php
				if($questao->tipo_questao == 3){
					$questao->resposta = unserialize($questao->resposta);
					foreach ($questao->resposta as $r){
						echo "<p>".$questao->alternativa[$r]."</p>";
					}
				}else if($questao->tipo_questao == 2){
					echo "<p>$questao->resposta</p>";
				}else{
					echo "<p>".$questao->alternativa[$questao->resposta]."</p>";
				}
				?></th>
				<th><?php echo $questao->enunciado;?></th>
				<th><a class="btn fonte secundaria">Alterar Questão</a></th>
				<th><a class="btn fonte secundaria">Excluir</a></th>
				</tr>
		
	<?php }?>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="../js/cadastrar-conto.js"></script>