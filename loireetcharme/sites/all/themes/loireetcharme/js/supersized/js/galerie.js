/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth

(function ($, Drupal, window, document, undefined) {
    
    $(document).ready(function() {
        
        var url_page = document.location.href;  
        // ajout de la page d'origine dans l'url
        var retour_liste = $('#retour_liste').attr('href');
        var ajout_url = '?url_page='+url_page+'&retour_liste='+encodeURIComponent(retour_liste.replace(/&amp;/g, "&")) ;
        
        var node_id = $(".bloc-galerie").data('node-id');

        /*$('.view-galerie-bien').hide();*/
        var slides_sz = [];				
        $('.views-field-field-bien-image li').each(function(idx) {
					//
          var obj = {
             image: $("img", this).attr('src'),
             thumb: $(".views-field-field-bien-image-1 li:eq("+idx+") img").attr('src'),
             url: '/galerie-bien/'+node_id+'/'+idx+ajout_url
          };
           slides_sz.push(obj);
        });
        
         // desaffiche la navigation si un seul item
        var gal_slide_show = slides_sz.length <= 1 ? 0 : 1;
        
        $.supersized({
				
            // Functionality
            slideshow : 1,			// Slideshow on/off
            autoplay :	0,			// Slideshow starts playing automatically
            start_slide : 1,			// Start slide (0 is random)
            stop_loop :	0,			// Pauses slideshow on last slide
            random : 0,			// Randomize slide order (Ignores start slide)
            slide_interval : 3000,		// Length between transitions
            transition : 6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
            transition_speed :1000,		// Speed of transition
            new_window	: 0,			// Image links open in new window/tab
            pause_hover  : 0,			// Pause slideshow on hover
            keyboard_nav : 1,			// Keyboard navigation on/off
            performance	: 1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
            image_protect : 1,			// Disables image dragging and right click with Javascript

            // Size & Position						   
            min_width : 0,			// Min width allowed (in pixels)
            min_height : 0,			// Min height allowed (in pixels)
            vertical_center : 1,			// Vertically center background
            horizontal_center : 1,			// Horizontally center background
            fit_always : 0,			// Image will never exceed browser width or height (Ignores min. dimensions)
            fit_portrait : 1,			// Portrait images will not exceed browser height
            fit_landscape : 1,			// Landscape images will not exceed browser width

            // Components							
            slide_links	: 'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
            thumb_links	: gal_slide_show,			// Individual thumb links for each slide
            thumbnail_navigation : 0,			// Thumbnail navigation
            slides :  slides_sz,

            // Theme Options			   
            progress_bar : 0,			// Timer for each slide							
            mouse_scrub	: 0

        });
        
        if(!gal_slide_show){
            $('#thumb-tray').addClass('no_nav');
        }
        
        // retour liste
        var liste_retour = purl(document.location).param('retour_liste');
        if(liste_retour){
            $('#retour_liste').attr('href', liste_retour);
        }
    });

})(jQuery, Drupal, this, this.document);
