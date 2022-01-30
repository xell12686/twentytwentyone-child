<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer">
		<div class="wrapper">
			<div class="content">

				<div class="left-col">

					<div class="site-info">
						<div class="site-name">
							<?php if ( has_custom_logo() ) : ?>
								<div class="site-logo"><?php the_custom_logo(); ?></div>
							<?php else : ?>
								<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
									<?php if ( is_front_page() && ! is_paged() ) : ?>
										<?php bloginfo( 'name' ); ?>
									<?php else : ?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>
						</div><!-- .site-name -->

						<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( '<div class="privacy-policy">', '</div>' );
						}
						?>

					</div><!-- .site-info -->

					<?php if ( has_nav_menu( 'footer' ) ) : ?>
						<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
							<ul class="footer-navigation-wrapper">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer',
										'items_wrap'     => '%3$s',
										'container'      => false,
										'depth'          => 2,
										'link_before'    => '<span>',
										'link_after'     => '</span>',
										'fallback_cb'    => false,
									)
								);
								?>
							</ul><!-- .footer-navigation-wrapper -->
						</nav><!-- .footer-navigation -->
					<?php endif; ?>

				</div>

				<div class="right-col">
					<h4>Let's Connect</h4>
					<div class="opt-in">
						<span>Join our newsletter</span>
						<label>
							<input type="text" placeholder="email address">
							<button>
								<svg xmlns="http://www.w3.org/2000/svg" height="10" viewBox="0 0 13 10" width="13"><g style="stroke:#fff;stroke-width:2;fill:none;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round" transform="translate(.975586 1.753906)"><path d="m0 3.84179688h10.3847656"></path><path d="m7.19628906 7.18554688 3.18847654-3.34375-3.18847654-3.84179688"></path></g></svg>
							</button>
						</label>
					</div>
					<div class="copyright">
						<p>&copy; 2021 Globally Paid. Site by <a href="https://500designs.com/">500 Designs</a>.</p>
					</div>
				</div>
			</div>
		</div>



	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
