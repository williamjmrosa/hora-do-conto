/**
 * 
 */

 $(document).ready(function(){
	
	$(".criarQuestao").click(function(){
		var id = $(this).attr("id");
		$("#conto").load("../visao/criar_questoes.php?id="+id);
		$("#lista").load("../visao/listar-questoes-conto.php?id="+id);
	});
	
	$(".tipoQuestao").click(function(){
		var tipo = this.value;
		var alternativas = $(this).parent().parent().children(".alternativas");//.closest(".alternativas"); 
		alternativas.empty();
		if(tipo == 1){
			var div = '<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="radio" name="resposta" id="A" value="0">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="A">A)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="radio" name="resposta" id="B" value="1">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="B">B)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="radio" name="resposta" id="C" value="2">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="C">C)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="radio" name="resposta" id="D" value="3">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="D">D)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="radio" name="resposta" id="E" value="4">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="E">E)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>';
		}else if(tipo == 2){
			var div = '<div class="form-floating">'
					+'<textarea name="resposta" class="form-control" placeholder="Resposta aqui" id="floatingTextarea2" style="height: 100px"></textarea>'
					+'<label class="fonte-cinza">Resposta dicertativa</label>'
					+'</div>';
		}else{
			var div = '<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="checkbox" name="resposta[]" id="A" value="0">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="A">A)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="checkbox" name="resposta[]" id="B" value="1">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="B">B)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="checkbox" name="resposta[]" id="C" value="2">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="C">C)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="checkbox" name="resposta[]" id="D" value="3">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="D">D)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>'
					+'<div class="row m-2">'
					+'<div class="col-auto">'
					+'<input class="form-check-input" type="checkbox" name="resposta[]" id="E" value="4">'
					+'</div>'
					+'<div class="col-auto">'
					+'<label class="col-form-label d-inline" for="E">E)</label>'
					+'</div>'
					+'<div class="col-auto">'
					+'<input class="form-control" type="text" name="alternativa[]" placeholder="Resposata da alternativa">'
					+'</div>'
					+'</div>';
		}
		
		alternativas.append(div);
		
	});
});