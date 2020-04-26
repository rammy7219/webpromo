<?php
/**
 * The Front-Page file
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WebPromo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="OneStop IT Solutions Company">
	<meta name="keywords" content="W2D,Workflow,Web Design,Tyne and Wear,UK,City of Sunderland,Software Engineer,IT">
	<meta name="author" content="Wayne Ramshaw">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		.showcase { 
			background:url(<?php echo get_theme_mod('showcase_image', get_bloginfo('template_url').'/img/showcase.jpg'); ?>) no-repeat center center;
      background-size: cover;
      }
      @media screen and (max-width:480px) {
        .showcase {
          background-size: cover;
        }
      }
 </style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'webpromo' ); ?></a>

	<header id="masthead" class="site-header">
	<nav id="menu" class="navbar navbar-expand-md navbar-light" role="navigation">
		<div class="site-branding navbar-brand">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$webpromo_description = get_bloginfo( 'description', 'display' );
			if ( $webpromo_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $webpromo_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<?php
		wp_nav_menu([
			'menu'					=> 'primary',
			'theme_location'		=> 'primary',
			'container'				=> 'div',
			'container_id'			=> 'bs4navbar',
			'container_class'		=> 'collapse navbar-collapse',
			'menu_id'				=> 'main-menu',
			'menu_class'			=> 'navbar-nav ml-auto',
			'depth'					=> 2,
			'fallback_cb'			=> 'bs4navwalker::fallback',
			'walker'				=> new bs4navwalker()
		]);
		?>
		</nav>
		<div class="banner">
			<img src="http://www.web2dezine.com/wp-content/uploads/2019/08/Custom-Banner-Image.jpg" alt="Banner" style="width:100%;">
			
			<div class="centered">IT Solutions</div>
		</div>
	</header><!-- #masthead -->

	<section class="showcase">
		<div class="container">
				<div class="page-banner__content container t-center c-white">
				<img src="http://localhost:8000/wayneramshaw/wp-content/uploads/2020/04/w2d_logos_small.png">
					<h3 id="greeting">Welcome!</h3>
					<!--<script>document.write('<h3>Welcome!</h3>');</script>-->
					<!--<h1 class="webpromo_welcome"></h1>-->
					<h2 class="headline headline--medium">We can help your <strong>business</strong></h2>
					<h3 class="headline headline--small">grow with better workflow solutions.</h3><br>
					<a href="<?php echo get_theme_mod('btn_url', 'http://www.web2dezine.com/services/'); ?>" class="btn btn-primary btn-lg"><?php echo get_theme_mod('btn_text', 'Look Here'); ?></a>
				</div>
		</div>
  </div>

    <section class="boxes">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <?php if(is_active_sidebar('box1')) : ?>
                <?php dynamic_sidebar('box1') ?>
              <?php endif; ?>
          </div>

          <div class="col-md-4">
              <?php if(is_active_sidebar('box2')) : ?>
                <?php dynamic_sidebar('box2') ?>
              <?php endif; ?>
          </div>

          <div class="col-md-4">
              <?php if(is_active_sidebar('Box3')) : ?>
                <?php dynamic_sidebar('Box3') ?>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <footer id="colophon" class="site-footer row">
		<div class="site-info col-md-12">
      <p>&copy; <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
	<script type="text/javascript">
		var today = new Date();
		var hourNow = today.getHour();
		var greeting;

		if (hourNow > 18) {
			greeting = 'Good evening!';
		} else if (hourNow > 12) {
			greeting = 'Good afternoon!';
		} else if (hourNow > 0) {
			greeting = 'Good morning!';
		} else {
			greeting = 'Welcome!';
		}

		document.getElementById("greeting").innerHTML = function() {

		document.getElementById("greeting").innerHTML = ('<h3>' + greeting + '</h3>');
		
		// document.write('<h3>' + greeting + '</h3>');

		}

	</script>
    </body>
    </html>
