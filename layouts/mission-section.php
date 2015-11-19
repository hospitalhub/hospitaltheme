<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

<div class="blog-listing clearfix">
	<?php
	$args = array (
			'cat' => $category,
			'posts_per_page' => 3 
	);
	$count_service = 0;
	$query = new WP_Query ( $args );
	if ($query->have_posts ()) :
		$i = 0;
		while ( $query->have_posts () ) :
			$query->the_post ();
			$i = $i + 0.25;
			?>

		<a href="<?php the_permalink(); ?>" class="blog-list wow fadeInDown"
		data-wow-delay="<?php echo $i; ?>s">
		<div class="blog-excerpt karta">
			<?php echo the_content(); ?>
			</div>
		</a>

		<?php
		endwhile;
		wp_reset_postdata ();
		endif;
	?>
	</div>
<div class="clearfix btn-wrap">
	<a class="btn" href="<?php echo get_category_link($category)?>"><?php _e('Więcej','accesspress-parallax'); ?></a>
</div>

