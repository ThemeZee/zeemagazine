<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @package zeeMagazine
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			
			<?php zeemagazine_entry_meta(); ?>
			
		</header><!-- .entry-header -->

		<div class="entry-content clearfix">
			
			<?php zeemagazine_post_image_archives(); ?>
			<?php the_content( esc_html__( 'Continue reading &raquo;', 'zeemagazine' ) ); ?>
		
		</div><!-- .entry-content -->

	</article>