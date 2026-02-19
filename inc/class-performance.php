<?php
/**
 * Performance optimizations.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Performance {

	public function init(): void {
		add_action( 'init', [ $this, 'disable_emojis' ] );
		add_action( 'wp_head', [ $this, 'add_preconnect_links' ], 1 );
		add_action( 'wp_head', [ $this, 'add_dns_prefetch' ], 1 );
		add_filter( 'wp_get_attachment_image_attributes', [ $this, 'add_lazy_loading' ], 10, 3 );
		add_filter( 'the_content', [ $this, 'add_lazy_loading_to_content' ] );
		add_filter( 'script_loader_tag', [ $this, 'add_async_defer_attributes' ], 10, 3 );
		add_action( 'wp_enqueue_scripts', [ $this, 'dequeue_unused_scripts' ], 100 );
		add_action( 'wp_print_styles', [ $this, 'dequeue_unused_styles' ], 100 );
		add_filter( 'wp_resource_hints', [ $this, 'add_resource_hints' ], 10, 2 );
	}

	public function disable_emojis(): void {
		// Remove emoji detection script and styles
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		// Remove emoji from TinyMCE
		add_filter( 'tiny_mce_plugins', [ $this, 'disable_emoji_tinymce' ] );
		add_filter( 'wp_resource_hints', [ $this, 'disable_emoji_dns_prefetch' ], 10, 2 );
	}

	public function disable_emoji_tinymce( array $plugins ): array {
		return array_diff( $plugins, [ 'wpemoji' ] );
	}

	public function disable_emoji_dns_prefetch( array $urls, string $relation_type ): array {
		if ( 'dns-prefetch' === $relation_type ) {
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
			$urls = array_diff( $urls, [ $emoji_svg_url ] );
		}

		return $urls;
	}

	public function add_preconnect_links(): void {
		// Only add preconnects if lazy loading is disabled
		if ( ! get_theme_mod( 'starter_theme_lazy_loading', true ) ) {
			echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
			echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
		}
	}

	public function add_dns_prefetch(): void {
		$prefetch_domains = [
			'//fonts.googleapis.com',
			'//fonts.gstatic.com',
			'//gravatar.com',
			'//secure.gravatar.com',
		];

		foreach ( $prefetch_domains as $domain ) {
			printf( '<link rel="dns-prefetch" href="%s">' . "\n", esc_url( $domain ) );
		}
	}

	public function add_lazy_loading( array $attr, \WP_Post $attachment, string $size ): array {
		// Skip if lazy loading is disabled
		if ( ! get_theme_mod( 'starter_theme_lazy_loading', true ) ) {
			return $attr;
		}

		// Skip if in admin or is feed
		if ( is_admin() || is_feed() ) {
			return $attr;
		}

		// Skip if image is above the fold (first image in content)
		static $first_image = true;
		if ( $first_image ) {
			$first_image = false;
			return $attr;
		}

		// Add native lazy loading
		$attr['loading'] = 'lazy';

		return $attr;
	}

	public function add_lazy_loading_to_content( string $content ): string {
		// Skip if lazy loading is disabled
		if ( ! get_theme_mod( 'starter_theme_lazy_loading', true ) ) {
			return $content;
		}

		// Skip if in admin or is feed
		if ( is_admin() || is_feed() ) {
			return $content;
		}

		// Add loading="lazy" to images in content
		$content = preg_replace_callback(
			'/<img([^>]+?)>/i',
			function ( array $matches ): string {
				$img_tag = $matches[0];
				
				// Skip if already has loading attribute
				if ( strpos( $img_tag, 'loading=' ) !== false ) {
					return $img_tag;
				}

				// Add loading="lazy"
				return str_replace( '<img', '<img loading="lazy"', $img_tag );
			},
			$content
		);

		return $content;
	}

	public function add_async_defer_attributes( string $tag, string $handle, string $src ): string {
		// Scripts that should be deferred
		$defer_scripts = [
			'starter-theme-navigation',
			'starter-theme-lazy-load',
			'comment-reply',
		];

		// Scripts that should be async
		$async_scripts = [
			'google-analytics',
			'gtag',
		];

		if ( in_array( $handle, $defer_scripts, true ) ) {
			return str_replace( ' src', ' defer src', $tag );
		}

		if ( in_array( $handle, $async_scripts, true ) ) {
			return str_replace( ' src', ' async src', $tag );
		}

		return $tag;
	}

	public function dequeue_unused_scripts(): void {
		// Remove unused WordPress scripts
		if ( ! is_admin() ) {
			// Remove jQuery Migrate
			if ( ! wp_script_is( 'jquery', 'done' ) ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), [], null, true );
			}

			// Remove unnecessary scripts on frontend
			if ( ! is_customize_preview() ) {
				wp_dequeue_script( 'wp-embed' );
			}

			// Remove block library CSS on non-block pages
			if ( ! has_blocks() && ! is_home() && ! is_archive() ) {
				wp_dequeue_style( 'wp-block-library' );
				wp_dequeue_style( 'wp-block-library-theme' );
			}
		}
	}

	public function dequeue_unused_styles(): void {
		if ( ! is_admin() ) {
			// Remove unnecessary styles
			wp_dequeue_style( 'dashicons' );

			// Remove classic theme styles
			wp_dequeue_style( 'classic-theme-styles' );
		}
	}

	public function add_resource_hints( array $urls, string $relation_type ): array {
		if ( 'prefetch' === $relation_type && get_theme_mod( 'starter_theme_prefetch_links', true ) ) {
			// Add critical pages to prefetch
			$prefetch_urls = [
				home_url( '/' ),
				get_permalink( get_option( 'page_for_posts' ) ),
			];

			// Add menu items to prefetch
			$menu_locations = get_nav_menu_locations();
			if ( ! empty( $menu_locations['primary'] ) ) {
				$menu = wp_get_nav_menu_object( $menu_locations['primary'] );
				if ( $menu ) {
					$menu_items = wp_get_nav_menu_items( $menu );
					if ( $menu_items ) {
						foreach ( array_slice( $menu_items, 0, 5 ) as $menu_item ) { // Limit to first 5 items
							if ( $menu_item->url && str_starts_with( $menu_item->url, home_url() ) ) {
								$prefetch_urls[] = $menu_item->url;
							}
						}
					}
				}
			}

			$urls = array_merge( $urls, array_unique( array_filter( $prefetch_urls ) ) );
		}

		return $urls;
	}

	/**
	 * Add critical CSS inline for above-the-fold content
	 */
	public function add_critical_css(): void {
		$critical_css = '
			:root { 
				--wp--preset--color--primary: ' . esc_attr( get_theme_mod( 'starter_theme_primary_color', '#2563eb' ) ) . ';
				--wp--preset--color--background: #ffffff;
				--wp--preset--color--text: #1f2937;
			}
			body { 
				font-family: system-ui, -apple-system, sans-serif;
				margin: 0;
				line-height: 1.6;
				color: var(--wp--preset--color--text);
				background: var(--wp--preset--color--background);
			}
			.wp-site-blocks > header {
				position: relative;
				z-index: 999;
			}
		';

		printf(
			'<style id="starter-theme-critical-css">%s</style>',
			wp_strip_all_tags( $critical_css ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}

	/**
	 * Optimize database queries
	 */
	public function optimize_queries(): void {
		// Remove unnecessary meta queries
		add_filter( 'pre_get_posts', function( \WP_Query $query ): void {
			if ( ! is_admin() && $query->is_main_query() ) {
				// Limit posts per page for performance
				if ( is_home() || is_archive() ) {
					$query->set( 'posts_per_page', 12 );
				}
			}
		} );
	}
}
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
