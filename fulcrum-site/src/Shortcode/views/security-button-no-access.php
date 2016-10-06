<a class="button security grayedout<?php echo $class; ?>">
<?php if ( $this->atts['icon'] ) : ?>
	<i class="fa fa-<?php esc_html_e( $this->atts['icon'] ); ?>" aria-hidden="true"></i> <?php echo $content; ?>
<?php else: ?>
	<?php echo $content; ?>
<?php endif; ?>
</a>