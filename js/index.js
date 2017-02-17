var toggle = function(){
	$(".second_nav").hide(); //Hide all menu_con
	
	$(".menu>li").click(function(){
		$(".menu>li").attr("id","");
		$(".second_nav").hide();

        $(this).attr("id","current"); // Activate this
        var currentTitle = $('#' + $(this).attr('title'));

        currentTitle.fadeIn(); 
	});
}


$(document).ready(function(){
	toggle();
});