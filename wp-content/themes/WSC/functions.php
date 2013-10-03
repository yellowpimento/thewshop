<?php
ini_set('url_rewriter.tags','');


/*
CONTENT	
*/
add_theme_support( 'automatic-feed-links' );
register_nav_menu( 'primary', 'Primary menu' );
add_theme_support( 'post-thumbnails' );
if ( function_exists('register_sidebar') )
    register_sidebar();
    
function get_the_content_filtered($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
   $content = get_the_content($more_link_text, $stripteaser, $more_file);
   $content = apply_filters('the_content', $content);
   $content = str_replace(']]>', ']]&gt;', $content);
   return $content;
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
	return '&nbsp;<a class="more" href="'. get_permalink($post->ID) . '">[&hellip;]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



/*
POSTS/PAGES NAV	
*/
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
function is_child ($parent) {
	global $wp_query;
	if ($wp_query->post->post_parent == $parent) {
		$return = true;
	} else {
		$return = false;
	}
	return $return;
}

/*
SEARCH FORM	
*/
function my_search_form( $form ) {
	if("fr" == pll_current_language()) $txt = "rechercher";
	elseif("nl" == pll_current_language()) $txt = "zoeken";
	else $txt = "search";
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<input type="hidden" name="post_type" value="page shops" />
    <input type="text" placeholder="'.$txt.'" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'.$txt.'" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );

function searchfilter($query) {

    if ($query->is_search) {
        $query->set('post_type',array('shops','page'));
    }

return $query;
}

add_filter('pre_get_posts','searchfilter');

/*
MULTIPLE FEATURED IMAGES
*/
if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2',
                'post_type' => 'shops',
                'labels' => array(
                    'name'      => 'Featured image 2',
                    'set'       => 'Set featured image 2',
                    'remove'    => 'Remove featured image 2',
                    'use'       => 'Use as featured image 2',
                )
        );
        new kdMultipleFeaturedImages( $args );

        $args = array(
                'id' => 'featured-image-3',
                'post_type' => 'shops',
                'labels' => array(
                    'name'      => 'Featured image 3',
                    'set'       => 'Set featured image 3',
                    'remove'    => 'Remove featured image 3',
                    'use'       => 'Use as featured image 3',
                )
        );
        new kdMultipleFeaturedImages( $args );

        $args = array(
                'id' => 'featured-image-4',
                'post_type' => 'shops',
                'labels' => array(
                    'name'      => 'Featured image 4',
                    'set'       => 'Set featured image 4',
                    'remove'    => 'Remove featured image 4',
                    'use'       => 'Use as featured image 4',
                )
        );
        new kdMultipleFeaturedImages( $args );

        $args = array(
                'id' => 'featured-image-5',
                'post_type' => 'shops',
                'labels' => array(
                    'name'      => 'Featured image 5',
                    'set'       => 'Set featured image 5',
                    'remove'    => 'Remove featured image 5',
                    'use'       => 'Use as featured image 5',
                )
        );
        new kdMultipleFeaturedImages( $args );

        $args = array(
                'id' => 'featured-image-6',
                'post_type' => 'shops',
                'labels' => array(
                    'name'      => 'Featured image 6',
                    'set'       => 'Set featured image 6',
                    'remove'    => 'Remove featured image 6',
                    'use'       => 'Use as featured image 6',
                )
        );
        new kdMultipleFeaturedImages( $args );
}


/*
SHORTCODES
*/
// SECTORS CHILD_OF=
function sectors_func( $atts ){
	extract( shortcode_atts( array(
		'child_of' => '',
	), $atts ) );
	
	if($child_of != ''){
		$tobj = get_term_by('slug', $child_of, 'sector');
		$tid = $tobj->term_id;
		$terms = get_terms("sector", array( 'child_of' => $tid, 'hide_empty' => 0 ));
		$count = count($terms);
		$term_list = '<ul class="shops" id="anchorsector"><li class="title">'.$tobj->name.'</li>';
		if ($count > 0) {
	    	foreach ($terms as $term) {
	        	$i++;
				$term_list .= '<li><a href="/' . pll_current_language() . '/sector/' . $term->slug . '">' . $term->name . '</a></li>';
			}
		}
	}else{	
		$tobj = get_term_by('slug', 'shopping-'.pll_current_language(), 'sector');
		$tid = $tobj->term_id;
		$terms = get_terms("sector", array( 'child_of' => $tid, 'hide_empty' => 0 ));
		$count = count($terms);
		$term_list = '<ul class="shops" id="anchorsector"><li class="title">'.$tobj->name.'</li>';
		if ($count > 0) {
	    	foreach ($terms as $term) {
	        	$i++;
				$term_list .= '<li><a href="/' . pll_current_language() . '/sector/' . $term->slug . '">' . $term->name . '</a></li>';
			}
		}
		$tobj = get_term_by('slug', 'dining-'.pll_current_language(), 'sector');
		$tid = $tobj->term_id;
		$terms = get_terms("sector", array( 'child_of' => $tid, 'hide_empty' => 0 ));
		$count = count($terms);
		$term_list .= '<li class="title"><br /><br />'.$tobj->name.'</li>';
		if ($count > 0) {
	    	foreach ($terms as $term) {
	        	$i++;
				$term_list .= '<li><a href="/' . pll_current_language() . '/sector/' . $term->slug . '">' . $term->name . '</a></li>';
			}
		}
	}

	return $term_list.'</ul>';
}
add_shortcode( 'sectors', 'sectors_func' );





// SHOPS
function shops_func( $atts ){
	extract( shortcode_atts( array(
		'child_of' => '',
		'type' => '',
	), $atts ) );
	
		$args = array(
			'post_type' => 'shops',
			'orderby' => 'title',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'sector',
					'field' => 'slug',
					'terms' => $child_of
				)
			)
		);
		$logo = '';
		$products = new WP_Query( $args );
		if( $products->have_posts() ) {
			while( $products->have_posts() ) {
				$products->the_post();

				$temp = get_post_custom_values("newshop");
				if(isset($temp[0])) $newshop = 1;
				else $newshop = 0;
			
				if($type=='' || ($type=="new" && $newshop==1)){
	
					$t = array();
					$termlist = get_the_terms( $post->ID, "sector" );
					foreach ( $termlist as $term ) {
						if($term->name != "Shopping" && $term->name != "Dining") $t[] = $term->name;
					}
					$myt = join( "<br />", $t );

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
						<li class="icon_hours">'.($child_of == 'shopping-fr' || $child_of == 'shopping-en' || $child_of == 'shopping-nl' ? $myt : $hours[pll_current_language()] ).'</li>
						<li class="icon_new">'.($newshop==1?'<a href="'.get_permalink().'" title="New shop"><img src="'.get_bloginfo('template_directory').'/icons/new.png" alt="New shop" /></a>':'&nbsp;').'<br />'.($deal==1?'<a href="'.get_permalink().'" title="Deal"><img src="'.get_bloginfo('template_directory').'/icons/deal.png" alt="Deal!" /></a>':'&nbsp;').'</li>
						<li class="icon_contact">'.$contact.(strlen($email)>0?'<br /><a href="mailto:'.$email.'">email</a>':'').'</li>
					';
				
					$logo .= '</ul>';
				}
			}
		}
	if(strlen($logo)==0){
		$logo = '<ul class="boxshop shoplist"><li class="shoplogo"><h2>Coming soon.</h2></li></ul>';
	}
	return $logo;
}
add_shortcode( 'shops', 'shops_func' );




// NEWS
function news_func( $atts ){
	global $post;
	$str = '';
	$args = array( 'posts_per_page' => 5, 'category_name' => 'news-'.pll_current_language() );
	$myposts = get_posts( $args );
	foreach ( $myposts as $post ) : 
		setup_postdata( $post );
		$str .= get_the_content_filtered().'<hr />';
	endforeach;
	wp_reset_postdata();
	return $str;
}
add_shortcode( 'news', 'news_func' );




// DEALS
function deals_func( $atts ){
	global $post;
	$str = '';
	$cat = 'deals-'.pll_current_language();
	$args = array( 'posts_per_page' => 5, 'category_name' => $cat );
	$myposts = get_posts( $args );
	$nbdeal = 0;
	foreach ( $myposts as $post ) : 
		$nbdeal++;
		setup_postdata( $post );
		$str .= get_the_content_filtered().'<hr />';
	endforeach;
	wp_reset_postdata();
	if($nbdeal==0) $str="<h2>Coming soon.</h2>";
	return $str;
}
add_shortcode( 'deals', 'deals_func' );



// GMAP
function sc_googlemaps($atts, $content = null) {
	extract( shortcode_atts( array(
	  'lang' => pll_current_language()
      ), $atts ) );
	
	if(wpmd_is_notphone()){
		return "<iframe width=\"100%\" id=\"gmap\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.be/maps?f=q&amp;source=s_q&amp;hl={$lang}&amp;geocode=&amp;q=Boulevard+de+la+Woluwe+70+1200+Bruxelles&amp;ie=UTF8&amp;z=14&amp;output=embed\"></iframe>";
	}else{
		return '';
	}
}
add_shortcode("gmap", "sc_googlemaps");


// PASTILLE
function sc_pastille($atts, $content = null) {
	return '<div class="pastille">'.$content.'</div>';
}
add_shortcode("pastille", "sc_pastille");




/*
CUSTOM POSTS
*/
add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('shops', array(
		'label' => __('Shops'),
		'singular_label' => __('Shops'),
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
	));
	register_taxonomy( 'sector', 'shops', array( 'hierarchical' => true, 'label' => 'Sector', 'query_var' => true, 'rewrite' => true ) );
	register_post_type('slideshow', array(
		'label' => __('Slideshow'),
		'singular_label' => __('Slideshow'),
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
	));
	register_post_type('focus', array(
		'label' => __('Focus'),
		'singular_label' => __('Focus'),
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
	));
}
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
    #menu-posts-shops .wp-menu-image {background: url(<?php bloginfo('template_url') ?>/images/store.png) no-repeat 6px -17px !important;}
	#menu-posts-shops:hover .wp-menu-image, #menu-posts-background.wp-has-current-submenu .wp-menu-image {background-position:6px 7px!important;}
    #menu-posts-slideshow .wp-menu-image {background: url(<?php bloginfo('template_url') ?>/images/slide.png) no-repeat 6px -17px !important;}
	#menu-posts-slideshow:hover .wp-menu-image, #menu-posts-background.wp-has-current-submenu .wp-menu-image {background-position:6px 7px!important;}
    #menu-posts-focus .wp-menu-image {background: url(<?php bloginfo('template_url') ?>/images/focus.png) no-repeat 6px -17px !important;}
	#menu-posts-focus:hover .wp-menu-image, #menu-posts-background.wp-has-current-submenu .wp-menu-image {background-position:6px 7px!important;}
    </style>
<?php }
