/**
 * 
 */
 
$(document).ready(function(){
	 $("#contato").mask('(00) 00000-0000');
	 
	var options =  {
  onKeyPress: function(cep, e, field, options) {
    var tipo = $("#tipo").val();
    var masks = ['000.000.000-00', '00.000.000/0000-00'];
    var mask = ( tipo == 4) ? masks[1] : masks[0];
    
    $('#cpf-cnpj').mask(mask, options);
}};

$('#cpf-cnpj').mask('000.000.000-00', options);
	
});
 
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