<?php
$js =  array(
	'//live/wp-content/themes/bon/libs/modernizr/modernizr.js',
	'//live/wp-content/themes/bon/libs/jquery.tmpl/jquery.tmpl.min.js',
	'//live/wp-content/themes/bon/libs/jquery.cookie/jquery.cookie.js',
	'//live/wp-content/themes/bon/libs/jquery.masonry/jquery.masonry.2.min.js',
	'//live/wp-content/themes/bon/libs/jquery.printElement/jquery.printElement.js',
	'//live/wp-content/themes/bon/libs/jquery.history/jquery.history.js',
	'//live/wp-content/themes/bon/js/functions.js',
	'//live/wp-content/themes/bon/js/bon/bon.js',
	'//live/wp-content/themes/bon/js/main.js'
);

$jsControllers = array('landing', 'gallery', 'article', 'bonblog', 'page', 'minimagazines', 'minimagazine', 'section', 'film', 'twitter', 'videoplayer');
foreach ($jsControllers as $script) {
	$js[] = '//live/wp-content/themes/bon/js/bon/'.$script.'/bon.'.$script.'.js';
}