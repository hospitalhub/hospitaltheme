
<?php
/**
 * The template for displaying all single posts.
 *
 * @package accesspress_parallax
 */

get_header(); 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/locale/bootstrap-table-pl-PL.min.js"></script>
<div class="mid-content clearfix">
        <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
<?php query_posts( 'category_name=Zamówienia&posts_per_page=-1' ); ?>


<div id="filter-bar"></div>
<script type="javascript">
    $(function() {
        $('#filter-bar').bootstrapTableFilter({
            filters:[
                {
                    field: 'id',    // field identifier
                    label: 'ID',    // filter label
                    type: 'range'   // filter type
                },
                {
                    field: 'label',
                    label: 'Label',
                    type: 'search',
                    enabled: true   // filter is visible by default
                },
                {
                    field: 'role',
                    label: 'Role',
                    type: 'select',
                    values: [
                        {id: 'ROLE_ANONYMOUS', label: 'Anonymous'},
                        {id: 'ROLE_USER', label: 'User'},
                        {id: 'ROLE_ADMIN', label: 'Admin'}
                    ],
                },
                {
                    field: 'username',
                    label: 'User Name',
                    type: 'search'
                },
                {
                    field: 'city',
                    label: 'City',
                    type: 'ajaxSelect',
                    source: 'http://example.com/get-cities.php'
                }
            ],
            onSubmit: function() {
                var data = $('#filter-bar').bootstrapTableFilter('getData');
                console.log(data);
            }
        });
    });
</script>


<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

 <table id="table"
		data-toggle="table"
               data-search="true"
		 data-filter-control="true"
               data-query-params="queryParams"
               data-toolbar=".toolbar"
		data-pagination="true"
	data-classes="table table-hover table-condensed"
	data-show-toggle="true"
       data-striped="true"
		>
            <thead>
            <tr>
                <th data-field="name" data-width="300">Tytuł</th>
                <th data-field="count">Data</th>
                <th data-field="ks_count" data-width="100">Dokumenty</th>
                <th data-field="action">Tagi</th>
            </tr>
            </thead>
<tbody>

<?php
// The Loop
while ( have_posts() ) : the_post(); ?>
<tr>

<td>  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> </a> <?php the_title(); ?> </td>
<td>  <?php the_time('d M Y') ?> </td>
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


<?php else: ?>
<p>Brak wpisów.</p>
<?php endif; ?>


                </main><!-- #main -->
        </div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

