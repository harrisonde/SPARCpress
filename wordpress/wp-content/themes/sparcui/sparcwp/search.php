<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package sparcwp
 */

get_header(); ?>
<section class="main-content">	
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12 col-md-8">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'sparcwp' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!-- .page-header -->

		<?php // start the loop. ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

		<?php endwhile; ?>

		<?php sparcwp_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; // end of loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>