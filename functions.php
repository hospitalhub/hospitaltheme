<?php
use Hospitalplugin\WP\ScriptsAndStyles;


$sas = new ScriptsAndStyles();
$sas->init(HOSPITAL_PLUGIN_URL, array(''), array('bootstrap.min.js','bootstrap-table.min.js', 'getorgchart.js'), array('bootstrap.min.css','bootstrap-table.min.css', 'getorgchart.css'), 'page');

include 'src/media_perms.php';

// 

function hospital_scripts() {
// bootstrap 3 shortcodes POPOVER dla menu
wp_enqueue_script( 'bo.otstrap-shortcodes-popover', BS_SHORTCODES_URL . 'js/bootstrap-shortcodes-popover.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'bootrap-popover-show', get_stylesheet_directory_uri() . '/src/popover.js', array('jquery'));
//
wp_enqueue_script( 'sidr', '//cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js', array('jquery') );
wp_enqueue_style( 'sidr', '//cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css');
//
if(is_page('schemat-organizacyjny')) {
	wp_enqueue_script( 'orgchart', get_stylesheet_directory_uri() . '/src/orgchart.js', array('jquery'));
    //wp_enqueue_script('getorgscript', get_stylesheet_directory_uri() . '/js/getorgchart.js', array('jquery'));
    //wp_enqueue_style( 'getorgstyle', get_stylesheet_directory_uri() . '/js/getorgchart.css' );
}

//if(is_page('ksiazka-telefoniczna')) {
// TODO XXX phonebook
//	wp_enqueue_script( 'phonebook', get_stylesheet_directory_uri() . '/src/phonebook.js', array('jquery'));
    //wp_enqueue_script('btable', get_stylesheet_directory_uri() . '/js/bootstrap-table.min.js', array('jquery'));
// }
}
add_action( 'wp_enqueue_scripts', 'hospital_scripts' );



/**
 * AJAX posts filter
 *
 */
// TODO XXX REMOVE FILTER
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




// XXX TODO REMOVE
// Script for getting posts
$result = array();
function ajax_filter_get_posts( $taxonomy ) {

  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) ) {
    die('Permission denied');
  }

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
$img_src = get_stylesheet_directory_uri(). '/images/' . $taxonomy . '.jpg';
}
    $result['response'][] = '<a href="'. get_the_permalink() .'" class="portfolio-list wow fadeInUp">' .
			'<div class="portfolio-image">
                        <img src="'. $img_src . '" alt="'.get_the_title().'" />' . 
				//'<img src="'.esc_url($image[0]).'" alt="'.the_title().'">
                        '</div>
			<h3 class="fa fa-stethoscope"> ' .get_the_title().'</h3>
			</a>
			' . wp_reset_postdata();
//'<h2><a href="'.get_permalink().'">'. get_the_title().'</a></h2>' . get_the_excerpt();
    $result['status']     = 'success';

  endwhile; else:
    $result['response'] = '<h2>Brak danych</h2>';
    $result['status']   = '404';
  endif;
 
  $result = json_encode($result);
  echo $result;

  die();
}

// XXX TODO remove both lines
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');


// XXX TODO REMOVE @deprecated
function tags_filter() {
    $term_parent = get_term_by('name', 'Szpital', 'category');
    $parent_id = $term_parent->term_id;
    $tax = 'category';
    $args = array(
    'orderby'           => 'ID',
    'order'             => 'ASC',
	'child_of' => $parent_id
    );
    $terms = get_terms( $tax, $args );
    $count = count( $terms );
 
    if ( $count > 0 ): ?>
        <div class="post-tags">
        <?php
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $tax );
            echo '<a href="' . $term_link . '" class="tax-filter btn btn-primary btn-xs" style="color:#fff;" title="' . $term->slug . '">' . $term->name . '</a> ';
        } ?>
        </div>
    <?php endif;
}


// left side slide menu
function mainmenu() {
    $term_parent = get_term_by('name', 'Szpital', 'category');
    $parent_id = $term_parent->term_id;
    $tax = 'category';
    $args = array(
    'orderby'           => 'ID',
    'order'             => 'ASC',
        'child_of' => $parent_id
    );
    $terms = get_terms( $tax, $args );
    $count = count( $terms );

    $menu = array();
    if ( $count > 0 ) {
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $tax );
            //echo $term_link . $term->slug . $term->name;
            array_push($menu, array($term_link, $term->slug, $term->name));
        } 
    }
   return $menu;
}


function shortLongNames( $name ) {
  $name = str_replace('Oddział ','O/',$name);
  $name = str_replace('Poradnia ','P/',$name);
  $name = str_replace('Zakład ','Z/',$name);
  return $name;
}

function mainmenuitems( $taxonomy ) {

// XXX RM ?
//  if (isset( $_POST['taxonomy'] )) {
//        $taxonomy = $_POST['taxonomy'];
//  } else {
//        $taxonomy = 'oddzial';
//  }

  // WP Query
  $args = array(
    'tag'            => $taxonomy,
    'post_type'      => 'post',
    'posts_per_page' => -1,
  );

  // If taxonomy is not set, remove key from array and get all posts
  // XXX  rm?
  if( !$taxonomy ) {
    unset( $args['tag'] );
  }

  $query = new WP_Query( $args );
  $result = array();

  if ( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post();
     		array_push($result, array( get_the_permalink(), get_the_title(), get_the_ID()));
                wp_reset_postdata();
  endwhile; 
//  else:
//    $result['response'] = '<h2>Brak danych</h2>';
//    $result['status']   = '404';
  endif;

 // $result = json_encode($result);
  return $result;

//  die();
}



/**
 * 
 * 
 *  ORG CHART ENDPOINT
 * 
 * 
 */


/**
 * Rewrite an endpoint to get GIFs.
 */
function orgchart_endpoint() {
	add_rewrite_tag( '%orgchart%', '([^&]+)' );
	add_rewrite_rule( 'orgchart/([^&]+)/?', 'index.php?orgchart=$matches[1]', 'top' );

}
add_action( 'init', 'orgchart_endpoint' );

/**
 * Pass through the data to the endpoint.
 */
function orgchart_endpoint_data() {

	global $wp_query;

	$gif_tag = $wp_query->get( 'orgchart' );

	if ( ! $gif_tag ) {
		return;
	}

	$gif_data = array();

	$args = array(
			'post_type'      => 'page',
			'pagename' => 'Schemat Organizacyjny'
	);
	$gif_query = new WP_Query( $args );
	if ( $gif_query->have_posts() ) : while ( $gif_query->have_posts() ) : $gif_query->the_post();
	$img_id = get_post_thumbnail_id();
	$img = wp_get_attachment_image_src( $img_id, 'full' );
	$gif_data = json_decode(get_the_content());
	endwhile; wp_reset_postdata(); endif;

	wp_send_json( $gif_data );

}
add_action( 'template_redirect', 'orgchart_endpoint_data' );




//translation
add_action( 'after_setup_theme', 'hospitaltheme_setup' );
function hospitaltheme_setup() {
	load_child_theme_textdomain( 'hospitaltheme', get_stylesheet_directory() . '/languages' );
}

//
// ZAMÓWIENIA PUBLICZNE
// PUBLIC PROCUREMENT
// zapisywanie raportów
//

add_action( 'save_post', 'send_email' );
function send_email( $post_id ) {
	if (in_category ( 'zamowienia' , $post_id )) {
		$post_url = get_permalink( $post_id );
		$post_title = get_the_title( $post_id );
		$sanitized = mb_strimwidth( sanitize_title( str_replace('/','_', $post_title) ) , 0, 25, "_");
		$subject = 'Publikacja';
		$date = new \DateTime('now', new \DateTimeZone('Europe/Warsaw'));
		$message = "<html><head><meta charset=\"UTF-8\"></head><body>";
		$message .="<b>$post_title</b>\n\n<br/><br/>";
		$message .= $date->format('Y-m-d H:i:s') . " zapisano:\n<br/>";
		$message .="O treści: " . get_post_field('post_content', $post_id );
		//$email = get_post_meta($post_id, 'email')
		//$email = "zam.pub_szpital.kalisz@poczta.fm"
		//sends email
		//$ret = wp_mail($email, $subject, $message );
		//saves file
		$filename = "/var/www/~stronka/SIWZ/potwierdzenie/".$date->format('Y-m-d_H-i')."__" . $sanitized . ".html";
		file_put_contents($filename,$message);
		chmod($filename, 0666);
	}
}


?>
