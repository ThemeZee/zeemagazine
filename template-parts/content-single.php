<?php
/**
 * The template for displaying single posts
 *
 * @package zeeMagazine
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
			<?php zeemagazine_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content clearfix">
			
			<?php zeemagazine_post_image_single(); ?>
			
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			
			<div class="page-links"><?php wp_link_pages(); ?></div>
			
		</div><!-- .entry-content -->
		
		<footer class="entry-footer clearfix">
			
			<?php zeemagazine_entry_footer(); ?>
			
		</footer><!-- .entry-footer -->

	</article>