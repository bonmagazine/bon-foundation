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

    // HOME PAGE 
    var $home = $('body.home');
    if($home.length > 0) {

      // Logo animation in nav menu
      $('#biglogo').waypoint(function(){
        $('.tab-bar').toggleClass('show-menu');
      })
    }

    // BONBON lazyload
    $bonbon = $('.hentry.type-bon_minimagazine');
    if($bonbon.length > 0) {

      // Bon bon autoplay
      $('.minimagazine_video_autoplay').attr({
        loop: "",
        autoplay: "autoplay"
      });
      $('.wp-video-shortcode').attr({
        loop: "",
        autoplay: "autoplay"
      });

      $('.page')
        .waypoint(function() {
          
          $(this)
            .find('.minimagazine_video_autoplay')
            .attr({
              loop: "",
              autoplay: "autoplay"
            })
            .end()
            .addClass('show');

        }, {
          offset: '80%',
          triggerOnce: true
        });
    }

   // BONBON new article lazyload
    $bonbon = $('figure');
    if($bonbon.length > 0) {

      // Bon bon autoplay
      $('.minimagazine_video_autoplay').attr({
        loop: "",
        autoplay: "autoplay"
      });
      $('.wp-video-shortcode').attr({
        loop: "",
        autoplay: "autoplay"
      });



      $('figure')
        .waypoint(function() {
          $(this)
            .find('.minimagazine_video_autoplay')
            .attr({
              loop: "",
              autoplay: "autoplay"
            })
            .end()
            .addClass('show bounceIn');
        }, {
          offset: '40%',
          triggerOnce: true
        });
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
      fade: true,
      onInit: function() {
        $('.poster-wrapper video').each(function(index, el) {
          this.play();
        });
      }
    });
    $('.slick-orbit').slick({
      autoplay: false,
      dots: true,
    });

  }

  this.init();
}

var bon = new Bon();
