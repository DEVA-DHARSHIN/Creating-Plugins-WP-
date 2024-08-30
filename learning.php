<?php
/*Plugin Name: Learning 
Description: Learning about plugins.
Author: Deva
*/
if(!defined('ABSPATH')){
    exit;
}
class learning
{
    function __construct($args){
        echo $args;
    }
}

if(class_exists('learning')){
    $Learning = new learning('Hi everyone');
}
// function check($args){
//     echo $args;
// }
// check("hi everyone");
?>  