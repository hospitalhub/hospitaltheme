<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package accesspress_parallax
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->

<?php wp_head();?>
</head>

<body <?php body_class(); ?>>

<div id="leftSideSlideMenu" >
	<a id="simple-menu" href="#sidr"><i class="fa fa-bars"></i></a>
</div>

<div id="sidr">
<img src="<?php echo( get_header_image() ); ?>"

<?php
$menu = mainmenu();
?>

<div class="row">
        <ul class="nav nav-sidebar">
	<?php foreach($menu as $menuitem) { ?>
            <li>
                <div class="panel-group" id="accordion" style="margin-bottom: 0px;">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 0px 16px;">
                           <a data-toggle="collapse" data-parent="#accordion" style="padding: 8px;" href="#<?php echo $menuitem[1] ?>">
                             <h2 class="panel-title" style="font-size: 18px;"><?php echo $menuitem[2] ?></h2>
                          </a>
                        </div>
                        <div id="<?php echo $menuitem[1] ?>" class="panel-collapse collapse">
                            <div class="panel-body" style="padding: 0px;">
				<?php $items = mainmenuitems($menuitem[1]); ?>
                                <ul>
				    <?php foreach($items as $item) { ?>
                                    <li><a class="fa fa-ambulance" style="font-size:16px;" href="<?php echo $item[0] ?>"> <?php echo shortLongNames($item[1]) ?></a></li>
				    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
	<?php } ?>
            <li><a href="">Another nav item</a></li>
        </ul>
    </div>

</div>

<div id="page" class="hfeed site">

	<?php 
	$accesspress_show_slider = of_get_option('show_slider') ;
	$content_class = "";
	if(empty($accesspress_show_slider) || $accesspress_show_slider == "no"):
		$content_class = "no-slider";
	endif;
	?>
	<div id="content" class="site-content <?php echo $content_class; ?>">
	<?php 
	if(is_home() || is_front_page()) :
		do_action('accesspress_bxslider'); 
	endif;
	?>
