<?php
/*Plugin Name:Test remove action hook
Description: This is to remove the action added to the footer.
Version:8.52
Author:Samvel
*/
remove_action('wp_footer', 'my_custom_footer');

add_action('wp_footer', 'my_custom_footer');
function my_custom_footer_message() {
    echo '<p>HI ADMIN</p>';
}
function my_custom_footer() {
    echo '<p>HI ADMIN removed</p>';
}
?>