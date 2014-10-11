(function($){

	$(document).ready(function(){

		$('.btnAddMedia').click(function(e){
			var $el = $(this).parent();
			e.preventDefault();
			var uploader = wp.media({
				title: 'Envoyer une image',
				button: {
					text : 'Choisir un fichier'
				},
				multiple: true
			})
			.on('select', function(){
				var selection = uploader.state().get('selection');
				var attachements = [];
				selection.map( function(attachement){
					attachement = attachement.toJSON();
					attachements.push(attachement.url);
				})
				$('input', $el).val(attachements.join(','));
			})
			.open();
		})
	})
})(jQuery);



