<?php 
/**
 * Template Name: Pattern Library Template
 * Only used to render pattern library.
 *
 * @package sparcwp
 */

include_once('includes/pattern-functions.php'); 
    // Build out URI to reload from form dropdown
    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if (isset($_POST['uri']) && isset($_POST['section'])) {
        $pageURL .= $_POST[uri].$_POST[section];
        $pageURL = htmlspecialchars( filter_var( $pageURL, FILTER_SANITIZE_URL ) );

        header("Location: $pageURL");
    }
?>

<?php get_header(); ?>
<?php if(isset($_GET["url"]) && sanipath( $patternsPath . $_GET["url"] ) ): ?>
        <?php include_pattern( sanipath( $patternsPath . $_GET["url"] ), "Pattern not found." ); ?>
     <?php else : ?>
 
<section class="main-content">
	<div class="container">
		<form action="" method="post" id="pattern" class="pattern-jump">
			    <select name="section" id="pattern-select" class="nav-section-select">
			        <option value="">Jump to&#8230;</option>
			        <?php displayOptions($patternsPath); ?>
			        
			    </select>
			    <input type="hidden" name="uri" value="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>">
			    <button type="submit" id="pattern-submit">Go</button>
			</form>
		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
			<!--"Jump to" pattern pull down -->
			
		  <!--WP content -->
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>

		 <!--Start snippets -->
		 
		<?php displayPatterns($patternsPath); ?>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>
