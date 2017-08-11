<?php

/**
 *  Whoops Better Error Messages
 *
 * TODO: create a plugin to handle debugging
 *
 */
$path = $_SERVER['DOCUMENT_ROOT'] . '/wp-comp';
require $path . "/vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



/**
 * Debug with Kint
 *
 * var dump and die :)
 * @param $var
 */
function dd($var)
{
    d($var);
    die;
}




/**
 * Use parent theme css
 */
add_action('wp_enqueue_scripts', 'minim_enqueue_styles');

function minim_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}


?>