jQuery(document).ready(function($){
	$("#solebroadway-nav").sticky({
		topSpacing:0
	});

	$('#solebroadway-nav').on('sticky-start', function() { 
		console.log("Sticky nav started.");
	});

	$('#solebroadway-nav').on('sticky-end', function() {
		console.log("Sticky nav ended.");
	});
});