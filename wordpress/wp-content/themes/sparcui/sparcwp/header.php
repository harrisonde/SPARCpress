<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <section id="main-content">
 * @package sparcwp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php get_template_directory_uri();?>/js/html5shiv.js"></script>
      <script src="<?php get_template_directory_uri();?>/js/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header">
	<nav role="navigation">
    <div class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>



           <?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) { ?>
            <a class="navbar-brand" href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home">
                <img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ) ?>" />
            </a>
            <?php }  else { ?>
            <!-- If no logo uploaded, use site title -->
          	<a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><b><?php bloginfo( 'name' ) ?></b></a>
   
          	        <?php } ?>
              </div>
        <?php wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new wp_bootstrap_navwalker()
                )
            ); ?>
        </div><!-- .container -->
    </nav><!-- nav -->
</header><!-- #site-header -->

