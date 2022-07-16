<?php
session_start ();
include '../modelo/conto.class.php';
include '../modelo/questao.class.php';
include '../dao/contodao.class.php';
include_once '../dao/questaodao.class.php';
$cDAO = new ContoDAO ();
if(isset($_GET['pesquisa'])){
	$pesquisa = filter_var($_GET['pesquisa'],FILTER_SANITIZE_STRING);
	$contos = $cDAO->filtrarContos($pesquisa);
}else{
	$contos = $cDAO->listarContos ();
}
	foreach ( $contos as $chave => $conto ) {
?>
	<li class="nav-item"><a href="#" class="nav-link text-white abrir"><?php echo $conto->titulo?></a>
		<ul class="list-unstyled ">
			<li class="mb-2">
				<a class="text-secundaria ms-4" href="../controle/contos-controle.php?op=4&id=<?php echo $conto->id_conto;?>">
				<?php echo "Conto ". ($chave + 1) ." : ".$conto->titulo?></a></li>
			<li class="mb-2"><a class="text-secundaria ms-4" href="../controle/questao-controle.php?op=4&id=<?php echo $conto->id_conto;?>">Atividade</a></li>
		</ul>
	</li>
	<?php
	}
	?>
	<script type="text/javascript" src="../js/menuLateral.js"></script>