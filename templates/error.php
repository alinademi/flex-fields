<?php
/**
 * @var \wpscholar\TemplateX $x
 */

if ( ! $x->is( 'hasErrors', false ) ) {
	?><p class="flex-error"><?php echo wp_kses( $x->get( 'error' ), flex_fields_allowed_html() ); ?></p><?php
}