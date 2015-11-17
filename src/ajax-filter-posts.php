<?php
/**
 * AJAX posts filter
 *
 */

// Enqueue script
function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/tuts/ajax-filter-posts/ajax-filter-posts.js', false, null, false);
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

  $taxonomy = $_POST['taxonomy'];

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

    $result['response'][] = '<h2><a href="'.get_permalink().'">'. get_the_title().'</a></h2>' . get_the_excerpt();
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
