<?php
use Hospitalplugin\WP\ScriptsAndStyles;

$sas = new ScriptsAndStyles();
$sas->init(HOSPITAL_PLUGIN_URL, array(''), array('bootstrap.min.js'), array('bootstrap.min.css'), 'page');

include 'src/media_perms.php';

?>
