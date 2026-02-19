<?php
/**
 * Asset enqueuing with versioning and performance optimization.
 *
 * @package starter-theme
 * @since 1.0.0
 */


namespace Starter_Theme;

class Enqueue {

	public function init(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_assets' ] );
	}

	public function enqueue_styles(): void {
		// Global styles
		wp_enqueue_style(
			'starter-theme-global',
			STARTER_THEME_URI . '/assets/css/global.css',
			[],
			STARTER_THEME_VERSION
		);

		// Accessibility styles
		wp_enqueue_style(
			'starter-theme-accessibility',
			STARTER_THEME_URI . '/assets/css/accessibility.css',
			[ 'starter-theme-global' ],
			STARTER_THEME_VERSION
		);

		// Navigation styles
		wp_enqueue_style(
			'starter-theme-navigation',
			STARTER_THEME_URI . '/assets/css/navigation.css',
			[ 'starter-theme-global' ],
			STARTER_THEME_VERSION
		);

		// Block styles (conditional)
		if ( is_singular() || is_home() || is_archive() ) {
			wp_enqueue_style(
				'starter-theme-blocks',
				STARTER_THEME_URI . '/assets/css/blocks.css',
				[ 'starter-theme-global' ],
				STARTER_THEME_VERSION
			);
		}

		// Print styles
		wp_enqueue_style(
			'starter-theme-print',
			STARTER_THEME_URI . '/assets/css/print.css',
			[ 'starter-theme-global' ],
			STARTER_THEME_VERSION,
			'print'
		);
	}

	public function enqueue_scripts(): void {
		// Navigation script
		wp_enqueue_script(
			'starter-theme-navigation',
			STARTER_THEME_URI . '/assets/js/navigation.js',
			[],
			STARTER_THEME_VERSION,
			[
				'strategy'  => 'defer',
				'in_footer' => true,
			]
		);

		// Lazy loading script (conditional)
		if ( ! is_admin() && ! wp_is_mobile() ) {
			wp_enqueue_script(
				'starter-theme-lazy-load',
				STARTER_THEME_URI . '/assets/js/lazy-load.js',
				[],
				STARTER_THEME_VERSION,
				[
					'strategy'  => 'defer',
					'in_footer' => true,
				]
			);
		}

		// Comment reply script (conditional)
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public function enqueue_editor_assets(): void {
		// Editor-specific styles
		wp_enqueue_style(
			'starter-theme-editor',
			STARTER_THEME_URI . '/assets/css/editor.css',
			[ 'wp-edit-blocks' ],
			STARTER_THEME_VERSION
		);
	}

	/**
	 * Get file modification time for cache busting
	 */
	private function get_file_version( string $file_path ): string {
		$full_path = STARTER_THEME_DIR . $file_path;
		if ( file_exists( $full_path ) ) {
			return (string) filemtime( $full_path );
		}
		return STARTER_THEME_VERSION;
	}
}
/**
 * Asset enqueuing with versioning.
 *
 * @package starter-theme
 * @since 1.0.0
 */


namespace Starter_Theme;

class Enqueue {

	public function init(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_styles(): void {
		wp_enqueue_style(
			'starter-theme-global',
			STARTER_THEME_URI . '/assets/css/global.css',
			[],
			STARTER_THEME_VERSION
		);

		wp_enqueue_style(
			'starter-theme-blocks',
			STARTER_THEME_URI . '/assets/css/blocks.css',
			[ 'starter-theme-global' ],
			STARTER_THEME_VERSION
		);

		wp_enqueue_style(
			'starter-theme-navigation',
			STARTER_THEME_URI . '/assets/css/navigation.css',
			[ 'starter-theme-global' ],
			STARTER_THEME_VERSION
		);

		wp_enqueue_style(
			'starter-theme-accessibility',
			STARTER_THEME_URI . '/assets/css/accessibility.css',
			[ 'starter-theme-global' ],
			STARTER_THEME_VERSION
		);
	}

	public function enqueue_scripts(): void {
		wp_enqueue_script(
			'starter-theme-navigation',
			STARTER_THEME_URI . '/assets/js/navigation.js',
			[],
			STARTER_THEME_VERSION,
			[ 'strategy' => 'defer' ]
		);

		wp_enqueue_script(
			'starter-theme-lazy-load',
			STARTER_THEME_URI . '/assets/js/lazy-load.js',
			[],
			STARTER_THEME_VERSION,
			[ 'strategy' => 'defer' ]
		);
	}
}
