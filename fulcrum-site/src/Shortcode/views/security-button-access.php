<a href="<?php echo esc_url( $url ); ?>" class="button security<?php echo $class; ?>"<?php echo (bool) $this->atts['open_new_tab'] ? ' target="_blank"' : ''; ?>>
<?php if ( $this->atts['icon'] ) : ?>
	<i class="fa fa-<?php esc_html_e( $this->atts['icon'] ); ?>" aria-hidden="true"></i> <?php echo $content; ?>
<?php else: ?>
	<?php echo $content; ?>
<?php endif; ?>
</a>