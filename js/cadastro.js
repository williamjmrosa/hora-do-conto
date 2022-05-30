/**
 * 
 */
$("#tipo").change(function(){
	var tipo = $(this).val();
	if(tipo == 1){
		$("#formulario").attr('action','../controle/responsavel-controle.php?op=1');
	}else if(tipo == 2){
		$("#formulario").attr('action','../controle/aluno-controle.php?op=1');
	}else if(tipo == 3){
		$("#formulario").attr('action','../controle/professor-controle.php?op=1');
	}else if(tipo == 4){
		$("#formulario").attr('action','../controle/instituicao-controle.php?op=1');
	}else{
		$("#formulario").attr('action','');
	}
});

$("#formulario").submit(function(){
	var tipo = $("select").val();
	if(tipo == 'Selecione'){
		alert("Selecione um tipo!");
		return false;
	}
	
});