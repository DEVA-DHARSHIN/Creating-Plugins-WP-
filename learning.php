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
    function activation(){
        echo 'Hi Im Activated';
    }
    function deactivation(){
        echo 'Hi Im deActivated';
    }
}

if(class_exists('learning')){
    $Learning = new learning('Hi everyone');
}
 
register_activation_hook(__FILE__,array($Learning,'activation'));
register_deactivation_hook(__FILE__,array($Learning,'deactivation'));



//This is a simple class to check with constructor and instance creation.
// class learning
// {
//     function __construct($args){
//         echo $args;
//     }
// }

// if(class_exists('learning')){
//     $Learning = new learning('Hi everyone');
// }

?>  
