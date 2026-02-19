<?php
/**
 * Tests for theme setup functionality
 *
 * @package starter-theme
 */

class Test_Theme_Setup extends WP_UnitTestCase {

	/**
	 * Test theme supports are properly registered
	 */
	public function test_theme_supports() {
		// Block theme supports
		$this->assertTrue( current_theme_supports( 'wp-block-styles' ) );
		$this->assertTrue( current_theme_supports( 'editor-styles' ) );
		$this->assertTrue( current_theme_supports( 'responsive-embeds' ) );
		$this->assertTrue( current_theme_supports( 'align-wide' ) );
		$this->assertTrue( current_theme_supports( 'custom-spacing' ) );
		$this->assertTrue( current_theme_supports( 'appearance-tools' ) );
		$this->assertTrue( current_theme_supports( 'border' ) );
		$this->assertTrue( current_theme_supports( 'custom-line-height' ) );
		$this->assertTrue( current_theme_supports( 'link-color' ) );

		// Traditional supports
		$this->assertTrue( current_theme_supports( 'custom-logo' ) );
		$this->assertTrue( current_theme_supports( 'post-thumbnails' ) );
		$this->assertTrue( current_theme_supports( 'automatic-feed-links' ) );
		$this->assertTrue( current_theme_supports( 'title-tag' ) );
		$this->assertTrue( current_theme_supports( 'html5' ) );
	}

	/**
	 * Test custom logo support configuration
	 */
	public function test_custom_logo_config() {
		$logo_support = get_theme_support( 'custom-logo' );
		$this->assertNotFalse( $logo_support );
		
		$config = $logo_support[0];
		$this->assertEquals( 120, $config['height'] );
		$this->assertEquals( 300, $config['width'] );
		$this->assertTrue( $config['flex-height'] );
		$this->assertTrue( $config['flex-width'] );
	}

	/**
	 * Test HTML5 support includes expected elements
	 */
	public function test_html5_support() {
		$html5_support = get_theme_support( 'html5' );
		$this->assertNotFalse( $html5_support );
		
		$supported_elements = $html5_support[0];
		$expected_elements = [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		];

		foreach ( $expected_elements as $element ) {
			$this->assertContains( $element, $supported_elements );
		}
	}

	/**
	 * Test navigation menus are registered
	 */
	public function test_nav_menus_registered() {
		$menus = get_registered_nav_menus();
		
		$this->assertArrayHasKey( 'primary', $menus );
		$this->assertArrayHasKey( 'footer', $menus );
		$this->assertArrayHasKey( 'social', $menus );
		
		$this->assertEquals( 'Primary Menu', $menus['primary'] );
		$this->assertEquals( 'Footer Menu', $menus['footer'] );
		$this->assertEquals( 'Social Links', $menus['social'] );
	}

	/**
	 * Test custom image sizes are added
	 */
	public function test_custom_image_sizes() {
		global $_wp_additional_image_sizes;
		
		$this->assertArrayHasKey( 'starter-theme-featured', $_wp_additional_image_sizes );
		$this->assertArrayHasKey( 'starter-theme-card', $_wp_additional_image_sizes );
		$this->assertArrayHasKey( 'starter-theme-avatar', $_wp_additional_image_sizes );
		$this->assertArrayHasKey( 'starter-theme-thumbnail', $_wp_additional_image_sizes );
		
		// Test featured image size
		$featured_size = $_wp_additional_image_sizes['starter-theme-featured'];
		$this->assertEquals( 1200, $featured_size['width'] );
		$this->assertEquals( 675, $featured_size['height'] );
		$this->assertTrue( $featured_size['crop'] );
	}

	/**
	 * Test content width is set
	 */
	public function test_content_width() {
		global $content_width;
		$this->assertEquals( 720, $content_width );
	}

	/**
	 * Test editor styles are enqueued
	 */
	public function test_editor_styles() {
		$editor_styles = get_editor_stylesheets();
		
		$this->assertContains( 'assets/css/global.css', $editor_styles );
		$this->assertContains( 'assets/css/accessibility.css', $editor_styles );
		$this->assertContains( 'assets/css/navigation.css', $editor_styles );
		$this->assertContains( 'assets/css/blocks.css', $editor_styles );
	}

	/**
	 * Test theme textdomain is loaded
	 */
	public function test_textdomain_loaded() {
		$this->assertTrue( is_textdomain_loaded( 'starter-theme' ) );
	}
}