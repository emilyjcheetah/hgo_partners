$(document).ready(function(){


// slide filterby
$("#filterby").click(function(){
  $(".filter_elements").slideToggle();
}); 

// slide login
$("#login").click(function(){
  $("#login_box_content").slideToggle();
}); 

// Leading cause Hover

$(".thumb_hover_wrapper").hover(function(){
$(this).animate({ opacity: 1 }, 200);
$(this).children().animate({ opacity: 1 }, 200);
}, function(){
$(this).animate({ opacity: 0 }, 300);
$(this).children().animate({ opacity: 0 }, 300);
}); 



// banner Slider
$('.quake-slider').quake({
               thumbnails: false,
               animationSpeed: 1500,
               applyEffectsRandomly: true,
               navPlacement: 'inside',
               navAlwaysVisible: true,
			   captionOpacity: '0.3',
			    captionsSetup: [
                                 {
                                     "orientation": "bottom",
                                     "slides": [0, 1, 2],
                                     "callback": captionAnimateCallback
                                 }
                             
                                  
                                ]

            });
			
			
            function captionAnimateCallback(captionWrapper, captionContainer, orientation) {
                captionWrapper.css({ left: '-966px' }).stop(true, true).animate({ left: 0 }, 1000);
                captionContainer.css({ left: '-966px' }).stop(true, true).animate({ left: 0 }, 1000);
            }
            function captionAnimationCallback1(captionWrapper, captionContainer, orientation) {
                captionWrapper.css({ top: '-321px' }).stop(true, true).animate({ top: 0 }, 1000);
                captionContainer.css({ top: '-321px' }).stop(true, true).animate({ top: 0 }, 1000);
            }


// Language

$('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
				effect: 'fade',
                testMode: true,
                onChange: function(evt){
                    alert("The selected language is: "+evt.selectedItem);
                }
//                ,afterLoad: function(evt){
//                    alert("The selected language has been loaded");
//                },
//                beforeOpen: function(evt){
//                    alert("before open");
//                },
//                afterOpen: function(evt){
//                    alert("after open");
//                },
//                beforeClose: function(evt){
//                    alert("before close");
//                },
//                afterClose: function(evt){
//                    alert("after close");
//                }
			});

// Filtering using isotope -----------------------------------------------------------//
	$(function(){
var $container = $('.search_result_contentwrapper'),
filters = {};
$container.isotope({
itemSelector : 'li',

});
// filter buttons
$('.filter a').click(function(){
var $this = $(this);
// don't proceed if already selected
if ( $this.hasClass('selected') ) {
return;
}
var $optionSet = $this.parents('.option_set');
// change selected class
$optionSet.find('.selected').removeClass('selected');
$this.addClass('selected'); 
// store filter value in object

var group = $optionSet.attr('data-filter-group');
filters[ group ] = $this.attr('data-filter-value');
// convert object into array
var isoFilters = [];
for ( var prop in filters ) {
isoFilters.push( filters[ prop ] )
}
var selector = isoFilters.join('');
$container.isotope({ filter: selector });
return false;
});
}); 
// Tabs (part of Skeleton)
	if(typeof tabs != 'undefined')
	tabs.each(function(i) {
	//Get all tabs
	var tab = $(this).find('> li > a');
	tab.mousedown(function(e) {
	//Get Location of tab's content
	var contentLocation = $(this).attr('href');
	//Let go if not a hashed one
	if(contentLocation.charAt(0)=="#") {
	e.preventDefault();
	//Make Tab Active
	tab.removeClass('active');
	$(this).addClass('active');
	//Show Tab Content & add active class
	$(contentLocation).siblings().fadeOut(0).removeClass('active');
	//$(contentLocation).fadeIn(1000).addClass('active');
	$(contentLocation).fadeIn(1000).addClass('active').siblings().fadeOut(0).removeClass('active');
	}
	}).click(function(e){
	e.preventDefault();
	});
	}); 
						   
 // Alternating table rows:
$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows
// Check all checkboxes when the one in a table head is checked:
$('.check-all').click(
function(){
$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));
}
); 
//Close button:
$(".close").click(
function () {
$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
$(this).slideUp(400);
});
return false;
}
);
// FAQ
$('.faq .list:last-child').addClass('last');

// Toggle Slides
	$(function(){ // run after page loads
		
		var togglestate = '';
		
		$(".toggle_container").each(function() {
			
			togglestate = '';
			togglestate = $(this).data('state');
			
			if(togglestate != "open")
			$(this).hide();
			
		});
		
		//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
		$("h3.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle(500);
			return false; //Prevent the browser jump to the link anchor
		});
	});

		
});