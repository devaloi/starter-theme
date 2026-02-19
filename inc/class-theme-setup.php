<?php
/**
 * Theme setup: supports, menus, image sizes.
 *
 * @package starter-theme
 * @since 1.0.0
 */


namespace Starter_Theme;

class Theme_Setup {

	public function init(): void {
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
	}

	public function setup(): void {
		load_theme_textdomain( 'starter-theme', STARTER_THEME_DIR . '/languages' );

		// Block theme supports
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-spacing' );
		add_theme_support( 'appearance-tools' );
		add_theme_support( 'border' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'custom-units', [ 'px', 'em', 'rem', 'vh', 'vw', '%' ] );
		add_theme_support( 'link-color' );

		// Traditional supports
		add_theme_support( 'custom-logo', [
			'height'      => 120,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		] );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		
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

		add_editor_style( [
			'assets/css/global.css',
			'assets/css/accessibility.css', 
			'assets/css/navigation.css',
			'assets/css/blocks.css',
		] );

		register_nav_menus( [
			'primary' => esc_html__( 'Primary Menu', 'starter-theme' ),
			'footer'  => esc_html__( 'Footer Menu', 'starter-theme' ),
			'social'  => esc_html__( 'Social Links', 'starter-theme' ),
		] );

		// Custom image sizes
		add_image_size( 'starter-theme-featured', 1200, 675, true );
		add_image_size( 'starter-theme-card', 600, 400, true );
		add_image_size( 'starter-theme-avatar', 64, 64, true );
		add_image_size( 'starter-theme-thumbnail', 300, 200, true );
		
		// Set content width
		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 720;
		}
	}
}
