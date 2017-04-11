<!-- header content -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="msvalidate.01" content="793991BF5868EC482D178E28926211BE" />
	<title><?=wp_title( '', false, 'right' );?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<nav class="navbar navbar-default header-navbar" role="navigation" data-spy="affix" data-offset-top="500">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->			
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navigator">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->			
		<div class="collapse navbar-collapse" id="header-navigator">
			<ul class="nav navbar-nav header-nav-ul">				
				<?=wp_nav_menu([
					'menu' => 'main_navigation',
					'depth' => 0
				])?>
			</ul>
		</div>
	</div>
</nav>

<?php 
	if (is_home() || is_front_page()):
?>
		<div class="top-slider">
			<?=do_shortcode("[metaslider id=6]"); ?>
		</div>	
 <?php
    endif;
?>