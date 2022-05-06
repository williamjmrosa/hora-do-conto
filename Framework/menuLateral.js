/**
 * 
 */
$(document).ready(function(){
	$("#menu-lateral li").click(function(){
		$("#menu-lateral li ul").css( "display", "none" );
  		$(this).find("ul").css( "display", "block" );
	});
});
