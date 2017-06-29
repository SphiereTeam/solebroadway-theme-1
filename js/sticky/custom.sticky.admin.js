jQuery(document).ready(function($){
	
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		//50
		//32
		if (scroll >= 32) {
			//clearHeader, not clearheader - caps H
			//$(".clearHeader").addClass("darkHeader");
			$("#solebroadway-nav").sticky({topSpacing:0});
			$( "#solebroadway-nav" ).addClass( "solebroadway-nav-sticky" );
		}else{
			$("#solebroadway-nav").unstick();
			$( "#solebroadway-nav" ).removeClass( "solebroadway-nav-sticky" );
		}
	});

});