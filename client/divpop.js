$(document).ready(function() {	

var id = '#layer0';
	
//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();
	
//Set heigth and width to mask to fill up the whole screen
$('#sidelook').css({'width':maskWidth,'height':maskHeight});

//transition effect
$('#sidelook').fadeIn(500);	
$('#sidelook').fadeTo("slow",0.9);	
	
//Get the window height and width
var winH = $(window).height();
var winW = $(window).width();
              
//Set the popup window to center
$(id).css('top',  winH/2-$(id).height()/2);
$(id).css('left', winW/2-$(id).width()/2);
	
//transition effect
$(id).fadeIn(2000); 	
	
//if close button is clicked
$('.look .close').click(function (e) {
//Cancel the link behavior
e.preventDefault();

$('#sidelook').hide();
$('.look').hide();
});

//if mask is clicked
$('#sidelook').click(function () {
$(this).hide();
$('.look').hide();
});
	
});