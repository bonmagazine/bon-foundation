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
  $infiniteScroll.waypoint('infinite', {
    onAfterPageLoad: function() {
      // Disqus comment counts for bon blog posts loaded via ajax
      // TODO: fetch this only for new elements via Disqus API
      if($infiniteScroll.hasClass('bon-blog-list')) {
        window.DISQUSWIDGETS = undefined;
        $.getScript("http://bonmagazine.disqus.com/count.js");
      }
    }
  });
}

Bon = function() {

  this.init = function() {

    // Skip button for campaign
    var $skipBtn = $('.campaign-promo-wrap .btn-skip');
    if($skipBtn.length > 0) {
      $skipBtn.click(function(e) {
        $('.campaign-promo-container').remove();
        $('body').removeClass('campaign-active');
      });
    }

    // Initiate JW Player
    var $videoPlayer = $('.jwplayer-video');
    if($videoPlayer.length > 0) {
      this.videoplayer = new VideoPlayer();
    }

    // Sticky header for bon blogs
    var $bonBlogs = $('body.post-type-archive-bon_blogs,body.single-bon_blogs,body.single-bon_blogs_pages');
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

    // Mobile specific 
    if(!matchMedia(Foundation.media_queries['medium']).matches) {
      // Disable dropdown nav
      $(".left-off-canvas-menu")
        .find('[data-dropdown]').removeAttr('data-dropdown').end()
        .find('.f-dropdown').removeClass('f-dropdown');

      // Vertically Expandable nav
      $('.left-off-canvas-menu')
        .find('.has-dropdown > a')
          .click( function(e) {
            e.preventDefault();
            $(this).parent().toggleClass('expanded-vertically');
          });
    }

    // Collapse nav when title is clicked
    $('.off-canvas-title a')
      .click(function(e){
        e.preventDefault();
        $('.off-canvas-wrap').removeClass('offcanvas-overlap');
      });   

    // Start Orbit and top bar and dropdown
    $(document).foundation({
      offcanvas : {
        open_method: 'overlap',
        close_on_click: false
      },
      dropdown: {
          is_hover: 'true',
          align: 'right'
        }
    });

    // Slick Carousel for landing page Poster
    $('.poster-wrapper').slick({
      autoplay: true,
      dots: true,
      onInit: function() {
        $('.poster-wrapper video').each(function(index, el) {
          this.play();
        });
      }
    });

  }

  this.init();
}

var bon = new Bon();
