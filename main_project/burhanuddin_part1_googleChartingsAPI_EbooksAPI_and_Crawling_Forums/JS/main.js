$(document).ready(function(){
  $("#but1").click(function(){
    /*$("#div1").animate({scrollTop:$(document).innerHeight()+4}, 1200,function()*/
	$("#divv").slideUp(1000,function()
	{
	$("#topbar").css({"top":"0px","position":"fixed"});
	$("#topbar").css({"width":"$(document).innerWidth()"});
	//$("#divv").css("visibility","visible");
	});	
  });  
});

$(document).ready(function(){
  $("#a3").click(function(){
     $("#divv").slideDown(1000,function()
	{
		$("#topbar").css({"position":"relative"});
	});	
  });  
});

$(document).ready( function() {
    $("#in-out").click(function() {
        $("#fade_div").css({"display":"inline"});
		$("#login_div").css({"display":"inline"});
		//$("#in_out_menu").css({"display":"inline"});
		//$("#in-out").css({"display":"none"});
    });
});


$(document).ready( function() {
    $("#login_but").click(function() {
        $("#fade_div").css({"display":"inline"});
		$("#login_div").css({"display":"inline"});
    });
});


$(document).ready( function() {
    $("#x_img").click(function() {
        $("#fade_div").css({"display":"none"});
		$("#login_div").css({"display":"none"});
    });
});

$(document).ready( function() {
    $("#x_img1").click(function() {
        $("#fade_div").css({"display":"none"});
		$("#regis_div").css({"display":"none"});
    });
});

$(document).ready( function() {
    $("#regis_but").click(function() {
        $("#fade_div").css({"display":"inline"});
		$("#regis_div").css({"display":"inline"});
    });
});

$(document).ready(function() {
	$("#forgot").click(function() {
		$("#login_div").css({"display":"none"});
		$("#forgot_div").css({"display":"inline"});
	});
});

$(document).ready( function() {
    $("#x_img2").click(function() {
        $("#fade_div").css({"display":"none"});
		$("#forgot_div").css({"display":"none"});
    });
});

/*$(document).ready(function(){
  $("#home_but").click(function(){
     $("#divv").slideDown(function()
	{
		$("#topbar").css({"position":"relative"});
	});	
  });  
});
*/

$(document).ready(function(){
    $("#nav-but1").click(function(){
		$("#index-left-side-nav").animate({"left":"-256px"}, "slow",function(){
			$("#index-left-side-nav-show").animate({"left":"0px"},"fast");	
		});
    });
});


$(document).ready(function(){
    $("#nav-but2").click(function(){
		 $("#index-left-side-nav-show").animate({"left":"-70px"},"slow",function(){
		$("#index-left-side-nav").animate({"left":"7px"},"slow");});
    });
});

/*---------------------------------------------------------
Footer
-----------------------------------------------------------*/

$(document).ready(function() {
	$("#map_but").click(function() {
		
		$("#fade_div").css({"display":"inline"});
		$("#map_div").css({"display":"inline"});
	});
});

$(document).ready( function() {
    $("#x_img3").click(function() {
        $("#fade_div").css({"display":"none"});
		$("#map_div").css({"display":"none"});
    });
});
