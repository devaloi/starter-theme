<?php
/**
 * Customizer sections with live preview.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Customizer {

	public function init(): void {
		add_action( 'customize_register', [ $this, 'register_settings' ] );
		add_action( 'customize_preview_init', [ $this, 'customize_preview' ] );
		add_action( 'wp_head', [ $this, 'output_custom_css' ] );
	}

	public function register_settings( \WP_Customize_Manager $wp_customize ): void {
		// Brand Identity section
		$wp_customize->add_section( 'starter_theme_brand', [
			'title'    => __( 'Brand Identity', 'starter-theme' ),
			'priority' => 30,
		] );

		// Primary color
		$wp_customize->add_setting( 'starter_theme_primary_color', [
			'default'           => '#2563eb',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'starter_theme_primary_color', [
			'label'    => __( 'Primary Color', 'starter-theme' ),
			'section'  => 'starter_theme_brand',
			'settings' => 'starter_theme_primary_color',
		] ) );

		// Secondary color
		$wp_customize->add_setting( 'starter_theme_secondary_color', [
			'default'           => '#64748b',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'starter_theme_secondary_color', [
			'label'    => __( 'Secondary Color', 'starter-theme' ),
			'section'  => 'starter_theme_brand',
			'settings' => 'starter_theme_secondary_color',
		] ) );

		// Accent color
		$wp_customize->add_setting( 'starter_theme_accent_color', [
			'default'           => '#f59e0b',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'starter_theme_accent_color', [
			'label'    => __( 'Accent Color', 'starter-theme' ),
			'section'  => 'starter_theme_brand',
			'settings' => 'starter_theme_accent_color',
		] ) );

		// Typography section
		$wp_customize->add_section( 'starter_theme_typography', [
			'title'    => __( 'Typography', 'starter-theme' ),
			'priority' => 35,
		] );

		// Heading font family
		$wp_customize->add_setting( 'starter_theme_heading_font', [
			'default'           => 'heading',
			'sanitize_callback' => [ $this, 'sanitize_font_family' ],
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_heading_font', [
			'label'   => __( 'Heading Font Family', 'starter-theme' ),
			'section' => 'starter_theme_typography',
			'type'    => 'select',
			'choices' => [
				'heading' => __( 'System Serif', 'starter-theme' ),
				'body'    => __( 'System Sans', 'starter-theme' ),
				'mono'    => __( 'Monospace', 'starter-theme' ),
			],
		] );

		// Body font family
		$wp_customize->add_setting( 'starter_theme_body_font', [
			'default'           => 'body',
			'sanitize_callback' => [ $this, 'sanitize_font_family' ],
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_body_font', [
			'label'   => __( 'Body Font Family', 'starter-theme' ),
			'section' => 'starter_theme_typography',
			'type'    => 'select',
			'choices' => [
				'heading' => __( 'System Serif', 'starter-theme' ),
				'body'    => __( 'System Sans', 'starter-theme' ),
				'mono'    => __( 'Monospace', 'starter-theme' ),
			],
		] );

		// Base font size
		$wp_customize->add_setting( 'starter_theme_base_font_size', [
			'default'           => 16,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_base_font_size', [
			'label'       => __( 'Base Font Size (px)', 'starter-theme' ),
			'section'     => 'starter_theme_typography',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 14,
				'max'  => 20,
				'step' => 1,
			],
		] );

		// Header section
		$wp_customize->add_section( 'starter_theme_header', [
			'title'    => __( 'Header Options', 'starter-theme' ),
			'priority' => 40,
		] );

		// Sticky header
		$wp_customize->add_setting( 'starter_theme_sticky_header', [
			'default'           => false,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_sticky_header', [
			'label'   => __( 'Sticky Header', 'starter-theme' ),
			'section' => 'starter_theme_header',
			'type'    => 'checkbox',
		] );

		// Search in header
		$wp_customize->add_setting( 'starter_theme_header_search', [
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		] );

		$wp_customize->add_control( 'starter_theme_header_search', [
			'label'   => __( 'Show Search in Header', 'starter-theme' ),
			'section' => 'starter_theme_header',
			'type'    => 'checkbox',
		] );

		// Logo max width
		$wp_customize->add_setting( 'starter_theme_logo_width', [
			'default'           => 200,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_logo_width', [
			'label'       => __( 'Logo Max Width (px)', 'starter-theme' ),
			'section'     => 'starter_theme_header',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 100,
				'max'  => 400,
				'step' => 10,
			],
		] );

		// Footer section
		$wp_customize->add_section( 'starter_theme_footer', [
			'title'    => __( 'Footer Options', 'starter-theme' ),
			'priority' => 45,
		] );

		// Footer columns
		$wp_customize->add_setting( 'starter_theme_footer_columns', [
			'default'           => 3,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		] );

		$wp_customize->add_control( 'starter_theme_footer_columns', [
			'label'   => __( 'Footer Columns', 'starter-theme' ),
			'section' => 'starter_theme_footer',
			'type'    => 'select',
			'choices' => [
				1 => __( '1 Column', 'starter-theme' ),
				2 => __( '2 Columns', 'starter-theme' ),
				3 => __( '3 Columns', 'starter-theme' ),
				4 => __( '4 Columns', 'starter-theme' ),
			],
		] );

		// Copyright text
		$wp_customize->add_setting( 'starter_theme_copyright_text', [
			'default'           => sprintf( 
				/* translators: %s: current year */
				__( '© %s Starter Theme. All rights reserved.', 'starter-theme' ), 
				gmdate( 'Y' ) 
			),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_copyright_text', [
			'label'   => __( 'Copyright Text', 'starter-theme' ),
			'section' => 'starter_theme_footer',
			'type'    => 'text',
		] );

		// Layout section
		$wp_customize->add_section( 'starter_theme_layout', [
			'title'    => __( 'Layout Options', 'starter-theme' ),
			'priority' => 50,
		] );

		// Sidebar position
		$wp_customize->add_setting( 'starter_theme_sidebar_position', [
			'default'           => 'right',
			'sanitize_callback' => [ $this, 'sanitize_sidebar_position' ],
			'transport'         => 'refresh',
		] );

		$wp_customize->add_control( 'starter_theme_sidebar_position', [
			'label'   => __( 'Sidebar Position', 'starter-theme' ),
			'section' => 'starter_theme_layout',
			'type'    => 'select',
			'choices' => [
				'none'  => __( 'No Sidebar', 'starter-theme' ),
				'left'  => __( 'Left Sidebar', 'starter-theme' ),
				'right' => __( 'Right Sidebar', 'starter-theme' ),
			],
		] );

		// Content width
		$wp_customize->add_setting( 'starter_theme_content_width', [
			'default'           => 720,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_content_width', [
			'label'       => __( 'Content Width (px)', 'starter-theme' ),
			'section'     => 'starter_theme_layout',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 600,
				'max'  => 1000,
				'step' => 20,
			],
		] );

		// Performance section
		$wp_customize->add_section( 'starter_theme_performance', [
			'title'    => __( 'Performance', 'starter-theme' ),
			'priority' => 55,
		] );

		// Lazy loading
		$wp_customize->add_setting( 'starter_theme_lazy_loading', [
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		] );

		$wp_customize->add_control( 'starter_theme_lazy_loading', [
			'label'   => __( 'Enable Lazy Loading', 'starter-theme' ),
			'section' => 'starter_theme_performance',
			'type'    => 'checkbox',
		] );

		// Prefetch links
		$wp_customize->add_setting( 'starter_theme_prefetch_links', [
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		] );

		$wp_customize->add_control( 'starter_theme_prefetch_links', [
			'label'   => __( 'Prefetch Internal Links', 'starter-theme' ),
			'section' => 'starter_theme_performance',
			'type'    => 'checkbox',
		] );
	}

	public function customize_preview(): void {
		wp_enqueue_script(
			'starter-theme-customizer',
			STARTER_THEME_URI . '/assets/js/customizer.js',
			[ 'jquery', 'customize-preview' ],
			STARTER_THEME_VERSION,
			true
		);
	}

	public function output_custom_css(): void {
		$css = $this->generate_custom_css();
		
		if ( ! empty( $css ) ) {
			printf(
				'<style type="text/css" id="starter-theme-custom-css">%s</style>',
				wp_strip_all_tags( $css ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
	}

	private function generate_custom_css(): string {
		$css_rules = [];

		// Brand colors
		$primary_color = get_theme_mod( 'starter_theme_primary_color', '#2563eb' );
		$secondary_color = get_theme_mod( 'starter_theme_secondary_color', '#64748b' );
		$accent_color = get_theme_mod( 'starter_theme_accent_color', '#f59e0b' );

		$css_rules[] = sprintf(
			':root { --wp--preset--color--primary: %s; --wp--preset--color--secondary: %s; --wp--preset--color--accent: %s; }',
			esc_attr( $primary_color ),
			esc_attr( $secondary_color ),
			esc_attr( $accent_color )
		);

		// Typography
		$heading_font = get_theme_mod( 'starter_theme_heading_font', 'heading' );
		$body_font = get_theme_mod( 'starter_theme_body_font', 'body' );
		$base_font_size = get_theme_mod( 'starter_theme_base_font_size', 16 );

		if ( $heading_font !== 'heading' ) {
			$css_rules[] = sprintf(
				'h1, h2, h3, h4, h5, h6 { font-family: var(--wp--preset--font-family--%s); }',
				esc_attr( $heading_font )
			);
		}

		if ( $body_font !== 'body' ) {
			$css_rules[] = sprintf(
				'body { font-family: var(--wp--preset--font-family--%s); }',
				esc_attr( $body_font )
			);
		}

		if ( $base_font_size !== 16 ) {
			$css_rules[] = sprintf(
				'body { font-size: %dpx; }',
				(int) $base_font_size
			);
		}

		// Header options
		$sticky_header = get_theme_mod( 'starter_theme_sticky_header', false );
		if ( $sticky_header ) {
			$css_rules[] = '.wp-site-blocks > header { position: sticky; top: 0; z-index: 999; }';
		}

		$logo_width = get_theme_mod( 'starter_theme_logo_width', 200 );
		if ( $logo_width !== 200 ) {
			$css_rules[] = sprintf(
				'.custom-logo { max-width: %dpx; }',
				(int) $logo_width
			);
		}

		// Layout
		$content_width = get_theme_mod( 'starter_theme_content_width', 720 );
		if ( $content_width !== 720 ) {
			$css_rules[] = sprintf(
				':root { --wp--custom--layout--content-size: %dpx; }',
				(int) $content_width
			);
		}

		return implode( ' ', $css_rules );
	}

	public function sanitize_font_family( $input ): string {
		$valid_fonts = [ 'heading', 'body', 'mono' ];
		return in_array( $input, $valid_fonts, true ) ? $input : 'body';
	}

	public function sanitize_sidebar_position( $input ): string {
		$valid_positions = [ 'none', 'left', 'right' ];
		return in_array( $input, $valid_positions, true ) ? $input : 'right';
	}
}
/**
 * Customizer sections, settings, and controls.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Customizer {

	public function init(): void {
		add_action( 'customize_register', [ $this, 'register' ] );
	}

	public function register( \WP_Customize_Manager $wp_customize ): void {
		$this->register_brand_section( $wp_customize );
		$this->register_typography_section( $wp_customize );
		$this->register_header_section( $wp_customize );
		$this->register_footer_section( $wp_customize );
		$this->register_layout_section( $wp_customize );
		$this->register_performance_section( $wp_customize );
	}

	private function register_brand_section( \WP_Customize_Manager $wp_customize ): void {
		$wp_customize->add_section( 'starter_theme_brand', [
			'title'    => esc_html__( 'Brand Identity', 'starter-theme' ),
			'priority' => 30,
		] );

		$colors = [
			'primary'   => [ esc_html__( 'Primary Color', 'starter-theme' ), '#1e40af' ],
			'secondary' => [ esc_html__( 'Secondary Color', 'starter-theme' ), '#7c3aed' ],
			'accent'    => [ esc_html__( 'Accent Color', 'starter-theme' ), '#f59e0b' ],
		];

		foreach ( $colors as $key => [ $label, $default ] ) {
			$setting_id = "starter_theme_brand_{$key}";

			$wp_customize->add_setting( $setting_id, [
				'default'           => $default,
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			] );

			$wp_customize->add_control( new \WP_Customize_Color_Control(
				$wp_customize,
				$setting_id,
				[
					'label'   => $label,
					'section' => 'starter_theme_brand',
				]
			) );
		}
	}

	private function register_typography_section( \WP_Customize_Manager $wp_customize ): void {
		$wp_customize->add_section( 'starter_theme_typography', [
			'title'    => esc_html__( 'Typography', 'starter-theme' ),
			'priority' => 35,
		] );

		$wp_customize->add_setting( 'starter_theme_heading_font', [
			'default'           => 'Georgia, serif',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_heading_font', [
			'label'   => esc_html__( 'Heading Font Family', 'starter-theme' ),
			'section' => 'starter_theme_typography',
			'type'    => 'select',
			'choices' => [
				'Georgia, serif'                                          => 'Georgia',
				'"Palatino Linotype", "Book Antiqua", Palatino, serif'    => 'Palatino',
				'system-ui, -apple-system, BlinkMacSystemFont, sans-serif' => 'System UI',
			],
		] );

		$wp_customize->add_setting( 'starter_theme_body_font', [
			'default'           => 'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_body_font', [
			'label'   => esc_html__( 'Body Font Family', 'starter-theme' ),
			'section' => 'starter_theme_typography',
			'type'    => 'select',
			'choices' => [
				'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif' => 'System Sans',
				'Georgia, serif'                                                                => 'Georgia',
				'"Courier New", Courier, monospace'                                             => 'Monospace',
			],
		] );

		$wp_customize->add_setting( 'starter_theme_base_font_size', [
			'default'           => 16,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		] );

		$wp_customize->add_control( 'starter_theme_base_font_size', [
			'label'       => esc_html__( 'Base Font Size (px)', 'starter-theme' ),
			'section'     => 'starter_theme_typography',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 14,
				'max'  => 22,
				'step' => 1,
			],
		] );
	}

	private function register_header_section( \WP_Customize_Manager $wp_customize ): void {
		$wp_customize->add_section( 'starter_theme_header', [
			'title'    => esc_html__( 'Header', 'starter-theme' ),
			'priority' => 40,
		] );

		$wp_customize->add_setting( 'starter_theme_logo_max_width', [
			'default'           => 200,
			'sanitize_callback' => 'absint',
		] );

		$wp_customize->add_control( 'starter_theme_logo_max_width', [
			'label'       => esc_html__( 'Logo Max Width (px)', 'starter-theme' ),
			'section'     => 'starter_theme_header',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 50,
				'max'  => 400,
				'step' => 10,
			],
		] );

		$wp_customize->add_setting( 'starter_theme_sticky_header', [
			'default'           => false,
			'sanitize_callback' => [ $this, 'sanitize_checkbox' ],
		] );

		$wp_customize->add_control( 'starter_theme_sticky_header', [
			'label'   => esc_html__( 'Enable Sticky Header', 'starter-theme' ),
			'section' => 'starter_theme_header',
			'type'    => 'checkbox',
		] );

		$wp_customize->add_setting( 'starter_theme_search_toggle', [
			'default'           => true,
			'sanitize_callback' => [ $this, 'sanitize_checkbox' ],
		] );

		$wp_customize->add_control( 'starter_theme_search_toggle', [
			'label'   => esc_html__( 'Show Search in Header', 'starter-theme' ),
			'section' => 'starter_theme_header',
			'type'    => 'checkbox',
		] );
	}

	private function register_footer_section( \WP_Customize_Manager $wp_customize ): void {
		$wp_customize->add_section( 'starter_theme_footer', [
			'title'    => esc_html__( 'Footer', 'starter-theme' ),
			'priority' => 45,
		] );

		$wp_customize->add_setting( 'starter_theme_footer_columns', [
			'default'           => 3,
			'sanitize_callback' => 'absint',
		] );

		$wp_customize->add_control( 'starter_theme_footer_columns', [
			'label'       => esc_html__( 'Footer Columns', 'starter-theme' ),
			'section'     => 'starter_theme_footer',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		] );

		$wp_customize->add_setting( 'starter_theme_copyright', [
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		$wp_customize->add_control( 'starter_theme_copyright', [
			'label'   => esc_html__( 'Copyright Text', 'starter-theme' ),
			'section' => 'starter_theme_footer',
			'type'    => 'text',
		] );

		$socials = [ 'twitter', 'facebook', 'instagram', 'linkedin' ];
		foreach ( $socials as $network ) {
			$setting_id = "starter_theme_social_{$network}";

			$wp_customize->add_setting( $setting_id, [
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			] );

			$wp_customize->add_control( $setting_id, [
				'label'   => sprintf(
					/* translators: %s: social network name */
					esc_html__( '%s URL', 'starter-theme' ),
					ucfirst( $network )
				),
				'section' => 'starter_theme_footer',
				'type'    => 'url',
			] );
		}
	}

	private function register_layout_section( \WP_Customize_Manager $wp_customize ): void {
		$wp_customize->add_section( 'starter_theme_layout', [
			'title'    => esc_html__( 'Layout', 'starter-theme' ),
			'priority' => 50,
		] );

		$wp_customize->add_setting( 'starter_theme_sidebar_position', [
			'default'           => 'none',
			'sanitize_callback' => [ $this, 'sanitize_sidebar_position' ],
		] );

		$wp_customize->add_control( 'starter_theme_sidebar_position', [
			'label'   => esc_html__( 'Sidebar Position', 'starter-theme' ),
			'section' => 'starter_theme_layout',
			'type'    => 'select',
			'choices' => [
				'none'  => esc_html__( 'No Sidebar', 'starter-theme' ),
				'left'  => esc_html__( 'Left', 'starter-theme' ),
				'right' => esc_html__( 'Right', 'starter-theme' ),
			],
		] );

		$wp_customize->add_setting( 'starter_theme_content_width', [
			'default'           => 720,
			'sanitize_callback' => 'absint',
		] );

		$wp_customize->add_control( 'starter_theme_content_width', [
			'label'       => esc_html__( 'Content Width (px)', 'starter-theme' ),
			'section'     => 'starter_theme_layout',
			'type'        => 'range',
			'input_attrs' => [
				'min'  => 600,
				'max'  => 960,
				'step' => 20,
			],
		] );
	}

	private function register_performance_section( \WP_Customize_Manager $wp_customize ): void {
		$wp_customize->add_section( 'starter_theme_performance', [
			'title'    => esc_html__( 'Performance', 'starter-theme' ),
			'priority' => 55,
		] );

		$wp_customize->add_setting( 'starter_theme_lazy_loading', [
			'default'           => true,
			'sanitize_callback' => [ $this, 'sanitize_checkbox' ],
		] );

		$wp_customize->add_control( 'starter_theme_lazy_loading', [
			'label'   => esc_html__( 'Enable Lazy Loading', 'starter-theme' ),
			'section' => 'starter_theme_performance',
			'type'    => 'checkbox',
		] );

		$wp_customize->add_setting( 'starter_theme_prefetch', [
			'default'           => true,
			'sanitize_callback' => [ $this, 'sanitize_checkbox' ],
		] );

		$wp_customize->add_control( 'starter_theme_prefetch', [
			'label'   => esc_html__( 'Enable Prefetch', 'starter-theme' ),
			'section' => 'starter_theme_performance',
			'type'    => 'checkbox',
		] );
	}

	public function sanitize_checkbox( mixed $value ): bool {
		return (bool) $value;
	}

	public function sanitize_sidebar_position( string $value ): string {
		$valid = [ 'none', 'left', 'right' ];
		return in_array( $value, $valid, true ) ? $value : 'none';
	}
}
