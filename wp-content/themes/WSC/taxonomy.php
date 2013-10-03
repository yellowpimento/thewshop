<?php get_header();
	
query_posts($query_string . '&post_type=shops&posts_per_page=-1&orderby=title&order=asc');

?>





<section id="maincontent">

		
	<div id="single_sector"><span>
		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		echo $term->name;
			?>
		</span><?php if(wpmd_is_notphone()){ ?>&nbsp;<?php }else{ ?><br /><?php } ?>
		
		<span id="othersector" style="float:right"><a href="#anchorsector"><?php
		if(pll_current_language() == "fr") echo 'Autre catégorie ?';
		elseif(pll_current_language() == "nl") echo 'Andere categorie?';
		else echo 'Other category?'; ?></a></span><span id="az"><?php
		if(pll_current_language() == "fr") echo 'De A à Z';
		elseif(pll_current_language() == "nl") echo 'Van A tot Z';
		else echo 'From A to Z'; ?></span>
		<div class="clear"></div>
	</div>

<?php if(wpmd_is_notphone()){ ?>
	<nav class="sidebar_sector" id="sectortop">
		<?php echo do_shortcode('[sectors]'); ?>
	</nav>
<?php } ?>
<?php
$logo = '';
if (have_posts()) :
while (have_posts()) : the_post();
	$temp = get_post_custom_values("newshop");
	if(isset($temp[0])) $newshop = 1;
	else $newshop = 0;

	if($type=='' || ($type=="new" && $newshop==1)){

		$temp = get_post_custom_values("logo");
		$logo .= '
		<ul class="boxshop shoplist">
			
			<li class="shoplogo"><a href="'.get_permalink().'" title="'.get_the_title().'"><span>'.get_the_title().'</span>';
		if(isset($temp[0])) $logo .= '<img src="'.$temp[0].'" alt="'.get_the_title().'" />';
		$logo .= '</a></li>';
		
		
		$temp = get_post_custom_values("contact");
		if(isset($temp[0])) $contact = $temp[0];
		else $contact = '';
		$temp = get_post_custom_values("deal");
		if(isset($temp[0])) $deal = 1;
		else $deal = 0;
		$temp = get_post_custom_values("email");
		if(isset($temp[0])) $email = $temp[0];
		else $email = '';
		$temp = get_post_custom_values("hour".pll_current_language());
		if(isset($temp[0])) $hours[pll_current_language()] = $temp[0];
		else{
			$hours['fr'] = 'Lundi, mardi, mercredi,<br />jeudi et samedi <strong>de 10h à 19h</strong>.<br />Vendredi <strong>jusqu’à 20h</strong>.';
			$hours['nl'] = 'Maandag, dinsdag, woensdag,<br />donderdag en zaterdag <strong>van 10u tot 19u</strong>.<br />Vrijdag <strong>tot 20u</strong>.';
			$hours['en'] = 'Monday, Tuesday, Wednesday,<br />Thursday and Saturday <strong>from 10am to 7pm</strong>.<br />Friday <strong>till 8pm</strong>.';
		}
		$logo .= '
			<li class="icon_hours">'.$hours[pll_current_language()].'</li>
			<li class="icon_new">'.($newshop==1?'<a href="'.get_permalink().'" title="New shop"><img src="'.get_bloginfo('template_directory').'/icons/new.png" alt="New shop" /></a>':'&nbsp;').'<br />'.($deal==1?'<a href="'.get_permalink().'" title="Deal"><img src="'.get_bloginfo('template_directory').'/icons/deal.png" alt="Deal!" /></a>':'&nbsp;').'</li>
			<li class="icon_contact">'.$contact.(strlen($email)>0?'<br /><a href="mailto:'.$email.'">email</a>':'').'</li>
		';
	
		$logo .= '</ul>';
	}
endwhile;
endif;
if(strlen($logo)==0){
	$logo = '<ul class="boxshop shoplist"><li class="shoplogo"><h2>Coming soon.</h2></li></ul>';
}
echo $logo;
?>
<?php if(wpmd_is_device()){ ?>
	<nav class="sidebar_sector" id="anchorsector">
		<?php echo do_shortcode('[sectors]'); ?>
	</nav>
<?php } ?>
	<div class="clear"><br /><br /></div>
</section>

<?php
get_sidebar();
get_footer(); ?>
