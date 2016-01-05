<?php
/**
 * Template Name: PARTNERSHIP
 *
 * @package accesspress_parallax_child
 */
get_header();
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>
<?php

$args = array(
	'post_type' => 'post',
	'category_name' => 'Fundusze+Partnerzy'
	);
// The Query
query_posts( $args );

// The Loop
echo '<div class="partnerzy">';
while ( have_posts() ) : the_post();
    echo '<div>';
//    the_title();
    if(has_post_thumbnail()) {
          $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'portfolio-thumbnail');
$img_src= esc_url($image[0]);
} else {
$img_src = get_stylesheet_directory_uri(). '/images/x.jpg';
}
   echo '<a href="'. get_the_permalink() .'" class="portfolio-list wow fadeInUp"><div class="portfolio-image"><img src="'. $img_src . '" alt="'.get_the_title().'" /></div>';

    echo '</div>';
endwhile;
echo '</div>';
// Reset Query
wp_reset_query();

?>

<script type="text/javascript">
    $(document).ready(function(){
      $('.partnerzy').slick({
	infinite: true
      });
    });
  </script>

 
<?php
get_footer();
?>
