<?php
/* Load the Theme class. */
function theme_enqueue_child_style(){
	wp_enqueue_style('theme-child-style', get_stylesheet_directory_uri(). '/style.css',array('theme-style','theme-skin'),false,'all');
}
add_action('wp_print_styles', 'theme_enqueue_child_style');

/**
 * Added to resolve gravatar.com blocked problem
 * */
function get_ssl_avatar($avatar){
	$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
	return $avatar;
}
add_filter('get_avatar','get_ssl_avatar');