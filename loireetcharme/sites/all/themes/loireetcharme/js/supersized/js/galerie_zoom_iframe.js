

(function ($, Drupal, window, document, undefined) {

    Drupal.galerie_with_admin_menu = false;
    
    $(document).ready(function() {
        if($('body').hasClass('admin-menu')) $.galerie_with_admin_menu = true;
    }); 
        
    $.open_galerie = function(url){
        if($.galerie_with_admin_menu){
            $("#admin-menu").hide();
            $('body').removeClass('admin-menu');
        }
        
        // filter pour ie -> iframe transparente
        $('body').prepend('<div id="c_galerie_iframe"><iframe id="galerie_iframe" src="'+url+'" frameborder="0"  allowtransparency="true" style="filter: chroma(color=#ffffff)"></iframe></div>');
        
        return false;
    }
    
    Drupal.close_galerie = function(){
        $('#c_galerie_iframe').remove();
         if($.galerie_with_admin_menu){
            $('body').addClass('admin-menu');
            $("#admin-menu").show();
        }
        return false;
    }
    
    Drupal.ie_galerie = function(){
        $('#galerie_iframe').attr('style','');
    }

})(jQuery, Drupal, this, this.document);

function iframe_close_galerie(){
   Drupal.close_galerie();
}

function iframe_ie_galerie(){
   Drupal.ie_galerie();
}