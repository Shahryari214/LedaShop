jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop()) {
            jQuery('.back-to-top').fadeIn(300);
        } else {
            jQuery('.back-to-top').fadeOut(300);
        }
    });
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        var XT = $(this).offset().top;
        XT = XT / 1.5;
        jQuery('html, body').animate({
            scrollTop: 0
        }, XT);
    });
	
		var menu = jQuery('.topbar nav ul');       
		jQuery(".topbar nav #navbar-toggle").click(function() {
			menu.slideToggle(500);
		});  

		jQuery(window).on('resize', function(){   
			if(!jQuery(".topbar nav #navbar-toggle").is(":visible") && !menu.is(':visible'))
			{
				 menu.show();   
			}
		});
		
		var mmenu = jQuery('#menubar nav ul.mmenu');       
		jQuery("#menubar nav  #navbar-toggle-m").click(function() {
			mmenu.slideToggle(500);
		});  

		jQuery(window).on('resize', function(){   
			if(!jQuery("#menubar nav  #navbar-toggle-m").is(":visible") && !mmenu.is(':visible'))
			{
				 mmenu.show();   
			}
		});
		
	   $(".post-content-body img").simpleLightBox();
	   $(".widget-img img").simpleLightBox();
	  
});