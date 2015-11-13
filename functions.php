<?php
use Hospitalplugin\WP\ScriptsAndStyles;

$sas = new ScriptsAndStyles();
$sas->init(HOSPITAL_PLUGIN_URL, array(''), array('bootstrap.min.js'), array('bootstrap.min.css'), 'page');

include 'src/media_perms.php';

// 

function hospital_scripts() {
//	wp_enqueue_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'__FILE__ );
	wp_enqueue_script( 'control', get_stylesheet_directory_uri() . '/src/control.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'hospital_scripts' );

?>
