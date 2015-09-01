jQuery(document).ready(function(){
    var topReferenceBox = jQuery('.header');

    if (topReferenceBox.length > 0) {
        var bottomReferenceBox = jQuery('.footer');
        var videoReferenceBox = jQuery('.section_video');
        var bottomOffLine = jQuery(document).height() - bottomReferenceBox.offset().top - bottomReferenceBox.outerHeight() - videoReferenceBox.offset().top - videoReferenceBox.outerHeight();
        var topOffLine = topReferenceBox.offset().top + topReferenceBox.outerHeight() - 30;

        jQuery('.affix').affix({
            offset: {
            top: topOffLine,
            bottom: jQuery('.section_video').outerHeight(true) + jQuery('.footer').outerHeight(true) + 30
        }
        })
    }
    

    jQuery('.js-toggle-menu').on('click',function(e){
        e.preventDefault();

        jQuery('body').toggleClass('open-menu');
    })

    jQuery(document).on('click','.js-overlay-link, .overlay-menu a',function(e) {
        
        e.preventDefault();

        jQuery('#content-modal').modal('show');

        var overlay = jQuery('#content-modal');

        var area = jQuery(overlay).find('.modal-body').empty();

        var toLoad = jQuery(this).attr('href') + ' .js-article > *';

        jQuery(area).load(toLoad,function(){
            jQuery('.modal-body').fitVids();
        });

        return false;

    });

    jQuery('.scrollit').on('click',function(event){
        var jQueryanchor = jQuery(this);
        
        
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
        }, 1500);
        
        event.preventDefault();
    });
    
    jQuery(".content").scrollspy({target: "#scroll-nav", offset:200});

    jQuery('#form-modal').on('show.bs.modal', function (event) {
      var button = jQuery(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('title') // Extract info from data-* attributes
      var modal = jQuery(this);
      modal.find('#input_1_6').val(recipient);
     
    })

})
