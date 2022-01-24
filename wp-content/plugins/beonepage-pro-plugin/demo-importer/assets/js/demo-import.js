jQuery(function() {
	
		var importLink = jQuery('.button-hero').attr("href")
		var madalHtml = '<div class="modal"><div class="modal-overlay modal-toggle"></div><div class="modal-wrapper modal-transition"><div class="modal-header"><button class="modal-close modal-toggle"></button><h2 class="modal-heading">Notice</h2></div><div class="modal-body"><div class="modal-content"><p>It will <span>Earase all</span> data please take backup before import.</p><p>It will take <span>15-30 minutes</span> for import.</p><a href="'+ importLink + '" class="button_update">Continue...</a></div></div></div></div>';
		var madalPopupHtml = jQuery("<div>", {id: "update", "class": "beone_importer_notice hide_popup"});
		jQuery(".ocdi__button-container").append(madalPopupHtml);
		jQuery('.beone_importer_notice').html(madalHtml);
		
		jQuery('.button-hero').removeAttr("href");
		jQuery('.ocdi-import-mode-switch').removeAttr("href");
		jQuery('.button-hero').addClass('modal-toggle');
		jQuery('.ocdi-import-mode-switch').addClass('modal-toggle');
		
		jQuery('.modal-toggle').on('click', function(e) {
			e.preventDefault();
			jQuery('.modal').toggleClass('is-visible');
		});
	});