(function($){
    "use strict";


    
    $('body').on('click','.search-wrapper .search-icon', e=>{
        e.preventDefault();
        $('.header-search-content').toggleClass('active');
        $('.search-wrapper .search-icon').children().toggleClass('active');

        setTimeout(()=> {
            $('form.search-form .search-field').focus();
        }, 100);
        
    });

   

    //close search box  when the user clicks outside the serach area.
	document.addEventListener( 'click',  event => {
        let searchArea      = document.querySelector( '.search-wrapper' );
		let isClickInside   = searchArea.contains( event.target );
        let searchContent   = document.querySelector('.header-search-content');
        let searchIcon      = document.querySelector('.search-wrapper .search-icon');

		if ( ! isClickInside ) {
            if( searchContent.classList.contains('active')){
                
                searchContent.classList.remove('active');
                searchIcon.classList.remove('active');
                searchIcon.children[1].classList.remove('active');
                searchIcon.children[0].classList.add('active');
            }
		}
	});


$(document).ready(()=> {
    xews_lite_digital_time();
    setInterval(xews_lite_digital_time, 1000);
})

let xews_lite_digital_time = () => {
    let currentDate         = new Date(),
        hourNow             = Number(currentDate.getHours(), 10),
        minNow              = Number(currentDate.getMinutes(), 10),
        secNow              = Number(currentDate.getSeconds(), 10),
        timeNow             = hourNow+':'+minNow+':'+secNow;
        $('.header-date .time').text(timeNow);
}

$('body').on('click','h3.comment-toggle', ()=>{
    $(this).toggleClass('active');
    $('.comments-area').slideToggle();
    $('.fas.fa-chevron-up,.fas.fa-chevron-down').toggle();
});




/**
* Sticky sidebar
*
*/
var stickySidebar       = xewsLocalizeScript.stickySidebar;
var stickySidebarBlog   = xewsLocalizeScript.stickySidebarBlog;

if( stickySidebarBlog == true ){
    $('body.blog aside.widget-area.secondary').theiaStickySidebar({
        additionalMarginTop: 30
    });
}

if( stickySidebar == true ){
    $('body.single aside.widget-area.secondary').theiaStickySidebar({
        additionalMarginTop: 30
    });
}
$('.social-outer-wrapp').theiaStickySidebar({
    additionalMarginTop: 100
});




/**
 * Single post scroll progress bar
 * 
 */
$(document).on('ready', function() { 

    var winHeight = $(window).height(), 
        docHeight = $(document).height(),
        footerHeight = $('.site-footer').height(),
        progressBar = $('progress'),
        max, value;

    /* Set the max scrollable area */
    max = docHeight - winHeight - footerHeight;
    progressBar.attr('max', max);

    $(document).on('scroll', function(){
        value = $(window).scrollTop();
        progressBar.attr('value', value);
    });

});


/**
 *  Mobile Menu Toggle
 * 
 */ 
 $('body').on('click keypress','#mob-toggle-menu-button, #mob-menu-collapse', function(e) {
    e.preventDefault();
    
    $('header.site-header').toggleClass('is-opened');
    $('body').toggleClass('modal-window-active');
    $('.main-navigation').toggleClass('toggled');
 })

    
 var _doc = document;
_doc.addEventListener( 'keydown', function( event ) {
    var toggleTarget, modal, selectors, elements, menuType, bottomMenu, activeEl, lastEl, firstEl, tabKey, shiftKey;
        
    if ( _doc.body.classList.contains( 'modal-window-active' ) ) {
        toggleTarget = '.site-header .main-navigation';
        selectors = 'input, a, button';
        modal = _doc.querySelector( toggleTarget );
        elements = modal.querySelectorAll( selectors );
        elements = Array.prototype.slice.call( elements );
        if ( '.menu-modal' === toggleTarget ) {
            menuType = window.matchMedia( '(min-width: 1000px)' ).matches;
            menuType = menuType ? '.expanded-menu' : '.mobile-menu';
            elements = elements.filter( function( element ) {
                return null !== element.closest( menuType ) && null !== element.offsetParent;
            } );
            elements.unshift( _doc.querySelector( '.mob-toggle-menu-button' ) ); 
            bottomMenu = _doc.querySelector( '.menu-last-focus-item' );
            if ( bottomMenu ) {
                bottomMenu.querySelectorAll( selectors ).forEach( function( element ) {
                    elements.push( element );
                } );
            }
        }

        lastEl      = elements[ elements.length - 1 ];
        firstEl     = elements[0];
        activeEl    = _doc.activeElement;
        tabKey      = event.keyCode === 9;
        shiftKey    = event.shiftKey;

        if ( ! shiftKey && tabKey && lastEl === activeEl ) {
            event.preventDefault();
            firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === activeEl ) {
            event.preventDefault();
            lastEl.focus();
        }
    }
} );


    

 /**
  * Ajax search
  * 
  */
$('body').on('focusout', '.site-header input[type="search"]', function () { 
    $('body').on('click keypress', '.site-header:not(.search-content)', function () { 
        $('.site-header .search-content').hide();
    });
});

$('.site-header input[type="search"]').on('keyup',function(){
    $('.site-header .search-content').html('');

    var searVal = $(this).val();
    if( searVal.length >= 3 ){
      $('.site-header .search-content').show();
      $('.xews-search-form i.fas.fa-spinner.fa-spin').show(); //spinner
      var dis = $(this);
      var keyword = $(this).val();
      
      $('.site-header,.vmagazine-mobile-search-wrapper').find('.block-loader').show();
       $.ajax({
                url : xewsLocalizeScript.ajaxurl,
                data:{
                      action : 'xews_lite_ajax_search_function',
                      key:  keyword,
                    },
                type:'post',
                success: function(res){    
                        $('.site-header .search-content').html(res);
                        $('.site-header .ajax-search-view-all:not(:last),.vmagazine-mobile-search-wrapper .ajax-search-view-all:not(:last)').remove();
                        $('.site-header .block-loader,.vmagazine-mobile-search-wrapper .block-loader').hide();
                        $('.xews-search-form i.fas.fa-spinner.fa-spin').hide(); //spinner
                    }
            });
    }

  });


})(jQuery);