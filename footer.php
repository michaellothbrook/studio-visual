			</main><!-- /#main -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p><?php printf(esc_html__('&copy; %1$s %2$s. All rights reserved.', 'studio-visual-teste'), date_i18n('Y'), get_bloginfo('name', 'display')); ?></p>
						</div>

						<?php
						if (has_nav_menu('footer-menu')) : // See function register_nav_menus() in functions.php
							wp_nav_menu(
								array(
									'theme_location'  => 'footer-menu',
									'container'       => 'nav',
									'container_class' => 'col-md-6',
									'fallback_cb'     => '',
									'items_wrap'      => '<ul class="menu nav justify-content-end">%3$s</ul>',
									//'fallback_cb'    => 'WP_Bootstrap4_Navwalker_Footer::fallback',
									'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
								)
							);
						endif;

						if (is_active_sidebar('third_widget_area')) :
						?>
							<div class="col-md-12">
								<?php
								dynamic_sidebar('third_widget_area');

								if (current_user_can('manage_options')) :
								?>
									<span class="edit-link"><a href="<?php echo esc_url(admin_url('widgets.php')); ?>" class="badge badge-secondary"><?php esc_html_e('Edit', 'studio-visual-teste'); ?></a></span><!-- Show Edit Widget link -->
								<?php
								endif;
								?>
							</div>
						<?php
						endif;
						?>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</footer><!-- /#footer -->
			</div><!-- /#wrapper -->
			<?php
			wp_footer();
			?>
			</body>

			</html>