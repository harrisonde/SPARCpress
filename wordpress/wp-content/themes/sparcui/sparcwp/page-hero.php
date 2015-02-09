<?php
/**
 * Template Name: Hero
 * The template for displaying pages with a hero area.
 *
 * @package sparcwp
 */

get_header(); ?>
<?php $heroimage = get_field('hero_background_image'); ?>	
<section class="jumbotron" style="background-image: url('<?php echo $heroimage; ?>')">
	<div class="container">
    	<div class="row">
    		<?php the_field('hero_content'); ?>
	 	</div>
  	</div>
</section>
<section class="main-content">
	
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

</section>
<?php get_footer(); ?>
