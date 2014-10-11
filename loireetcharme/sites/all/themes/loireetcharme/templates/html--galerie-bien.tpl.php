<?php
/**
 * @file
 * Zen theme's implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation. $language->dir
 *   contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $html_attributes: String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: Array of html attribute values. It is flattened
 *   into a string within the variable $html_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $default_mobile_metatags: TRUE if default mobile metatags for responsive
 *   design should be displayed.
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $skip_link_anchor: The HTML ID of the element that the "skip link" should
 *   link to. Defaults to "main-menu".
 * - $skip_link_text: The text for the "skip link". Defaults to "Jump to
 *   Navigation".
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can contain one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a Blog entry, this would be "node-type-blog".
 *     Note that the machine name of the content type will often be in a short
 *     form of the human readable label.
 *   The following only apply with the default sidebar_first and sidebar_second
 *   block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see zen_preprocess_html()
 * @see template_process()
 */
global $theme_path;
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes /*. $rdf_namespaces*/; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  
  <link rel="stylesheet" href="/sites/all/themes/loireetcharme/js/supersized/css/supersized.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/sites/all/themes/loireetcharme/js/supersized/theme/supersized.shutter.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="/sites/all/themes/loireetcharme/js/supersized/css/zoom.css" type="text/css" media="screen" /> 
  <script src="/sites/all/themes/loireetcharme/js/supersized/js/jquery.min.js?v=1.7.1"></script> 
  <script type="text/javascript" src="/sites/all/themes/loireetcharme/js/supersized/js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="/sites/all/themes/loireetcharme/js/supersized/js/supersized.3.2.7.min.js"></script>
	<script type="text/javascript" src="/sites/all/themes/loireetcharme/js/supersized/theme/supersized.shutter_zoom.js"></script>
  <script type="text/javascript" src="/sites/all/themes/loireetcharme/js/supersized/js/purl.js"></script>
  <script type="text/javascript" src="/sites/all/themes/loireetcharme/js/supersized/js/jquery.address-1.5.min.js"></script>
  
  <script type="text/javascript">
			
			jQuery(function($){
        
        var isiPad = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
        //isiPad = true;
        $('#bt_close').click(function(){
            var isiPad = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
            //isiPad = true;
            // sur l'ipad  on recharge l'url du bien car on ne passe pas par l'ifram (cf comportement ipad)
            if(isiPad){
              var base_retour = purl(document.location).param('url_page');
              var liste_retour = purl(document.location).param('retour_liste');
              var url_retour = liste_retour != '' ? base_retour+'?retour_liste='+encodeURIComponent(liste_retour.replace(/&amp;/g, "&")): base_retour;
              //console.log(url_retour);
              document.location = url_retour;
            }else{
              parent.iframe_close_galerie();
            }
            return false;
        });
        
        if(!isiPad) parent.iframe_ie_galerie();
        
				/*$('.view-galerie-bien').hide();*/
        
        var slides_sz = [];				
        $('.views-field-field-bien-image li').each(function(idx) {
					//
          var obj = {
						image: $("img", this).attr('src'),
						thumb: $(".views-field-field-bien-image-1 li:eq("+idx+") img").attr('src')
					};
					slides_sz.push(obj);
				});
        
        var isiPad = navigator.userAgent.toLowerCase().match(/iPad/i) != null;
        
        var gal_start_slide = <?php print (arg(2) + 1); ?>;
        
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	1,			// Slideshow starts playing automatically
					start_slide             :   gal_start_slide,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   4000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	1000,		// Speed of transition
					new_window				:	1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	1,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   1,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides : 	slides_sz,						
					// Theme Options			   
					progress_bar			:	1,			// Timer for each slide							
					mouse_scrub				:	0,
          image_path : '/sites/all/themes/loireetcharme/js/supersized/img/'
					
				});
});
		    
		</script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page; ?>
</body>
</html>
