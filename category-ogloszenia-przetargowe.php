
<?php
/**
 * The template for displaying all single posts.
 *
 * @package accesspress_parallax
 */

get_header(); 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/locale/bootstrap-table-pl-PL.min.js"></script>

<div class="mid-content clearfix">
        <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
<?php 
	$tagi = array();

	if( empty($_POST["zp_rok"]) ) {
	 $rok = date("Y"); 
	} else {
	 $rok = $_POST["zp_rok"];
        }
	//array_push($tagi,$rok);

	if ( !empty($_POST["zp_typ"]) ) {
		array_push($tagi,$_POST["zp_typ"]);
	} 

	if ( !empty($_POST["zp_co"]) )  {
	  if (intval($rok) >= 2016 ) {
	    array_push($tagi,$_POST["zp_co"]);
	  } else {
	    echo "<span style=color:red;>*wybór dostawy/usługi dostępny od 2016 r.</span>";
	  }
	} 
	
	echo "Wyświetlane <b>";
	foreach($tagi as $tag) {
	   echo $tag . " ";
	}
	echo "</b>";

	query_posts( array('year' => $rok, 'category_name'=>'Zamówienia', 'posts_per_page'=>'-1', 'tag_slug__and'=> $tagi )); 
?>

<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>


<form name="customer_details" method="POST" onsubmit="return form_validation()" action="ogloszenia-przetargowe">
<select name="zp_rok">
<?php
foreach (range(date("Y"),2010,-1) as $year) {
	echo "<option value=\"$year\">$year</option>";
}
?>
</select>
<select name="zp_typ">
 <option disabled selected value> -- wybierz by wyszukać -- </option>
 <option value="ogloszenia-przetargowe">Ogłoszenia Przetargowe (powyżej 30 tys. euro)</option>
 <option value="do-30-tys-euro">do 30 tys. euro</option>
 <option value="do-14-tys-euro">do 14 tys. euro (2014 i wcześniej)</option>
 <option value="inne-konkursy">Inne Konkursy</option>
</select>
<select name="zp_co">
 <option disabled selected value> -- wybierz by wyszukać -- </option>
 <option value="dostawy">Dostawy</option>
 <option value="uslugi">Usługi</option>
</select>
<input type="submit" value="OK"/>
</form>

 <table id="table"
 			data-toggle="table"
 			data-search-text="" 
			data-search="true"
			data-pagination="true"
			data-classes="table table-hover table-condensed"
			data-show-toggle="true">

            <thead>
            <tr>
                <th data-field="name" data-width="300">Tytuł</th>
                <th data-field="date">Data</th>
                <th data-field="docs" data-width="100">Dokumenty</th>
                <th data-field="tags">Tagi</th>
            </tr>
            </thead>
<tbody >

<?php
// The Loop
while ( have_posts() ) : the_post(); ?>
<tr>
<td>  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> </a> <?php the_title(); ?> </td>
<td>  <?php the_time('d-m-Y') ?> </td>
<td> <div class="entry"><?php the_content(); ?></div> </td>
<td> <?php  $cats = get_the_terms(get_the_ID(),'post_tag'); 
foreach($cats as $cat) {
	if ($cat->name != "Zamówienia") {
	echo "<div class=\"btn-s btn-primary\">$cat->name</div><br/>";
	}
}
?>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<script type="text/javascript">
jQuery(document).ready(function($) {
//	$('#table').bootstrapTable('destroy');
});
</script>

<?php else: ?>
<p>Brak wpisów.</p>
<?php endif; ?>

                </main><!-- #main -->
        </div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

