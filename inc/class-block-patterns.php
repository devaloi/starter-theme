<?php
/**
 * Block pattern registration.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Block_Patterns {

	public function init(): void {
		add_action( 'init', [ $this, 'register_pattern_category' ] );
		add_action( 'init', [ $this, 'register_patterns' ] );
	}

	public function register_pattern_category(): void {
		register_block_pattern_category(
			'starter-theme',
			[
				'label'       => __( 'Starter Theme', 'starter-theme' ),
				'description' => __( 'Patterns for the Starter Theme.', 'starter-theme' ),
			]
		);
	}

	public function register_patterns(): void {
		$patterns = [
			'hero',
			'call-to-action',
			'testimonials',
			'faq-accordion',
			'team-grid',
			'featured-posts',
		];

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
/**
 * Block pattern registration.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Block_Patterns {

	public function init(): void {
		add_action( 'init', [ $this, 'register_pattern_category' ] );
		add_action( 'init', [ $this, 'register_patterns' ] );
	}

	public function register_pattern_category(): void {
		register_block_pattern_category( 'starter-theme', [
			'label' => esc_html__( 'Starter Theme', 'starter-theme' ),
		] );
	}

	public function register_patterns(): void {
		$patterns = [
			'hero'           => esc_html__( 'Hero', 'starter-theme' ),
			'featured-posts' => esc_html__( 'Featured Posts', 'starter-theme' ),
			'call-to-action' => esc_html__( 'Call to Action', 'starter-theme' ),
			'testimonials'   => esc_html__( 'Testimonials', 'starter-theme' ),
			'faq-accordion'  => esc_html__( 'FAQ Accordion', 'starter-theme' ),
			'team-grid'      => esc_html__( 'Team Grid', 'starter-theme' ),
		];

		foreach ( $patterns as $slug => $title ) {
			$file = STARTER_THEME_DIR . "/patterns/{$slug}.php";
			if ( ! file_exists( $file ) ) {
				continue;
			}

			register_block_pattern( "starter-theme/{$slug}", [
				'title'      => $title,
				'categories' => [ 'starter-theme' ],
				'content'    => (string) $this->get_pattern_content( $file ),
			] );
		}
	}

	private function get_pattern_content( string $file ): string {
		ob_start();
		include $file;
		return (string) ob_get_clean();
	}
}
