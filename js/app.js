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
    custom_back_text: true, // Set this to false and it will pull the top level link name as the back text
    back_text: 'Back', // Define what you want your custom back text to be if custom_back_text: true
    is_hover: true,
    mobile_show_parent_link: true, // will copy parent links into dropdowns for mobile navigation
    scrolltop : false // jump to top when sticky nav menu toggle is clicked
  }
});


// Masonry
var $blog = $('.blog-list');
if($blog.length > 0) {
  var msnry = $blog.masonry({
    itemSelector: '.post'
  });
}


//  Infinite Scroll
$('.blog-list').infinitescroll( {
    behavior: "masonry",
    contentSelector: "#blog-list",
    debug: false,
    bufferPx: 600,
    itemSelector: ".post",
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