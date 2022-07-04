/**
 * 
 */

$(document).ready(function(){
	$("#atividades").load("../visao/home-hora-do-conto.php");
	//$("#atividades").load("../visao/criar_questoes.php");
	//$("#atividades").load("../visao/criar-conto.php");
	
	$("#criar-conto").click(function(){
		$("#atividades").load("../visao/criar-conto.php");
	});
	
});