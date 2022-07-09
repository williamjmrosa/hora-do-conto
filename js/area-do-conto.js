/**
 * 
 */

$(document).ready(function(){
	
	$("#criar-conto").click(function(){
		$("#atividades").load("../visao/criar-conto.php");
	});
	
	$("#menuLateral").load("../visao/menuLateral-area-do-conto.php");
	
});