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

      // Logo stuff
      $('.site-header').waypoint(function(){
        $('.nav-menu-wrapper').toggleClass('show-logo');
      })

      // Duplicate main nav for home page
      // $menuclone = $('.menu-main-menu-container').clone();
      // $menuclone
      //   .find('[id]')
      //     .each(function() { 
      //       $(this).attr('id', Foundation.utils.random_str(6) );
      //     })
      //     .end()
      //   .addClass('home-menu')
      //   .appendTo('.site-header');
    }

    // Start Orbit and top bar
    $(document).foundation();

  }

  this.init();
}

var bon = new Bon();
