jQuery(document).ready(function($){
	//$("#solebroadway-nav").sticky({topSpacing:0});
	//$( "#solebroadway-nav" ).addClass( "solebroadway-nav-sticky" );
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		//>=, not <=
		if (scroll >= 303) {
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