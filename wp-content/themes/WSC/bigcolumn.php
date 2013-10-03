<?php
/*
Template name: Big column
*/

get_header(); ?>


<?php
if (have_posts()) :
while (have_posts()) : the_post();
	$sshow = get_post_meta($post->ID, "slideshow", true);
?>

<?php 
if(has_post_thumbnail()){
	echo '<div id="feature">
';
if(wpmd_is_notphone()){
		the_post_thumbnail();
}else{
		the_post_thumbnail('large');
}
	echo '</div>';
}elseif(strlen($sshow)==0) echo '<div id="feature" class="empty"><img src="'.content_url().'/uploads/2013/07/default.jpg" alt="" /></div>';
?>




<section id="maincontent">
	<?php 
	$mycontent = get_the_content_filtered();
	$breaks = explode("<p>[break]</p>", $mycontent);
	
foreach($breaks as $break){	
	
	
	$cols = explode("<p>[sep]</p>", $break);
	// 2 colonnes + head
	?>
		<?php echo $cols[0]; ?>
		<div class="col2 col2big colleft"><?php echo $cols[1];?></div>
		<div class="col2 col2lit colright"><?php echo $cols[2];?></div>
		<div class="clear"></div>	

	<hr />

<?php } ?>
</section>
	
	
	
	
<?php
endwhile;
endif;

get_sidebar();
get_footer(); ?>
