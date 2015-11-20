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



/**
 * AJAX posts filter
 *
 */

// Enqueue script
function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_stylesheet_directory_uri() . '/src/ajax-filter-posts.js', false, null, false);
  wp_enqueue_script('afp_script');

  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);

$result = array();

// Script for getting posts
function ajax_filter_get_posts( $taxonomy ) {

  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

  if (isset( $_POST['taxonomy'] )) {
  	$taxonomy = $_POST['taxonomy'];
  } else {
  	$taxonomy = 'oddzial';
  }

  // WP Query
  $args = array(
    'tag'            => $taxonomy,
    'post_type'      => 'post',
    'posts_per_page' => -1,
  );

  // If taxonomy is not set, remove key from array and get all posts
  if( !$taxonomy ) {
    unset( $args['tag'] );
  }

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

if(has_post_thumbnail()) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'portfolio-thumbnail');
$img_src= esc_url($image[0]);
} else {
$img_src = get_template_directory_uri() . '/images/no-image.jpg';
}
    $result['response'][] = '<a href="'. get_the_permalink() .'" class="portfolio-list wow fadeInUp" data-wow-delay="'.$i.'"s">' .
			'<div class="portfolio-image">
                        <img style="height:150px;" src="'. $img_src . '" alt="'.get_the_title().'" />' . 
				//'<img src="'.esc_url($image[0]).'" alt="'.the_title().'">
                        '</div>
			<h3 class="fa fa-stethoscope">' .get_the_title().'</h3>
			</a>
			' . wp_reset_postdata();
//'<h2><a href="'.get_permalink().'">'. get_the_title().'</a></h2>' . get_the_excerpt();
    $result['status']     = 'success';

  endwhile; else:
    $result['response'] = '<h2>No posts found</h2>';
    $result['status']   = '404';
  endif;
 
  $result = json_encode($result);
  echo $result;

  die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');

function tags_filter() {
    $term_parent = get_term_by('name', 'Szpital', 'category');
    $parent_id = $term_parent->term_id;
    $tax = 'category';
    $args = array(
	'child_of' => $parent_id
    );
    $terms = get_terms( $tax, $args );
    $count = count( $terms );
 
    if ( $count > 0 ): ?>
        <div class="post-tags">
        <?php
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $tax );
            echo '<a href="' . $term_link . '" class="tax-filter btn btn-primary" style="color:#fff;" title="' . $term->slug . '">' . $term->name . '</a> ';
        } ?>
        </div>
    <?php endif;
}



//translation
add_action( 'after_setup_theme', 'my_child_theme_setup' );
function my_child_theme_setup() {
	load_child_theme_textdomain( 'my_child_theme', get_stylesheet_directory() . '/languages' );
}



?>
