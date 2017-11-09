<?php

namespace FlexFields\Fields;

use FlexFields\TemplateHandler;

/**
 * Class TextareaField
 *
 * @package FlexFields\Fields
 */
class TextareaField extends Field {

	/**
	 * Sanitize field value
	 *
	 * @param string $value
	 *
	 * @return string
	 */
	public function sanitize( $value ) {
		return sanitize_textarea_field( $value );
	}

	/**
	 * Return field markup as a string
	 *
	 * @return string
	 */
	public function __toString() {

		wp_enqueue_style( 'flex-fields' );

		$template = TemplateHandler::getInstance();

		return $template->toString( 'field.php', [
			'fieldType'   => 'textarea',
			'hidden'      => $this->_maybeConvertCallable( $this->getData( 'hidden', false ), $this ),
			'hasError'    => $this->hasErrors(),
			'error'       => $this->getErrorMessage(),
			'before'      => $this->getData( 'before' ),
			'after'       => $this->getData( 'after' ),
			'beforeField' => $this->getData( 'before_field' ),
			'afterField'  => $this->getData( 'after_field' ),
			'content'     => $template->toString( 'label.php', [
				'label'         => $this->getData( 'label' ),
				'labelPosition' => $this->getData( 'label_position', 'before' ),
				'content'       => $template->toString( 'textarea.php', [
					'name'  => $this->name,
					'value' => $this->value,
					'atts'  => $this->getData( 'atts', [] ),
				] )
			] ),
		] );

	}

}
