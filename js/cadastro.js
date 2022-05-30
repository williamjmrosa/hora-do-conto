/**
 * 
 */
$("select").change(function(){
	var tipo = $(this).val();
	if(tipo == 1){
		$("#formulario").attr('action','../responsavel-controle.php?op=1');
	}else if(tipo == 2){
		$("#formulario").attr('action','../aluno-controle.php?op=1');
	}else if(tipo == 3){
		$("#formulario").attr('action','../professor-controle.php?op=1');
	}else if(tipo == 4){
		$("#formulario").attr('action','../instituicao-controle.php?op=1');
	}else{
		$("#formulario").attr('action','');
	}
});