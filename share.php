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
  <meta property="og:title" content="<?php the_title(); ?>"/>
  <meta property="og:description" content="<?php the_title(); ?>"/>
  <meta property="og:type" content="movie"/>
  <meta property="og:video:height" content="270"/>
  <meta property="og:video:width" content="480"/>
  <meta property="og:url"  content="<?php the_permalink(); ?>"/>
  <?php $video_urls = bon_get_film_sources(); ?>
  <?php foreach ($video_urls as $video_url): ?>
  <meta property="og:video" content="<?php echo $video_url ?>">
  <meta property="og:video:secure_url" content="<?php echo $video_url ?>">
  <?php endforeach; ?>
  <meta property="og:image" content="<?php echo bon_get_film_poster(); ?>"/>
  <meta property="og:video:type" content="application/x-shockwave-flash">
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