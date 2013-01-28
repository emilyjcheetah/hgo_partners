$(document).ready(function(){

// Port Hover

$(".thumb_hover_wrapper, .banner1_thumb_hover_wrapper").hover(function(){
$(this).animate({ opacity: 1 }, 200);
$(this).children().animate({ opacity: 1 }, 200);
}, function(){
$(this).animate({ opacity: 0 }, 300);
$(this).children().animate({ opacity: 0 }, 300);
}); 



});