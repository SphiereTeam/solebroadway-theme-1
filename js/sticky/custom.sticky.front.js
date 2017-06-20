jQuery(document).ready(function($){
	$("#solebroadway-nav").sticky({
		topSpacing:0
	});

	$('#solebroadway-nav').on('sticky-start', function() { 
		console.log("Started");
	});

	$('#solebroadway-nav').on('sticky-end', function() {
		console.log("Ended");
	});
});