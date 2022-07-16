<div class="d-flex flex-column flex-shrink-0 p-0 text-white terciaria"
	style="width: auto;">
	<a href="../visao/area_dos_contos.php"
		class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
		<img class="w-100" alt="Hora do Conto" src="../img/logo2.svg">
	</a> <input id="pesquisar" type="text" placeholder="Pesquisar..."
		class="perquisar border-0 border-bottom bg-transparent border-dark mb-4 m-3">

	<ul id="menu-lateral"
		class="nav nav-pills flex-column mb-auto menu-lateral pb-2">
		
	</ul>
</div>
<script type="text/javascript" src="../js/menuLateral.js"></script>
<script type="text/javascript">
	$("#menu-lateral").load("../visao/filtrar-menuLateral.php");

	$("#pesquisar").keyup(function (){
		var pesquisa = $(this).val();
		if(pesquisa.length >= 3){
			var enviar = pesquisa.replace(/ /g,"+");
			$("#menu-lateral").load("../visao/filtrar-menuLateral.php?pesquisa="+enviar);
		}else{
			$("#menu-lateral").load("../visao/filtrar-menuLateral.php");
		}
	});
	
</script>