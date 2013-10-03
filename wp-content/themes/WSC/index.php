<?php get_header(); ?>


<?php
if(is_home() || is_front_page() || is_page(array('home','homepagina','accueil'))){

// IS_HOME


// SLIDESHOW

if(wpmd_is_notphone()){


$original_query = $wp_query;
query_posts('posts_per_page=-1&post_type=slideshow');
$nbs = 0;
?>
<div id="slideshow">
<?php
if (have_posts()) :
while (have_posts()) : the_post();
	$color = get_post_meta($post->ID, "color", true);
	$link = get_post_meta($post->ID, "link".pll_current_language(), true);
?>
<div class="slide" id="slide<?php echo $nbs;?>">

<?php if(has_post_thumbnail()){ ?>

	<div class="innerslide">
		<?php if(strlen($link)>0){
		echo '
		<a href="'.$link.'">'; the_post_thumbnail(); echo '</a>
		';
		}else{
			the_post_thumbnail();
		};
		if(strlen(get_the_content())>0){ ?>
		<div class="caption" style="background:<?php echo (strlen($color)>0 ? $color : "#817673");?>">
			<?php the_content(); ?>
		</div>
		<?php } ?>
	</div>
<?php }else{ ?>
	<div class="innerslide">
		<?php if(strlen($link)>0){
		echo '
		<a href="'.$link.'">'.get_the_content().'</a>
		';
		}else{
			echo get_the_content();
		};
		?>
	</div>

<?php } ?>
</div>
<?php 	
	$nbs++;
	endwhile;
	if($nbs>1){
		echo '<nav id="hands">';
		for($i=$nbs;$i>0;$i--) echo '<a href="#'.($i-1).'" id="hand'.($i-1).'" class="slidehand'.($i==1?' on':'').'"></a>';
		echo '</nav>';
	} 
endif; ?>
</div>




<?php
}else{ //is phone
	if (have_posts()) :
		while (have_posts()) : the_post();
			the_content();
		endwhile;
	endif;
} //end is not phone


}else{



// OTHER PAGES
?>
<?php
if (have_posts()) :
while (have_posts()) : the_post();
	$sshow = get_post_meta($post->ID, "slideshow", true);

if(wpmd_is_notphone()){

	if(has_post_thumbnail()){
		echo '<div id="feature">
	';
		the_post_thumbnail();
		echo '</div>';
	}elseif(strlen($sshow)==0) echo '<div id="feature" class="empty"><img src="'.content_url().'/uploads/2013/07/default.jpg" alt="" /></div>';

}
?>


<section id="maincontent">
	<?php 
	$mycontent = get_the_content_filtered();
	$breaks = explode("<p>[break]</p>", $mycontent);
	
foreach($breaks as $break){	
	
	
	$cols = explode("<p>[sep]</p>", $break);
	if(count($cols) == 1){
		// 1 colonne
		the_content();
	}elseif(count($cols) == 2){
		// 2 colonnes
	?>
		<div class="col2 colleft"><?php echo $cols[0];?></div>
		<div class="col2 colright"><?php echo $cols[1];?></div>
		<div class="clear"></div>
	<?php
	}elseif(count($cols) == 3){
		// 2 colonnes + head
	?>
		<?php echo $cols[0]; ?>
		<div class="col2 colleft"><?php echo $cols[1];?></div>
		<div class="col2 colright"><?php echo $cols[2];?></div>
		<div class="clear"></div>	
	<?php }else{
		// 3 colonnes + head
	?>
		<?php echo $cols[0]; ?>
		<div class="col3 colleft"><?php echo $cols[1];?></div>
		<div class="col3 colright"><?php echo $cols[3];?></div>
		<div class="col3"><?php echo $cols[2];?></div>
		<div class="clear"></div>	
	<?php } ?>

	<hr />

<?php } ?>
</section>
	
	
	
	
<?php
endwhile;
endif;
}  // end other pages 

get_sidebar();
get_footer(); ?>
