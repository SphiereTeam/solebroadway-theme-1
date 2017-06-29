jQuery(document).ready(function($){
	
	$("#solebroadway-nav").sticky({
		topSpacing:0
	});

	$('#solebroadway-nav').on('sticky-start', function() { 
		//console.log("Sticky nav started.");
		$( "#solebroadway-nav" ).addClass( "solebroadway-nav-sticky" );
	});

	$('#solebroadway-nav').on('sticky-end', function() {
		//console.log("Sticky nav ended.");
		$( "#solebroadway-nav" ).removeClass( "solebroadway-nav-sticky" );
	});

});