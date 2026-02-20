<?php
/**
 * Custom block style variations.
 *
 * @package starter-theme
 * @since 1.0.0
 */


namespace Starter_Theme;

class Block_Styles {

	public function init(): void {
		add_action( 'init', array( $this, 'register_block_styles' ) );
	}

	public function register_block_styles(): void {
		// Button styles
		register_block_style(
			'core/button',
			array(
				'name'  => 'outline',
				'label' => __( 'Outline', 'starter-theme' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'  => 'rounded',
				'label' => __( 'Rounded', 'starter-theme' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'  => 'shadow',
				'label' => __( 'Shadow', 'starter-theme' ),
			)
		);

		// Image styles
		register_block_style(
			'core/image',
			array(
				'name'  => 'rounded',
				'label' => __( 'Rounded', 'starter-theme' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'shadow',
				'label' => __( 'Shadow', 'starter-theme' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'frame',
				'label' => __( 'Frame', 'starter-theme' ),
			)
		);

		// Group styles
		register_block_style(
			'core/group',
			array(
				'name'  => 'card',
				'label' => __( 'Card', 'starter-theme' ),
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'  => 'highlight',
				'label' => __( 'Highlight', 'starter-theme' ),
			)
		);

		// Quote styles
		register_block_style(
			'core/quote',
			array(
				'name'  => 'large',
				'label' => __( 'Large', 'starter-theme' ),
			)
		);

		register_block_style(
			'core/quote',
			array(
				'name'  => 'bordered',
				'label' => __( 'Bordered', 'starter-theme' ),
			)
		);
	}
}
