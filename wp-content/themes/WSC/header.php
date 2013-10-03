<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/icons/favicon.ico" />
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/icons/favicon.gif" type="image/gif" />
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/icons/touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/icons/touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/icons/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/icons/touch-icon-ipad-retina.png" />

	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/logo.png"/>
	<meta property="og:title" content="<?php wp_title("",true); ?>"/>
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
	<meta property="og:type" content="website"/>
	<meta name="description" content="<?php bloginfo('description'); ?>"/>
	
	<link href="<?php bloginfo('stylesheet_url'); ?>" media="all" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
<![endif]-->
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>


	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try{
		var pageTracker = _gat._getTracker("UA-17171246-1");
		pageTracker._trackPageview();
		} catch(err) {}
	</script>

</head>

<?php if(wpmd_is_notphone()){ ?>
<body>
<?php }elseif(is_home() || is_front_page() || is_page(array('home','homepagina','accueil'))){ ?>
<body class="phone mobile">
<?php }else{ ?>
<body class="mobile">
<?php } ?>
<div id="page">
	<div id="innerpage">

<header id="header">
	<h1><a href="<?php bloginfo("url"); ?>" title="The Woluwe Shopping Center" id="logo"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="The Woluwe Shopping Center" /></a></h1>
	<nav id="menu">
		<?php 
		wp_nav_menu(array('menu' => 'Primary menu '.pll_current_language()));
		?>
	</nav>
	<nav id="topmenu">
		<ul>
		<?php pll_the_languages('');?>
		<li id="searcharea"><?php get_search_form(); ?></li>
		<?php
		$bookmarks = get_bookmarks();
		foreach ( $bookmarks as $bookmark ) { 
			echo '
		<li class="bookmark"><a href="'.$bookmark->link_url.'" target="'.$bookmark->link_target.'"><img src="'.$bookmark->link_image.'" />'.($bookmark->link_name=="Facebook"?'<span><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FWoluwe.Shopping.Center&amp;width=292&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false&amp;appId=546302188745640" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowTransparency="true"></iframe></span>':'').'</a></li>';
		}
		?>
		</ul>
	</nav>
</header>
<div id="masterpage">