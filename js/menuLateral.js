/**
 * 
 */
$(document).ready(function(){
	$("#menu-lateral li").click(function(){
		var display = $(this).find(">ul").css('display');
		$("#menu-lateral li ul").css( "display", "none" );
		$("#menu-lateral > li > a").removeClass('baixo').addClass('abrir');
		if(display == "none"){
			$(this).find("> a").removeClass('abrir').addClass('baixo');
	  		//alert($(this).text());
	  		$(this).find("ul").css( "display", "block" );	
		}
	});
});
