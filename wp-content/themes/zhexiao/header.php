<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="google-site-verification" content="tfCBws9YRRnNh_m6OON2Me-y_tz1gWpQflINYuQCfGU" />
	<meta name="description" content="<?=bloginfo('description'); ?>" />
	<title><?=wp_title( '', false, 'right' );?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
	<div class="container main-wrap">
		<div>
			<?php echo do_shortcode( '[soliloquy slug="top-slider"]' ) ?>
		</div>
		<header class="top-header">
			<nav class="navbar navbar-default header-navbar" role="navigation">
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
							<?=wp_nav_menu( array( 'theme_location' => 'top_navigation' ) ); ?>	
						</ul>
					</div>
				</div>
			</nav>
		</header>