(function( $ ){

  "use strict";

  var simpleLightBox = function () {

    var cache = {};

    function init() {

      //partial cache
      cache.$images   = $(this);
      cache.$body     = $('body');

      //check if there are selected elements and if they are images
      if( cache.$images.length != 0 && cache.$images.is('img') ) {

        _createWrapper();
        _cacheDom();
        _bindEvents();
        _markImages();
      }
    }

    function disable() {
      
      _markImages();
      _unbindEvents();
      _destroyWrapper();
      delete simpleLightBox.cache;
    }

    function _createWrapper() {

      var lightBoxHtml;

      if( $("#lightbox-wrapper").length == 0 ) {

        lightBoxHtml = '<div id="lightbox-wrapper">';
          lightBoxHtml += '<div id="ligthbox-image-wrapper">';
            lightBoxHtml += '<img id="lightbox-image" src="" />';
          lightBoxHtml += '</div>';
          lightBoxHtml += '<div id="close-lightbox">&#x2715;</div>';
        lightBoxHtml += '</div>';

        cache.$body.append(lightBoxHtml);
      }
    }

    function _cacheDom() {

      cache.$window           = $(window);
      cache.$doc              = $(document);
      cache.$closeBtn         = $("#close-lightbox");
      cache.$lightBoxImage    = $("#lightbox-image");
      cache.$lightBoxWrapper  = $("#lightbox-wrapper");
    }
    
    function _bindEvents() {

      cache.$images.on('click', _openImage);
      cache.$closeBtn.on('click', _hideWrapper);
      cache.$lightBoxWrapper.on('click', _hideWrapper);
      cache.$doc.on('keyup', _hideWrapperViaEsc);
      cache.$window.on('resize', _onWindowResize);
    }

    function _unbindEvents() {

      cache.$images.off('click', _openImage);
      cache.$lightBoxWrapper.off('click', _hideWrapper);
      cache.$closeBtn.off('click', _hideWrapper);
      cache.$doc.off('keyup', _hideWrapperViaEsc);
      cache.$window.off('resize', _onWindowResize);
    }

    function _markImages() {

      cache.$images.toggleClass('smp-lightbox');
    }

    function _destroyWrapper() {

      cache.$lightBoxWrapper.remove();
    }

    function _hideWrapper() {

      cache.$lightBoxWrapper.removeClass('active');
    }

    function _hideWrapperViaEsc(event) {
      
      //the escape key code is 27
      if (event.keyCode == 27) {
        _hideWrapper();
      }
    }

    function _openImage() {
      
      var currentSrc = $(this).attr('src');
      var winHeight = cache.$window.height();
    
      //add the image that you clicked on inside the lightbox
      cache.$lightBoxImage.attr('src', currentSrc);

      //limit the image height to the size of the screen
      cache.$lightBoxImage.css('maxHeight', winHeight);
      
      //open the lightbox
      cache.$lightBoxWrapper.addClass('active');
    }

    function _onWindowResize() {

      //limit the image height to the size of the screen
      var winHeight = cache.$window.height();
      cache.$lightBoxImage.css('maxHeight', winHeight);
    }

    return {
      init: init,
      disable: disable
    };
  }();

  $.fn.simpleLightBox = function(methodOrOptions) {

    if ( simpleLightBox[methodOrOptions] ) {

      return simpleLightBox[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
      
      // Default to "init"
      return simpleLightBox.init.apply( this, arguments );
    } else {
      
      $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.simpleLightBox' );
    }    
  };

})( jQuery );