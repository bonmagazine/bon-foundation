// Duplicate main nav for home page 
$menuclone = $('.menu-main-menu-container').clone();

$menuclone
  .find('[id]')
    .each(function() { 
      $(this).attr('id', Foundation.utils.random_str(6) );
    })
    .end()
  .addClass('home-menu')
  .appendTo('.site-header');

// Start Orbit and top bar
$(document).foundation();

// Masonry & Infinite Scroll
var $masonry = $('.masonry'),
    $infiniteScroll = $('.infinite-scroll');
if($masonry.length > 0) {

  var msnry = $masonry.masonry({
    itemSelector: '.hentry'
  });

  $masonry.infinitescroll( {
      behavior: "masonry",
      contentSelector: "#blog-list",
      debug: false,
      bufferPx: 600,
      itemSelector: ".hentry",
      loading: {
        finishedMsg: "<em>No additional posts.</em>",
        img: "",
        msgText: "<div class='loader'>Loading...</div>"
      },
      navSelector: "#nav-below",
      nextSelector: ".nav-next a"
    }, function(newElements) { 
      var $elems = $(newElements);
      $elems.imagesLoaded( function(){
        msnry.masonry('appended',$elems);
      })
    });
} else if($infiniteScroll.length > 0) {
  $infiniteScroll.infinitescroll( {
      contentSelector: "#blog-list",
      debug: false,
      bufferPx: 600,
      itemSelector: ".hentry",
      loading: {
        finishedMsg: "<em>No additional posts.</em>",
        img: "",
        msgText: "<div class='loader'>Loading...</div>"
      },
      navSelector: "#nav-below",
      nextSelector: ".nav-next a"
    });
}

Bon = function() {

  this.init = function() {

    // Initiate JW Player
    var $videoPlayer = $('.jwplayer-video');
    if($videoPlayer.length > 0) {
      this.videoplayer = new VideoPlayer();
    }

    // Sticky header for bon blogs
    var $bonBlogs = $('body.post-type-archive-bon_blogs');
    if($bonBlogs.length > 0) {
      $(".sticky").sticky({topSpacing:-130});
    }

  }

  this.init();
}

var bon = new Bon();
