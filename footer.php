<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package accesspress_parallax
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) :?>
		<div class="top-footer footer-column-4">
			<div class="mid-content">
            <div class="top-footer-wrap clearfix">
				<div class="footer-block">
				<iframe width="320" height="200" src="https://www.youtube-nocookie.com/embed/7zi5KpHnzhQ?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				<iframe width="320" height="200" src="https://www.youtube-nocookie.com/embed/r2q-OI_xhmY?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>

				<?php if(is_active_sidebar('footer-2')): ?>
				<div class="footer-block">
					<?php dynamic_sidebar('footer-2'); ?>
				</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer-3')): ?>
				<div class="footer-block">
					<?php dynamic_sidebar('footer-3'); ?>
				</div>
				<?php endif; ?>

			<div class="footer-block" >
				<h2 class="widget-title">Fundusze</h2>

					<div id="carousel-example-generic2" class="carousel slide" data-interval="2000" data-ride="carousel" >
  <!-- Wskaźniki w postaci kropek -->
  <div class="carousel-inner">
  <!-- Slajdy -->
					   <?php $items = mainmenuitems("Partnerzy"); 
						$active = true;
                                    		foreach($items as $item) { ?>
    <div class="item <?php if ($active) { echo "active"; $active = false; } ?>">
	<a href="<?php echo $item[0] ?>"><?php echo get_the_post_thumbnail($item[2]); ?> </a>
    </div>
<?php						}
						?>

  </div>

  <!-- Strzałki do przewijania -->
  <a class="left carousel-control" href="#carousel-example-generic2" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic2" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>
		<br/><i class="fa fa-list-ol"> Kliknij na logo, by poznać szczegóły</i>
				</div>
            </div>
			</div>
		</div>
		<?php endif; ?>
		

		<div class="bottom-footer">
			<div class="mid-content clearfix">
				<div  class="copy-right">
					&copy; <?php echo date('Y')." "; bloginfo('name'); ?>  
				</div><!-- .copy-right -->
				<div class="site-info">
					<?php _e('AccessPress Parallax by','accesspress-parallax'); ?> <a href="<?php echo esc_url('http://accesspressthemes.com/'); ?>" title="AccessPress Themes" target="_blank">AccessPress Themes</a>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="go-top"><a href="#page"><i class="fa fa-angle-up"></i></a></div>

<?php wp_footer(); ?>
</body>
</html>
