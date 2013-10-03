<?php get_header(); ?>


<?php
if (have_posts()) :
the_post();

$temp = get_post_custom_values("logo");
if(isset($temp[0])) $logo = '<h1><img id="shoplogo" src="'.$temp[0].'" alt="'.get_the_title().'" /></h1>';
else $logo = '<h1>'.get_the_title().'</h1>';

$temp = get_post_custom_values("hour".pll_current_language());
if(isset($temp[0])) $hours[pll_current_language()] = $temp[0];
else{
	$hours['fr'] = 'Lundi, mardi, mercredi,<br />jeudi et samedi <strong>de 10h à 19h</strong>.<br />Vendredi <strong>jusqu’à 20h</strong>.';
	$hours['nl'] = 'Maandag, dinsdag, woensdag,<br />donderdag en zaterdag <strong>van 10u tot 19u</strong>.<br />Vrijdag <strong>tot 20u</strong>.';
	$hours['en'] = 'Monday, Tuesday, Wednesday,<br />Thursday and Saturday <strong>from 10am to 7pm</strong>.<br />Friday <strong>till 8pm</strong>.';
}

$temp = get_post_custom_values("contact");
if(isset($temp[0])) $contact = $temp[0];
else $contact = '';

$temp = get_post_custom_values("email");
if(isset($temp[0])) $email = $temp[0];
else $email = '';

$temp = get_post_custom_values("facebook");
if(isset($temp[0])) $fb = $temp[0];
else $fb = '';

$temp = get_post_custom_values("twitter");
if(isset($temp[0])) $tw = $temp[0];
else $tw = '';

$temp = get_post_custom_values("website");
if(isset($temp[0])) $ws = $temp[0];
else $ws = '';

$temp = get_post_custom_values("pinterest");
if(isset($temp[0])) $pt = $temp[0];
else $pt = '';

$temp = get_post_custom_values("newshop");
if(isset($temp[0])) $newshop = '<img src="'.get_bloginfo('template_directory').'/icons/new.png" alt="New shop" />&nbsp;';
else $newshop = '';

?>

<?php 
if(wpmd_is_notphone()){
	if(has_post_thumbnail()){
		echo '<figure id="feature">
	';
		the_post_thumbnail();
		if (class_exists( 'kdMultipleFeaturedImages')) {
			echo kd_mfi_get_the_featured_image('featured-image-2', 'shops' );
			echo kd_mfi_get_the_featured_image('featured-image-3', 'shops' );
			echo kd_mfi_get_the_featured_image('featured-image-4', 'shops' );
			echo kd_mfi_get_the_featured_image('featured-image-5', 'shops' );
			echo kd_mfi_get_the_featured_image('featured-image-6', 'shops' );
		}
		echo '</figure>';
	}else echo '<figure id="feature" class="empty"><img src="'.content_url().'/uploads/2013/07/default.jpg" alt="" /></figure>';
}else{
	if(has_post_thumbnail()){
		echo '<figure id="feature">
	';
		the_post_thumbnail('large');
		echo '</figure>';
	}else echo '<figure id="feature" class="empty"><img src="'.content_url().'/uploads/2013/07/default.jpg" alt="" /></figure>';
}
?>


<section id="maincontent">
	<aside id="sector"><?php $terms = get_the_terms( $post->id, 'sector' ); 
if ( $terms && ! is_wp_error( $terms ) ) : 
	$links = array();
	foreach ( $terms as $term ) {
		$links[] = '<a href="' .get_term_link($term->slug, 'sector') .'">'.$term->name.'</a>';
	}
	$mylinks = join( " / ", $links );	
	echo $mylinks;
endif;
	?></aside>
	
	<div id="single_sector">
	<?php echo $newshop; the_title(); ?>
	</div>
	<article class="article">
		<br />

<?php if(wpmd_is_phone()) the_content(); ?>
		<aside class="contact">
			<h2>Contact</h2>
			<p>
			<?php echo (strlen($contact)>0 ? $contact : '' ).''.(strlen($email)>0 ? '<br /><a href="mailto:'.$email.'">email</a>' : '' ).'<br /><br />';
			if(strlen($ws)>0) echo '<a class="icon" href="'.$ws.'" target="_blank"><img src="'.get_bloginfo('template_directory').'/icons/website.png" width="26" height="25" alt="Website" /></a>&nbsp;';
			if(strlen($fb)>0) echo '<a class="icon" href="'.$fb.'" target="_blank"><img src="'.get_bloginfo('template_directory').'/icons/fb.png" width="26" height="25" alt="Facebook" /></a>&nbsp;';
			if(strlen($tw)>0) echo '<a class="icon" href="'.$tw.'" target="_blank"><img src="'.get_bloginfo('template_directory').'/icons/tw.png" width="26" height="25" alt="Twitter" /></a>&nbsp;';
			if(strlen($pt)>0) echo '<a class="icon" href="'.$pt.'" target="_blank"><img src="'.get_bloginfo('template_directory').'/icons/pt.png" width="26" height="25" alt="Pinterest" /></a>&nbsp;';	
			?>
			</p>
		</aside>
		<aside class="contact lastbox">
			<h2>Horaires</h2><p><?php echo $hours[pll_current_language()]; ?></p>
		</aside>
		<?php if(wpmd_is_notphone()) the_content(); ?>
		<div class="clear"></div>
	</article>
</section>
	
	
	
	
<?php
endif;

get_sidebar();
get_footer(); ?>
