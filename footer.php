<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;
?>

</div><!-- #content -->

<?php
	$page_meta       = get_post_meta( get_the_ID(), '_tutorstarter_page_metadata', true );
	$disable_footer  = ( ! empty( $page_meta['footer_toggle'] ) ? $page_meta['footer_toggle'] : false );
	$selected_footer = ( ! empty( $page_meta['footer_select'] ) ? $page_meta['footer_select'] : '' );

if ( false === $disable_footer ) :
	if ( ! empty( $selected_footer ) ) {
		get_template_part( 'views/partials/footer/' . $selected_footer );
	} else {
		$footer_style = get_theme_mod( 'footer_type_select', 'footer_four' );
		get_template_part( 'views/partials/footer/' . $footer_style );
	}
	?>

<footer id="colophon" class="site-footer <?php echo 'footer_five' === $selected_footer || 'footer_five' === $footer_style ? 'footer-five ' : ''; ?>container-fluid pt-2 pb-2" role="contentinfo">
	<div class="container">
		<div class="row align-middle justify-between footer-bottom-container">
			<div class="site-info">
			<?php
			$default           = esc_attr( get_template_directory_uri() . '/assets/dist/images/tutor-footer.png' );
			$footer_logo       = esc_url( get_theme_mod( 'footer_logo' ) );
			$footer_logo_trans = esc_url( get_theme_mod( 'footer_logo_trans' ) );

			if ( true === get_theme_mod( 'footer_logo_toggle', true ) ) :
				if ( 'footer_five' === $selected_footer || 'footer_five' === $footer_style ) : ?>
					<img id="logo-footer" src="<?php echo ( '' !== $footer_logo_trans ? $footer_logo_trans : $default ); ?>" alt="<?php echo esc_html( wp_get_document_title() ); ?>" />
				<?php else : ?>
					<img id="logo-footer" src="<?php echo ( '' !== $footer_logo ? $footer_logo : $default ); ?>" alt="<?php echo esc_html( wp_get_document_title() ); ?>" />
				<?php endif; ?>
			<?php endif; ?>
				<?php if ( true === get_theme_mod( 'footer_socialmedia_toggle', true ) ) : ?>
					<span id="footer-socialmedia">
						<?php is_active_sidebar( 'tutorstarter-footer-socialmedia' ) ? dynamic_sidebar( 'tutorstarter-footer-socialmedia' ) : null; ?>
					</span>
				<?php endif; ?>
			</div><!-- .site-info -->
			<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<div class="footer-menu">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'secondary',
							'menu_id'        => 'secondary-menu',
							'menu_class'     => 'row menu-footer-menu',
						)
					);
				?>
			</div><!-- .footer-menu-->
			<?php endif; ?>
			<div class="copyright-container">
				<span class="copyright"><?php wp_kses( _e( get_theme_mod( 'footer_bottom_text', '&copy; All rights reserved.' ), 'tutorstarter' ), allowed_html() ); ?></span>
			</div><!-- .footer-menu-->
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
