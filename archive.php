<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zeeMagazine
 */
 
get_header(); 

// Get Theme Options from Database
$theme_options = zeemagazine_theme_options();
?>
	
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php if ( have_posts() ) : ?>
		
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ 
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', $theme_options['post_content'] );

			endwhile;
			
			// Display Pagination	
			zeemagazine_pagination();

		endif; ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>