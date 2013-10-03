	</div><!-- /masterpage -->
	</div><!-- /innerpage -->
</div><!-- /page -->

<?php
wp_reset_postdata();
?>
<?php if(wpmd_is_notphone()){?>

<footer id="footer">
	<div id="innerfooter">
		<aside id="coord">
		<?php
		query_posts(array ( 'category_name' => 'admin-'.pll_current_language(), 'posts_per_page' => 1 ));
		if (have_posts()) :
			the_post();
			$ccor = get_the_content_filtered();
			echo $ccor;
		endif;
		?>
		</aside>
		<nav id="footermenu">
			<?php
				wp_nav_menu(array('menu' => 'Footer menu '.pll_current_language()));
			?>
		</nav>
		<div class="clear">&nbsp;</div>
	</div>
</footer>

<?php }else{ ?>
<nav id="footermenuphone">
	<?php
		wp_nav_menu(array('menu' => 'Mobile Menu '.pll_current_language()));
	?>
</nav>
<?php } ?>

	
<?php if(wpmd_is_notphone()){?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.timer.js"></script>
<?php } ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js?v=3"></script>
<?php wp_footer(); ?>
</body>
</html>
