<?php get_header(); ?>


<section id="maincontent">
	<div id="single_sector">
	<?php if('fr'==pll_current_language()){?>
	Résultat de votre recherche pour "<?php echo $s; ?>"
	<?php }else{?>
	Search Results for: "<?php echo $s; ?>"
	<?php } ?>
	</div>
	
<?php
if (have_posts()) :
while (have_posts()) : the_post();
?>
	<article class="search">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p><?php the_excerpt();?></p>
	</article>
<?php
endwhile;
endif;
?>
	<p><br /></p>
</section>

<?php
get_sidebar();
get_footer(); ?>
