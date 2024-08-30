<?php
/*Plugin Name: Learning 
Description: Learning about plugins.
Author: Deva
*/
if(!defined('ABSPATH')){
    exit;
}

class Learning
{
    function __construct(){
        add_action('init',array($this,'cust_post_type'));
    }
    function activation(){
        //echo 'Hi Im Activated';
    }
    function deactivation(){
        //echo 'Hi Im deActivated';
    }
    function cust_post_type(){
        register_post_type('book',['public'=>true,'label'=>'Book']);
    }
}

if(class_exists('Learning')){
    $learning = new Learning('Hi everyone');
}
 
register_activation_hook(__FILE__,array($learning,'activation'));
register_deactivation_hook(__FILE__,array($learning,'deactivation'));



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
