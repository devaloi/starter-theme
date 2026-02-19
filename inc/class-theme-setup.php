<?php
/**
 * Theme setup: supports, menus, image sizes.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Theme_Setup {

	public function init(): void {
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
	}

	public function setup(): void {
		load_theme_textdomain( 'starter-theme', STARTER_THEME_DIR . '/languages' );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'custom-logo', [
			'height'      => 120,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		] );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		] );

		add_editor_style( 'assets/css/editor.css' );

		register_nav_menus( [
			'primary' => esc_html__( 'Primary Menu', 'starter-theme' ),
			'footer'  => esc_html__( 'Footer Menu', 'starter-theme' ),
		] );

		add_image_size( 'starter-theme-featured', 1200, 675, true );
		add_image_size( 'starter-theme-card', 600, 400, true );
	}
}
