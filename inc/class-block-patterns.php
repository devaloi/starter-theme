<?php
/**
 * Block pattern registration.
 *
 * @package starter-theme
 * @since 1.0.0
 */


namespace Starter_Theme;

class Block_Patterns {

	public function init(): void {
		add_action( 'init', array( $this, 'register_pattern_category' ) );
		add_action( 'init', array( $this, 'register_patterns' ) );
	}

	public function register_pattern_category(): void {
		register_block_pattern_category(
			'starter-theme',
			array(
				'label'       => __( 'Starter Theme', 'starter-theme' ),
				'description' => __( 'Patterns for the Starter Theme.', 'starter-theme' ),
			)
		);
	}

	public function register_patterns(): void {
		$patterns = array(
			'hero',
			'call-to-action',
			'testimonials',
			'faq-accordion',
			'team-grid',
			'featured-posts',
		);

		foreach ( $patterns as $pattern ) {
			$pattern_file = STARTER_THEME_DIR . "/patterns/{$pattern}.php";

			if ( file_exists( $pattern_file ) ) {
				$pattern_data = require $pattern_file;

				register_block_pattern(
					"starter-theme/{$pattern}",
					$pattern_data
				);
			}
		}
	}
}
