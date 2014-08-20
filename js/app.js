// Masonry & Infinite Scroll
var $masonry = $('.masonry'),
    $infiniteScroll = $('.infinite-scroll');

if($masonry.length > 0) {
  var msnry = $masonry.imagesLoaded( function(){
    $masonry.masonry({
      itemSelector: '.hentry'
    });
  });
  $masonry.waypoint('infinite', {
    behavior: 'masonry',
    onAfterPageLoad: function(newElements) {
      var $elems = $(newElements);
      $elems.imagesLoaded( function(){
        $masonry.append($elems).masonry('appended', $elems);
      })
    }
  });
} 
else if($infiniteScroll.length > 0) {
  $infiniteScroll.waypoint('infinite');
}

Bon = function() {

  this.init = function() {

    // Skip button for campaign
    var $skipBtn = $('.campaign-promo-wrap .btn-skip');
    if($skipBtn.length > 0) {
      $skipBtn.click(function(e) {
        $('body').removeClass('campaign-active');
      });
    }

    // Initiate JW Player
    var $videoPlayer = $('.jwplayer-video');
    if($videoPlayer.length > 0) {
      this.videoplayer = new VideoPlayer();
    }

    // Sticky header for bon blogs
    var $bonBlogs = $('body.post-type-archive-bon_blogs,body.single-bon_blogs');
    if($bonBlogs.length > 0) {
      $sticky = $('.sticky');
      $sticky.waypoint('sticky', {offset: $sticky.css('top')});
    }

    // HOME PAGE 
    var $home = $('body.home');
    if($home.length > 0) {

      // Logo animation in nav menu
      $('.site-header').waypoint(function(){
        $('.nav-menu-wrapper').toggleClass('show-logo');
      })
    }

    // Off canvas nav
    $('.left-off-canvas-menu')
      .find('.has-dropdown > a')
        .click( function(e) {
          e.preventDefault();
          $(this).parent().toggleClass('expanded');
        })
        .end()
      .find('.off-canvas-title a')
        .click(function(e){
          e.preventDefault();
          $('.off-canvas-wrap').removeClass('offcanvas-overlap');
        });  

    // Search label
    $('label.search-nav-title').click(function(e){
      $s = $('#s');
      // Submit search by clicking label
      if( $s.val() !== "" ) {
        $('form[role=search]').submit();
      } 
      $s.parent().toggleClass('focus');
    });

    // Share Buttons
    $('.share .icon').click(function(){
      $(this).parent().toggleClass('open');
    });

    // Start Orbit and top bar
    $(document).foundation({
      offcanvas : {
        open_method: 'overlap',
        close_on_click: false
      }
    });

  }

  this.init();
}

var bon = new Bon();
