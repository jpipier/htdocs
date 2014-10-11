// jQuery.fn.center = function () {
		

// 		if( (this.height() + 160) > jQuery(window).height()){
// 			this.css("position","relative");
// 			this.css("top", '' );
// 			this.css("left", '');
// 			this.css("margin", '0 auto 0px auto');
			
// 		}else{
// 			this.css("position","absolute");
// 			this.css("top", ((jQuery(window).height() - this.outerHeight()) / 2) + jQuery(window).scrollTop() - 74 + "px" );
// 			this.css("left", ((jQuery(window).width() - this.outerWidth()) / 2) + jQuery(window).scrollLeft() + "px");
// 			this.css("padding", '0 0 0 0');
// 		}

// 		return this;

// }


jQuery.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return jQuery.getUrlVars()[name];
  }
});

function getTid (url){
	tid = url.substring(url.length-1, url.length)
    return tid;
}

jQuery(document).ready(function() {

	jQuery("body").addClass(navigator.platform);
	if(jQuery.browser.webkit){
		jQuery("body").addClass('webkit');
	}			
	
	var userAgent = navigator.userAgent.toLowerCase(); 
	jQuery.browser.chrome = /chrome/.test(navigator.userAgent.toLowerCase()); 

	jQuery('#foo1').carouFredSel({
        scroll : {
            duration        : 1000,
            fx        	    : "fade"
        }                   
    });
	
	if((jQuery.browser.chrome) || (jQuery.browser.safari) || (jQuery.browser.msie)) {
		jQuery("#edit-field-bien-reference-value-wrapper label").css({ "margin-top" : "-9px"});
	}
	//
	
	// label ref nos biens à la vente		
	if (jQuery("#edit-field-bien-reference-value").val() != "")			
	{			
	// on cache le label		
	jQuery("#edit-field-bien-reference-value-wrapper label").hide();	
	}	

	jQuery("#edit-field-bien-reference-value").focusin(function(){		
	// on cache le label		
	jQuery("#edit-field-bien-reference-value-wrapper label").fadeOut();
	});			
	
	jQuery("#edit-field-bien-reference-value").focusout(function(){		
	if (jQuery(this).val() == "")	
	{				
	// on raffiche le label		
	jQuery("#edit-field-bien-reference-value-wrapper label").fadeIn();		
	}	
	});
	jQuery('#edit-field-bien-reference-value').val(function(){
	});

	var urlTids = jQuery.getUrlVar('field_bien_taxo_tid');
	if(urlTids != undefined && urlTids.indexOf("#") > 0 ){
		var tids = urlTids.split("#")
		urlTid =  tids[0]
	}else{
		urlTid =  urlTids	
	}
	if( jQuery('#databientid').length > 0 ){
		urlTid =  jQuery('#databientid').val();
		
	}

	jQuery ('#block-system-main-menu li.menu-416 ul li a').each(function(){
		var tid = getTid(jQuery(this).attr('href'));
		
		if(tid != urlTid ){
			jQuery(this).removeClass('active');
		}else{
			jQuery(this).addClass('active');
		}
	})

	
	jQuery (".page-nos-biens-a-la-vente #edit-field-bien-taxo-tid option[value='All']").text('Tous les biens');
	jQuery (".page-nos-biens-a-la-vente #edit-field-bien-fourchetteprix-tid option[value='All']").text('Tous les prix');
		
	var obligatoire = '<div id="form-obligatoire"><p>*champs obligatoires</p></div>';
	jQuery ( '#webform-client-form-5 #edit-actions,#webform-client-form-25 #edit-actions,#webform-client-form-25 #edit-actions--2, #webform-client-form-19 #edit-actions, #webform-client-form-19 #edit-actions--3').prepend(obligatoire); 

	jQuery("#nav-toggle").click(function(){
			jQuery(this).toggleClass('activeCross');
			jQuery('nav #block-menu-menu-menu-mobile').toggleClass('MenuActive');
			jQuery('header').toggleClass('MenuActiveHeader');
	});
	

	// fade caroussel home page
	jQuery('#node-26 .field-items').cycle('fade');
	// fade caroussel home page facebook
	jQuery('#fb-accueil-caroussel .field-items').cycle('fade');
	

	// fade page simple
	jQuery('.node-article .content-image .field-items').cycle('fade');	

	

	//debug(jQuery('#content').height());
	//debug(jQuery(window).height());
	
	//Liste filter
		var sort = jQuery.getUrlVar('sort_order');
		var asc = (sort=='ASC')?'selected="selected"':'';
		var desc = (sort=='DESC')?'selected="selected"':'';

		jQuery(".views-submit-button").before('<div id="edit-field-bien-sort-price" class="views-exposed-widget"><div class="views-widget"><select class="" name="sort_price" id="edit-sort-price"><option '+asc+' value="ASC">Prix croissants</option><option '+desc+' value="DESC">Prix décroissant</option></select></div></div>')
		
		jQuery("#edit-sort-price").change(function () {
			var str = "";
			jQuery("select option:selected").each(function () {
                str = jQuery(this).val();
			});
		  
			jQuery("#edit-sort-order option").each(function () {
				
              
				
				 jQuery(this).val(str);
				  jQuery(this).text(str)
			  
			});



		})
	
	//var d = new Date();
	//var curr_year = d.getFullYear();
	//jQuery('#footer-wrapper #block-menu-menu-mention-credit ul').prepend('<li><span>@ '+curr_year+'</span></li>');

	jQuery("#views-exposed-form-recherche-page select").uniform();

	if( jQuery('#clientsidevalidation-webform-client-form-19-errors').css() == 'block' ){
		jQuery('#clientsidevalidation-webform-client-form-19-errors').css('display','hidden')
	}

	/* Debut Facebook formulaire contact */
	var form_submit_contact = false;
	function submit_contact(){
		jQuery('.node-type-facebook #webform-client-form-19').submit(function() {
			if(!form_submit_contact){
				
				form_submit_contact = true;
				var datas = jQuery(this).serialize();
				var action = jQuery(this).attr("action");
				jQuery.ajax({
					type: 'POST',
					url: action,
					data: datas,
					context: document.body,
					success: function(retour){
						var page = jQuery(retour);
						errors = page.find('#messages').html();
						if(errors!= null){
							var formulaire  = page.find(".content-contact").html();
							jQuery("#fb-form-contact-form").html(formulaire);
							jQuery ('#fb-form-vendeur-form #edit-actions').prepend(obligatoire); 
							initDefaultInFieldLabel();
							form_submit_contact = false;
					  	 	submit_contact();
						}else{
							jQuery("#fb-form-contact-form #webform-client-form-19").remove();
							jQuery("#fb-form-contact-form").html('Loire et Charme vous remercie.')
						}
					}					
				});
			}
			return false;
		});
	}
	submit_contact();
	/* Fin Facebook formulaire contact */
	

	/* Debut Facebook formulaire vendeur */
	var form_submit_vendeur = false;
	function submit_vendeur(){
		jQuery('.node-type-facebook #webform-client-form-5').submit(function() {
			if(!form_submit_vendeur){
				
				form_submit_vendeur = true;
				var datas = jQuery(this).serialize();
				var action = jQuery(this).attr("action");
				jQuery.ajax({
					type: 'POST',
					url: action,
					data: datas,
					context: document.body,
					success: function(retour){
						var page = jQuery(retour);
						errors = page.find('#messages').html();
						if(errors!= null){
							var formulaire  = page.find("#content-formdemande-form").html();
							var intro =  page.find("#form-contact-intro-text").html();
							
							jQuery("#fb-form-vendeur-form").html(formulaire);
							jQuery("#fb-form-vendeur-form").prepend(intro);
							jQuery ('#fb-form-vendeur-form #webform-client-form-5 #edit-actions').prepend(obligatoire); 

							initDefaultInFieldLabel();
							form_submit_vendeur = false;
					  	 	submit_vendeur();
						}else{
							jQuery("#fb-form-vendeur-form #webform-client-form-5").remove();
							jQuery("#fb-form-vendeur-form").html('Loire et Charme vous remercie.')
						}
					}					
				});
			}
			return false;
		});
	}
	submit_vendeur();
	/* Fin Facebook formulaire contact */


	/* Debut Facebook formulaire aquereur */
	var form_submit_aquereur = false;
	function submit_aquereur(){
		jQuery('.node-type-facebook #webform-client-form-25').submit(function() {
			if(!form_submit_aquereur){
				form_submit_aquereur = true;
				var datas = jQuery(this).serialize();
				var action = jQuery(this).attr("action");
				jQuery.ajax({
					type: 'POST',
					url: action,
					data: datas,
					context: document.body,
					success: function(retour){
						var page = jQuery(retour);
						errors = page.find('#messages').html();
						if(errors!= null){
							page.find('#edit-actions').attr("id","edit-actions--2");
							page.find('#edit-submit').attr("id","edit-submit--2");
							var formulaire  = page.find("#content-formdemande-form").html();
							jQuery("#fb-form-aquereur-form").html(formulaire);
							
							initDefaultInFieldLabel();
							form_submit_aquereur = false;
					  	 	submit_aquereur();
						}else{
							jQuery("#fb-form-aquereur-form #webform-client-form-25").remove();
							jQuery("#fb-form-aquereur-form").html('Loire et Charme vous remercie.')
						}
					}					
				});
			}
			return false;
		});
	}
	submit_aquereur();
	/* Fin Facebook formulaire aquereur */





	initDefaultInFieldLabel();

	if( jQuery('.node-type-facebook').length > 0 ){
		initFacebookNavigation();
	}
	
	/*
	window.fbAsyncInit = function()
	{
		FB.Canvas.setSize({ width: 810, height: 900 });
	}
	*/
	
	jQuery('li.menu-544 a, li.menu-545 a, #fb-nosbiens a').attr('target', '_blank');

	

	jQuery('.node-type-bien #block-system-main-menu ul.menu li.menu-416').addClass('active-trail');


	function initSlider() {  
	  
		//get the current position of the active item  
		var dleft = jQuery('#block-system-main-menu ul.menu li.active-trail').offset().left - jQuery('#block-system-main-menu .content').offset().left;  
		var dwidth = jQuery('#block-system-main-menu ul.menu li.active-trail').width() + "px";  

		//apply the current position of active item to our floatr element  
		jQuery('.floatr').css({  
			"left": dleft+"px",  
			"width": dwidth  
		});  

		jQuery('#block-system-main-menu>.content>ul.menu>li').hover(function(){  
			
			var liElement = jQuery(this).offset().left;
			var conteneur = jQuery('#block-system-main-menu .content').offset().left

			var left =  liElement - conteneur;  
			
			var width = jQuery(this).width() + "px";  
			var sictranslate = "translate("+left+"px, 0px)";  
	  
			jQuery('.floatr').css({  
				"width": width,  
				"-webkit-transform": sictranslate,  
				"-moz-transform": sictranslate,
				"-o-transform": sictranslate,
				"-ms-transform": sictranslate
			});  
	  
		},  
	  
		function(){  
			var liElement = jQuery('#block-system-main-menu ul.menu li.active-trail').offset().left;
			var conteneur = jQuery('#block-system-main-menu .content').offset().left
				
			var left = liElement  - conteneur;  
			var width = jQuery(this).siblings('li.active-trail').width() + "px";  
			var sictranslate = "translate("+left+"px, 0px)";  
	  
			jQuery(this).parent('ul').next('div.floatr').css({  
				"width": width,  
				"-webkit-transform": sictranslate,  
				"-moz-transform": sictranslate,
				"-o-transform": sictranslate,
				"-ms-transform": sictranslate
	  
			});  
	  
		});
	}
	/*
	jQuery('#block-system-main-menu .content').append('<div class="floatr"></div>');
	initSlider();
	*/
	

	if( jQuery('#fb-conteneur').length > 0){ 
		jQuery('#fb-nosbiens').css('display','none');
		jQuery('#fb-form-vendeur').css('display','none');
		jQuery('#fb-form-aquereur').css('display','none');
		jQuery('#fb-form-contact').css('display','none');
		jQuery('#fb-loading').fadeOut();
		jQuery('#mlagence').addClass('active')
	}


    	jQuery("#sticker").sticky({topSpacing:0});

    	jQuery("#edit-field-bien-reference-value").focus(function(){

    		jQuery("#edit-field-bien-taxo-tid-wrapper ,#edit-field-bien-fourchetteprix-tid-wrapper,#edit-field-bien-sort-price ").css("opacity", "0.2");
    		jQuery("#edit-field-bien-taxo-tid-wrapper option:selected,#edit-field-bien-fourchetteprix-tid-wrapper option:selected,#edit-field-bien-sort-price option:selected").val('All')
    	});
		jQuery("#edit-field-bien-reference-value").focusout(function(){

    		jQuery("#edit-field-bien-taxo-tid-wrapper ,#edit-field-bien-fourchetteprix-tid-wrapper,#edit-field-bien-sort-price ").css("opacity", "1");
    		jQuery("#edit-field-bien-taxo-tid-wrapper option:selected,#edit-field-bien-fourchetteprix-tid-wrapper option:selected,#edit-field-bien-sort-price option:selected").val('All')
    	});
    	jQuery('.charte').click(function(){
    		jQuery('.modal').css('display','block');
    		jQuery('.fade').css('opacity','1');
    		jQuery('.close, .modal').click(function(){
	    		jQuery('.modal').css('display','none');
	    		jQuery('.fade').css('opacity','0');

    		})

    	});
});



function initDefaultValue(){
	/* Default value for webform*/
	jQuery('#webform-client-form-5 .form-item, #webform-client-form-19 .form-item, #node-25 fieldset .form-item, #node-25 #webform-component-acquereur-commentaires.form-item').each(function (i) {
        jQuery(this).find("input").DefaultValue(jQuery(this).find('label').text());
        jQuery(this).find("textarea").DefaultValue(jQuery(this).find('label').text());	
	})
}

function initDefaultInFieldLabel(){
	/* Default value for webform*/
	jQuery('#forward-form .form-item, #webform-client-form-5 .form-item, #webform-client-form-19 .form-item, #webform-client-form-25 fieldset .form-item, #webform-client-form-25 #webform-component-acquereur-commentaires.form-item').each(function (i) {
        jQuery(this).find("label").inFieldLabels();
	})
}


// devrait etre en var publique!
var fbCurrentTab = '#fb-accueil'; 

function initFacebookNavigation(){

// pour chaque clic, il faut redefinir la hauteur de la div fb-conteneur
	jQuery('#mlagence').click(function(){
		if(fbCurrentTab != '#fb-accueil'){
			jQuery('#fb-accueil').fadeIn();
			jQuery(fbCurrentTab).fadeOut();
			//switchfacebook('#fb-accueil', fbCurrentTab);
			fbCurrentTab = '#fb-accueil';
			clearClass();
			jQuery('#mlagence').addClass('active');		
			
			jQuery("#fb-conteneur").css('height', '780px');
			
			FB.Canvas.setSize({ width: 810, height: 1000 });
		}

	})

	jQuery('#mnosbiens').click(function(){
		if(fbCurrentTab != '#fb-nosbiens'){
			jQuery(fbCurrentTab).fadeOut();
			jQuery('#fb-nosbiens').fadeIn();
			//switchfacebook('#fb-nosbiens', fbCurrentTab);
			fbCurrentTab = '#fb-nosbiens';
			clearClass();
			jQuery('#mnosbiens').addClass('active');
			//##NOTE: si on affiche plus de bien, il faudra ajuster la hauteur de la div
			jQuery("#fb-conteneur").css('height', '1344px');
			
			FB.Canvas.setSize({ width: 810, height: 1500 });
		}
	})

	jQuery('#mvendeur').click(function(){
		if(fbCurrentTab != '#fb-form-vendeur'){
			jQuery(fbCurrentTab).fadeOut();
			jQuery('#fb-form-vendeur').fadeIn();
			//switchfacebook('#fb-form-vendeur', fbCurrentTab);
			fbCurrentTab = '#fb-form-vendeur';
			clearClass();
			jQuery('#mdemandes').addClass('active');
			
			jQuery("#fb-conteneur").css('height', '670px');
			
			FB.Canvas.setSize({ width: 810, height: 820 });
		}
	})
	jQuery('#maquereur').click(function(){
		if(fbCurrentTab != '#fb-form-aquereur'){
			jQuery(fbCurrentTab).fadeOut();
			jQuery('#fb-form-aquereur').fadeIn();
			//switchfacebook('#fb-form-aquereur', fbCurrentTab);
			fbCurrentTab = '#fb-form-aquereur';
			clearClass();
			jQuery('#mdemandes').addClass('active');
			jQuery(this).addClass('active');
			jQuery("#fb-conteneur").css('height', '950px');
			FB.Canvas.setSize({ width: 810, height: 1100 });
		}
	})
	jQuery('#mcontact').click(function(){
		if(fbCurrentTab != '#fb-form-contact'){
			jQuery(fbCurrentTab).fadeOut();
			jQuery('#fb-form-contact').fadeIn();
			//switchfacebook('#fb-form-contact', fbCurrentTab);
			fbCurrentTab = '#fb-form-contact';
			clearClass();
			jQuery('#mcontact').addClass('active');
			jQuery("#fb-conteneur").css('height', '900px');
			FB.Canvas.setSize({ width: 810, height: 1100 });
		}
	})

	
	//FB.Canvas.setAutoResize();
	
    var reg=new RegExp("(https://ssl10.ovh.net/~loireetc/)", "g");
   jQuery("a").each(function()
   { 
      this.href = this.href.replace(reg, 
         "http://www.loireetcharme.com/");
   });
   
   jQuery('#mlagence').attr("href","#lagence");
   jQuery('#mnosbiens').attr("href","#nosbiens");
   jQuery('#mdemandes').attr("href","#demandes");
   jQuery('#mvendeur').attr("href","#vendeur");
   jQuery('#maquereur').attr("href","#lagence");
   jQuery('#mcontact').attr("href","#acquereur");
   
   //FB.Canvas.setAutoGrow(7);
   
   
	//FB.Canvas.setSize({ height: 900 });
	/*
	window.fbAsyncInit = function () 
	{
	
	    FB.Canvas.setSize({
	       height: 1500
	    });
		
		//FB.Canvas.setAutoGrow();
		//FB.Canvas.setSize();
	}

	function sizeChangeCallback() 
	{
	
	    FB.Canvas.setSize({
	       height: 900
	    });
		
		//FB.Canvas.setAutoGrow();
		//FB.Canvas.setSize();
	}
	*/
   
	//alert(fbCurrentTab);
}

function clearClass(){
	jQuery('#fb-menu a').each(function(){
		jQuery(this).removeClass('active');
	})
}


function switchfacebook(element1, element2){
	//alert(element1+"   "+ element2);
	jQuery(element1).css('left', '-600px');
	if(!jQuery.browser.msie){
		jQuery(element1).css('opacity', '0');
	}
	jQuery(element1).css('display', 'block');
	jQuery(element2).css('display', 'none');
	
	
	if(!jQuery.browser.msie){
		jQuery(element1).animate({
			opacity: 1,
			left: 0,
		  }, 500, function() {
			// Animation complete.

		  });

		jQuery(element2).animate({
			opacity: 0,
			left: '-600px',
		  }, 500, function() {
			// Animation complete.
		  });
	}else{
		jQuery(element1).animate({

			left: 0,
		  }, 500, function() {
			// Animation complete.

		  });

		jQuery(element2).animate({

			left: '-600px',
		  }, 500, function() {
			// Animation complete.
		  });	
	}
	
   /*
	if(typeof FB.Canvas.setAutoResize == "function") {
	// function exists, so we can now call it
		FB.Canvas.setAutoResize();
	}
	*/
	
}
var phForms = $('.webform-client-form'),
            phFields = 'input[type=text], input[type=text], input[type=email], textarea, input[type=number], input[type=number]';

        function placeholder(){ 
                phForms.find(phFields).each(function(){ 

                var el = $(this), 
                    wrapper = el.parents('.form-item'), 
                    lbl = wrapper.find('label'), 
                    lblText = lbl.text();

                el.attr("placeholder",lblText);

                lbl.hide();

                });

            }

            jQuery(function($){
                    placeholder(); 
        });