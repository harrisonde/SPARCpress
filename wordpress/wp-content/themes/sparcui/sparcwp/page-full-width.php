<?php
/**
 * Template Name: Full Width Template
 * The template for blank canvas pages.
 *
 * @package sparcwp
 */

get_header(); ?>
	<section class="main-content">
		<div class="container">
		<!-- .entry-header -->
		        <header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
		</div>
		
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>
	</section>

<?php get_footer(); ?>
