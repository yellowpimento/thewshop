<?php

// FOCUS
if(wpmd_is_notphone()){
	wp_reset_postdata();
	query_posts('posts_per_page=4&post_type=focus');
	$nbf = 0;
	?>
	<div class="clear"></div>
	<aside id="focuses">
	<?php
	if (have_posts()) :
	while (have_posts()) : the_post();
		$color = get_post_meta($post->ID, "color", true);
		$link = get_post_meta($post->ID, "link".pll_current_language(), true);
	?>
	<article class="focus<?php echo ($nbf==3?' last':'');?>" id="focus<?php echo $nbf;?>">
		<div class="innerfocus">
			<?php if(strlen($link)>0) echo '<a href="'.$link.'"'.(strpos($link, 'http://')!==false ? ' target="_blank"' : '').'>';
			echo get_the_post_thumbnail($post->ID, 'thumbnail');
			?>
			<h3<?php if(strlen($link)>0) echo ' class="link"'; ?> style="background:<?php echo (strlen($color)>0 ? $color : "#451b32");?>"><?php the_title(); ?></h3>
			<article class="article"><?php the_content(); ?></article>
			<?php if(strlen($link)>0) echo '</a>';?>
		</div>
	</article>
	<?php 	
		$nbf++;
		endwhile;
	endif;
?>
</aside>
<div class="clear"></div>
<?php } ?>