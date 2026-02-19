<?php
/**
 * Performance optimizations: cleanup, lazy loading, prefetch.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Performance {

	public function init(): void {
		add_action( 'init', [ $this, 'cleanup' ] );
		add_filter( 'wp_get_attachment_image_attributes', [ $this, 'add_lazy_loading' ], 10, 1 );
		add_action( 'wp_head', [ $this, 'add_preconnect' ], 2 );
		add_filter( 'script_loader_tag', [ $this, 'defer_scripts' ], 10, 2 );
	}

	public function cleanup(): void {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
	}

	/**
	 * @param array<string, string> $attr
	 * @return array<string, string>
	 */
	public function add_lazy_loading( array $attr ): array {
		if ( ! is_admin() && get_theme_mod( 'starter_theme_lazy_loading', true ) ) {
			$attr['loading'] = 'lazy';
		}
		return $attr;
	}

	public function add_preconnect(): void {
		if ( get_theme_mod( 'starter_theme_prefetch', true ) ) {
			echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
			echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
		}
	}

	public function defer_scripts( string $tag, string $handle ): string {
		$defer_handles = [ 'starter-theme-navigation', 'starter-theme-lazy-load' ];
		if ( in_array( $handle, $defer_handles, true ) && ! str_contains( $tag, 'defer' ) ) {
			$tag = str_replace( ' src', ' defer src', $tag );
		}
		return $tag;
	}
}
