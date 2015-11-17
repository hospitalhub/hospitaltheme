<?php
/**
 * Template Name: AM
 *
 * @package accesspress_parallax_child
 */

get_header();
?>


<!-- LAYOUT -->
<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */

		tags_filter();
		wp_reset_postdata();
?>

	<div class="blog-listing clearfix">
	<div class="tax-filter">
    </div>
    <div class="tagged-posts">
    </div>
	</div>
	
<!-- END LAYOUT -->


<?php

get_footer();
?>
