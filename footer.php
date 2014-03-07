		
	<div id="footer-wrap">
		
		<footer id="footer" class="container clearfix" role="contentinfo">
			<?php 
				$options = get_option('zeemagazine_options');
				if ( isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "" ) :
					echo do_shortcode(wp_kses_post($options['themeZee_general_footer']));
				endif;
			?>
			<div id="credit-link"><?php themezee_credit_link(); ?></div>
		</footer>
		
	</div>
	
</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>