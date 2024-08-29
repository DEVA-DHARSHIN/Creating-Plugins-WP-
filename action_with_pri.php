<?php
/*
Plugin Name: Custom Init Action Example
Description: An example plugin to demonstrate action hooks with priority and size.
Version: 2.0
Author: Your Name
*/

// Define a custom function to be hooked
function custom_init_function($arg) {
    // Your custom code
    echo 'This function is hooked into the init action with priority 10 and 1 argument.';
    // Example using the argument
    if ($arg) {
        echo ' Argument: ' . $arg;
    }
}
add_action('init','custom_init',9,1);
function custom_init($arg) {
    // Your custom code
    echo 'This function is hooked into the init action with priority 9 and 1 argument.';
}
// Add the custom function to the init action hook
add_action('init', 'custom_init_function', 10, 1);
?>