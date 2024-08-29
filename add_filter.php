<?php
/*
Plugin Name:Test filetr hook
Description:This is to know how the filter hook works.
Version:1.6
Author: Devadharshini
*/
add_filter( 'the_content', 'change_content' );
function change_content ( $content ) {
    $content = 'Filter hooks are amazing!';
    return $content;
}
function wporg_filter_title( $title ) {
	return 'The ' . $title . ' was filtered';
}
add_filter( 'the_title', 'wporg_filter_title' );
?>