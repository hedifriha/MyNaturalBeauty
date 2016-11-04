jQuery(document).ready(function() {
		
	var widthsmartPubNo384 = jQuery('.advertising-banner-2 img, .advertising-banner-2 object, .advertising-banner-2 iframe, .advertising-banner-2 table').width();	
	if(jQuery('.page').hasClass('homepage')){
		jQuery("#header .advertising-banner-2, #header .advertising-banner-2 div, .advertising-banner-2 object, .advertising-banner-2 iframe, .advertising-banner-2 table").css ('width',widthsmartPubNo384);
	}else{
		jQuery("#beforeHeader .advertising-banner-2, #beforeHeader .advertising-banner-2 div, .advertising-banner-2 object, .advertising-banner-2 iframe, .advertising-banner-2 table").css ('width',widthsmartPubNo384);
	}
});

