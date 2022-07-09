<?php
session_start ();
include '../modelo/conto.class.php';
include '../modelo/questao.class.php';
include '../dao/contodao.class.php';
include '../dao/questaodao.class.php';
?>
<div class="d-flex flex-column flex-shrink-0 p-0 text-white terciaria"
	style="width: auto;">
	<a href="../visao/area_dos_contos.php"
		class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		<img class="w-100" alt="Hora do Conto" src="../img/logo2.svg">
	</a> <input type="text" placeholder="Pesquisar..."
		class="perquisar border-0 border-bottom bg-transparent border-dark mb-4 m-3">

	<ul id="menu-lateral"
		class="nav nav-pills flex-column mb-auto menu-lateral pb-2">
		<?php
		$cDAO = new ContoDAO ();
		$contos = $cDAO->listarContos ();
		foreach ( $contos as $chave => $conto ) {
			?>
				<li class="nav-item"><a href="#" class="nav-link text-white abrir"><?php echo $conto->titulo?></a>
			<ul class="list-unstyled ">
				<li class="mb-2"><a class="text-secundaria ms-4" href=""><?php echo "Conto ". ($chave + 1) ." : ".$conto->titulo?></a></li>
				<li class="mb-2"><a class="text-secundaria ms-4 "
					id="<?php echo $conto->id_conto?>">Atividade</a></li>
			</ul></li>
			<?php

}
		?>
	</ul>
</div>
<script type="text/javascript" src="../js/menuLateral.js"></script>