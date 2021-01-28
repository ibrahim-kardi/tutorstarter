<?php
/**
 * Footer five 4 columns left extended with border
 */
?>

<section class="footer-widgets footer-alternative">
	<div class="container">
		<div class="row justify-between align-top">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php is_active_sidebar( 'tutorstarter-footer-widget1' ) ? dynamic_sidebar( 'tutorstarter-footer-widget1' ) : null; ?>
			</div><!-- left widget container -->
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 ml-0 pl-0">
				<div class="row align-top">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php is_active_sidebar( 'tutorstarter-footer-widget2' ) ? dynamic_sidebar( 'tutorstarter-footer-widget2' ) : null; ?>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php is_active_sidebar( 'tutorstarter-footer-widget3' ) ? dynamic_sidebar( 'tutorstarter-footer-widget3' ) : null; ?>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php is_active_sidebar( 'tutorstarter-footer-widget4' ) ? dynamic_sidebar( 'tutorstarter-footer-widget4' ) : null; ?>
					</div>
				</div>
			</div><!-- right widget container-->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- .footer-widgets -->