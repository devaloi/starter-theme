<?php
/**
 * Tests for customizer functionality
 *
 * @package starter-theme
 */

class Test_Customizer extends WP_UnitTestCase {

	/**
	 * @var WP_Customize_Manager
	 */
	private $wp_customize;

	/**
	 * @var Starter_Theme\Customizer
	 */
	private $customizer;

	public function setUp(): void {
		parent::setUp();
		
		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';
		$this->wp_customize = new WP_Customize_Manager();
		$this->customizer = new Starter_Theme\Customizer();
		$this->customizer->register_settings( $this->wp_customize );
	}

	/**
	 * Test customizer sections are registered
	 */
	public function test_customizer_sections() {
		$sections = [
			'starter_theme_brand',
			'starter_theme_typography',
			'starter_theme_header',
			'starter_theme_footer',
			'starter_theme_layout',
			'starter_theme_performance',
		];

		foreach ( $sections as $section_id ) {
			$section = $this->wp_customize->get_section( $section_id );
			$this->assertNotNull( $section );
		}
	}

	/**
	 * Test brand color settings
	 */
	public function test_brand_color_settings() {
		$color_settings = [
			'starter_theme_primary_color',
			'starter_theme_secondary_color',
			'starter_theme_accent_color',
		];

		foreach ( $color_settings as $setting_id ) {
			$setting = $this->wp_customize->get_setting( $setting_id );
			$this->assertNotNull( $setting );
			$this->assertEquals( 'postMessage', $setting->transport );
			$this->assertEquals( 'sanitize_hex_color', $setting->sanitize_callback );
		}
	}

	/**
	 * Test typography settings
	 */
	public function test_typography_settings() {
		// Heading font setting
		$heading_font = $this->wp_customize->get_setting( 'starter_theme_heading_font' );
		$this->assertNotNull( $heading_font );
		$this->assertEquals( 'heading', $heading_font->default );
		$this->assertEquals( [ $this->customizer, 'sanitize_font_family' ], $heading_font->sanitize_callback );

		// Body font setting
		$body_font = $this->wp_customize->get_setting( 'starter_theme_body_font' );
		$this->assertNotNull( $body_font );
		$this->assertEquals( 'body', $body_font->default );

		// Base font size setting
		$base_font_size = $this->wp_customize->get_setting( 'starter_theme_base_font_size' );
		$this->assertNotNull( $base_font_size );
		$this->assertEquals( 16, $base_font_size->default );
		$this->assertEquals( 'absint', $base_font_size->sanitize_callback );
	}

	/**
	 * Test header settings
	 */
	public function test_header_settings() {
		// Sticky header setting
		$sticky_header = $this->wp_customize->get_setting( 'starter_theme_sticky_header' );
		$this->assertNotNull( $sticky_header );
		$this->assertFalse( $sticky_header->default );
		$this->assertEquals( 'wp_validate_boolean', $sticky_header->sanitize_callback );

		// Header search setting
		$header_search = $this->wp_customize->get_setting( 'starter_theme_header_search' );
		$this->assertNotNull( $header_search );
		$this->assertTrue( $header_search->default );

		// Logo width setting
		$logo_width = $this->wp_customize->get_setting( 'starter_theme_logo_width' );
		$this->assertNotNull( $logo_width );
		$this->assertEquals( 200, $logo_width->default );
	}

	/**
	 * Test layout settings
	 */
	public function test_layout_settings() {
		// Sidebar position setting
		$sidebar_position = $this->wp_customize->get_setting( 'starter_theme_sidebar_position' );
		$this->assertNotNull( $sidebar_position );
		$this->assertEquals( 'right', $sidebar_position->default );
		$this->assertEquals( [ $this->customizer, 'sanitize_sidebar_position' ], $sidebar_position->sanitize_callback );

		// Content width setting
		$content_width = $this->wp_customize->get_setting( 'starter_theme_content_width' );
		$this->assertNotNull( $content_width );
		$this->assertEquals( 720, $content_width->default );
	}

	/**
	 * Test sanitization callbacks
	 */
	public function test_sanitize_font_family() {
		$this->assertEquals( 'body', $this->customizer->sanitize_font_family( 'body' ) );
		$this->assertEquals( 'heading', $this->customizer->sanitize_font_family( 'heading' ) );
		$this->assertEquals( 'mono', $this->customizer->sanitize_font_family( 'mono' ) );
		$this->assertEquals( 'body', $this->customizer->sanitize_font_family( 'invalid' ) );
	}

	public function test_sanitize_sidebar_position() {
		$this->assertEquals( 'left', $this->customizer->sanitize_sidebar_position( 'left' ) );
		$this->assertEquals( 'right', $this->customizer->sanitize_sidebar_position( 'right' ) );
		$this->assertEquals( 'none', $this->customizer->sanitize_sidebar_position( 'none' ) );
		$this->assertEquals( 'right', $this->customizer->sanitize_sidebar_position( 'invalid' ) );
	}

	/**
	 * Test custom CSS generation
	 */
	public function test_custom_css_generation() {
		// Set some theme mods
		set_theme_mod( 'starter_theme_primary_color', '#ff0000' );
		set_theme_mod( 'starter_theme_base_font_size', 18 );
		
		// Test CSS generation (using reflection to access private method)
		$reflection = new ReflectionClass( $this->customizer );
		$method = $reflection->getMethod( 'generate_custom_css' );
		$method->setAccessible( true );
		
		$css = $method->invoke( $this->customizer );
		
		$this->assertStringContainsString( '--wp--preset--color--primary: #ff0000', $css );
		$this->assertStringContainsString( 'font-size: 18px', $css );
	}

	/**
	 * Test default values match expectations
	 */
	public function test_default_values() {
		$defaults = [
			'starter_theme_primary_color' => '#2563eb',
			'starter_theme_secondary_color' => '#64748b',
			'starter_theme_accent_color' => '#f59e0b',
			'starter_theme_heading_font' => 'heading',
			'starter_theme_body_font' => 'body',
			'starter_theme_base_font_size' => 16,
			'starter_theme_sticky_header' => false,
			'starter_theme_header_search' => true,
			'starter_theme_logo_width' => 200,
			'starter_theme_footer_columns' => 3,
			'starter_theme_sidebar_position' => 'right',
			'starter_theme_content_width' => 720,
			'starter_theme_lazy_loading' => true,
			'starter_theme_prefetch_links' => true,
		];

		foreach ( $defaults as $setting_id => $expected_default ) {
			$setting = $this->wp_customize->get_setting( $setting_id );
			$this->assertNotNull( $setting, "Setting {$setting_id} should exist" );
			$this->assertEquals( $expected_default, $setting->default, "Setting {$setting_id} should have correct default" );
		}
	}
}