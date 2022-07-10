<?php session_start();
include '../modelo/conto.class.php';
if(isset($_SESSION['conto'])){
	$conto = unserialize($_SESSION['conto']);
	unset($_SESSION['conto']);
	$conto->video = str_replace("watch?v=", "embed/", $conto->video);
?>
<div class="ratio ratio-16x9 w-60 d-inline-block">
	<iframe src="<?php echo $conto->video?>" title="YouTube video" allowfullscreen></iframe>
</div>
<!--  <iframe width="560" height="315"
			src="https://www.youtube.com/embed/nEK9EO7hl6Q"
			title="YouTube video player" frameborder="0"
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen></iframe>-->
<div class="d-inline-block align-top text-center terciaria">
	<h4 class="text-center">Anotações</h4>
	<textarea class="rounded ms-3 me-3 mb-2" rows="15" cols="35"></textarea>
</div>
<hr style="border: 2px solid #FFB82F;">
<form action="">
	<h3>Comentários e Duvidas</h3>
	<textarea id="comentario" name="comentario" class="textarea-fundo"
		rows="5" cols="120"></textarea>
	<div class="text-end">
		<a class="btn fonte secundaria ps-5 pe-5">Enviar</a>
	</div>
</form>
<?php
}
?>
