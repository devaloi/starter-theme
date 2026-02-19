<?php
/**
 * Asset enqueuing with versioning.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

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
