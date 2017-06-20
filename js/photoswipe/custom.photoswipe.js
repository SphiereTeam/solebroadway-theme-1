jQuery(document).ready(function($){

	//console.log( $( "#product-images-list" ).val() );

	//get list of product image urls
	var product_images_list = $( "#product-images-list" ).val();

	if( product_images_list ){

		//console.log( "Urls found!" );

		//put list in array
		var product_images_list_array = product_images_list.split('|');

		var items_outer = [];

		$.each( product_images_list_array, function( key, value ) {
			//alert( key + ": " + value );
			var items_inner = {};
			items_inner['src'] = value;
			items_inner['w'] = '1000';
			items_inner['h'] = '1000';

			items_outer.push(items_inner);
		});

		//setup photoswipe
		var pswpElement = document.querySelectorAll('.pswp')[0];

		//define options (if needed)
		var options = {
			// optionName: 'option value'
			// for example:
			index: 0 // start at first slide
		};

		//open gallery on image click
		$( ".btn-gallery" ).click(function( evt ) {
			evt.preventDefault();
			var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items_outer, options);
			gallery.init();
		});

	}else{
		console.log("No urls found!");
	}
 
});

	