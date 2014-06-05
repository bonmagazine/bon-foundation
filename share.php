<?php 
  $post_ID = get_query_var( 'vid' ); 
  $post = get_post( $post_ID ); 
  setup_postdata( $post ); 
  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php the_title(); ?> — <?php bloginfo(); ?></title>
  <style>
  html {
    overflow: hidden;
    height: 100%;
  }
  body {
    margin: 0;
    padding: 0;
  }
  video {
    width: 100%;
  }
  </style>
</head>

<body>
  <?php get_template_part( 'partials/videoplayer' ); ?>
  <?php wp_reset_postdata(); ?>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jwplayer/jwplayer.js"></script>
  <script>jwplayer.key="p8K1s8dYdTbGM5fWp6TooV9auuATbVSFI1imvajRHVs=";</script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/videoplayer/videoplayer.js"></script>
  <script type="text/javascript">

    // Once the video is ready
    $(".jwplayer-video").ready(function(){

      window.videoplayer = new VideoPlayer({embed: true});
      
    });
  </script>
</body>
</html>