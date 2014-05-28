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
$(document).foundation({
  orbit: {
      animation: 'slide', 
      timer_speed: 4000, 
      next_on_click: false,
      animation_speed: 500, 
      stack_on_small: false,
      navigation_arrows: true,
      slide_number: false,
      timer_show_progress_bar: false,
      pause_on_hover: false,
      timer: true
  }
}).foundation({
  topbar: {
    sticky_class : 'sticky',
    custom_back_text: true, 
    back_text: 'Back', 
    is_hover: true,
    mobile_show_parent_link: true, 
    scrolltop : false 
  }
});

// Masonry & Infinite Scroll
var $blog = $('.blog-list');
if($blog.length > 0) {

  var msnry = $blog.masonry({
    itemSelector: '.hentry'
  });

  $blog.infinitescroll( {
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
}