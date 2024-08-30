<?php
/*
Plugin Name:Test action hook
Description:This is to know how the action hook works.
Version:1.6
Author: Devadharshini
*/
function hook_javascript() {
    ?>
        <script>
            alert('Hello world...as a message');
        </script>
    <?php
}
add_action('wp_head', 'hook_javascript');

?>
