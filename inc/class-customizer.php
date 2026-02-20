<?php
/**
 * Customizer sections with live preview.
 *
 * @package starter-theme
 * @since 1.0.0
 */


namespace Starter_Theme;

class Customizer {

	public function init(): void {
		add_action( 'customize_register', array( $this, 'register_settings' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview' ) );
		add_action( 'wp_head', array( $this, 'output_custom_css' ) );
	}

	public function register_settings( \WP_Customize_Manager $wp_customize ): void {
		// Brand Identity section
		$wp_customize->add_section(
			'starter_theme_brand',
			array(
				'title'    => __( 'Brand Identity', 'starter-theme' ),
				'priority' => 30,
			)
		);

		// Primary color
		$wp_customize->add_setting(
			'starter_theme_primary_color',
			array(
				'default'           => '#2563eb',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'starter_theme_primary_color',
				array(
					'label'    => __( 'Primary Color', 'starter-theme' ),
					'section'  => 'starter_theme_brand',
					'settings' => 'starter_theme_primary_color',
				)
			)
		);

		// Secondary color
		$wp_customize->add_setting(
			'starter_theme_secondary_color',
			array(
				'default'           => '#64748b',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'starter_theme_secondary_color',
				array(
					'label'    => __( 'Secondary Color', 'starter-theme' ),
					'section'  => 'starter_theme_brand',
					'settings' => 'starter_theme_secondary_color',
				)
			)
		);

		// Accent color
		$wp_customize->add_setting(
			'starter_theme_accent_color',
			array(
				'default'           => '#f59e0b',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'starter_theme_accent_color',
				array(
					'label'    => __( 'Accent Color', 'starter-theme' ),
					'section'  => 'starter_theme_brand',
					'settings' => 'starter_theme_accent_color',
				)
			)
		);

		// Typography section
		$wp_customize->add_section(
			'starter_theme_typography',
			array(
				'title'    => __( 'Typography', 'starter-theme' ),
				'priority' => 35,
			)
		);

		// Heading font family
		$wp_customize->add_setting(
			'starter_theme_heading_font',
			array(
				'default'           => 'heading',
				'sanitize_callback' => array( $this, 'sanitize_font_family' ),
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_heading_font',
			array(
				'label'   => __( 'Heading Font Family', 'starter-theme' ),
				'section' => 'starter_theme_typography',
				'type'    => 'select',
				'choices' => array(
					'heading' => __( 'System Serif', 'starter-theme' ),
					'body'    => __( 'System Sans', 'starter-theme' ),
					'mono'    => __( 'Monospace', 'starter-theme' ),
				),
			)
		);

		// Body font family
		$wp_customize->add_setting(
			'starter_theme_body_font',
			array(
				'default'           => 'body',
				'sanitize_callback' => array( $this, 'sanitize_font_family' ),
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_body_font',
			array(
				'label'   => __( 'Body Font Family', 'starter-theme' ),
				'section' => 'starter_theme_typography',
				'type'    => 'select',
				'choices' => array(
					'heading' => __( 'System Serif', 'starter-theme' ),
					'body'    => __( 'System Sans', 'starter-theme' ),
					'mono'    => __( 'Monospace', 'starter-theme' ),
				),
			)
		);

		// Base font size
		$wp_customize->add_setting(
			'starter_theme_base_font_size',
			array(
				'default'           => 16,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_base_font_size',
			array(
				'label'       => __( 'Base Font Size (px)', 'starter-theme' ),
				'section'     => 'starter_theme_typography',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 14,
					'max'  => 20,
					'step' => 1,
				),
			)
		);

		// Header section
		$wp_customize->add_section(
			'starter_theme_header',
			array(
				'title'    => __( 'Header Options', 'starter-theme' ),
				'priority' => 40,
			)
		);

		// Sticky header
		$wp_customize->add_setting(
			'starter_theme_sticky_header',
			array(
				'default'           => false,
				'sanitize_callback' => 'wp_validate_boolean',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_sticky_header',
			array(
				'label'   => __( 'Sticky Header', 'starter-theme' ),
				'section' => 'starter_theme_header',
				'type'    => 'checkbox',
			)
		);

		// Search in header
		$wp_customize->add_setting(
			'starter_theme_header_search',
			array(
				'default'           => true,
				'sanitize_callback' => 'wp_validate_boolean',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'starter_theme_header_search',
			array(
				'label'   => __( 'Show Search in Header', 'starter-theme' ),
				'section' => 'starter_theme_header',
				'type'    => 'checkbox',
			)
		);

		// Logo max width
		$wp_customize->add_setting(
			'starter_theme_logo_width',
			array(
				'default'           => 200,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_logo_width',
			array(
				'label'       => __( 'Logo Max Width (px)', 'starter-theme' ),
				'section'     => 'starter_theme_header',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 100,
					'max'  => 400,
					'step' => 10,
				),
			)
		);

		// Footer section
		$wp_customize->add_section(
			'starter_theme_footer',
			array(
				'title'    => __( 'Footer Options', 'starter-theme' ),
				'priority' => 45,
			)
		);

		// Footer columns
		$wp_customize->add_setting(
			'starter_theme_footer_columns',
			array(
				'default'           => 3,
				'sanitize_callback' => 'absint',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'starter_theme_footer_columns',
			array(
				'label'   => __( 'Footer Columns', 'starter-theme' ),
				'section' => 'starter_theme_footer',
				'type'    => 'select',
				'choices' => array(
					1 => __( '1 Column', 'starter-theme' ),
					2 => __( '2 Columns', 'starter-theme' ),
					3 => __( '3 Columns', 'starter-theme' ),
					4 => __( '4 Columns', 'starter-theme' ),
				),
			)
		);

		// Copyright text
		$wp_customize->add_setting(
			'starter_theme_copyright_text',
			array(
				'default'           => sprintf(
					/* translators: %s: current year */
					__( '© %s Starter Theme. All rights reserved.', 'starter-theme' ),
					gmdate( 'Y' )
				),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_copyright_text',
			array(
				'label'   => __( 'Copyright Text', 'starter-theme' ),
				'section' => 'starter_theme_footer',
				'type'    => 'text',
			)
		);

		// Layout section
		$wp_customize->add_section(
			'starter_theme_layout',
			array(
				'title'    => __( 'Layout Options', 'starter-theme' ),
				'priority' => 50,
			)
		);

		// Sidebar position
		$wp_customize->add_setting(
			'starter_theme_sidebar_position',
			array(
				'default'           => 'right',
				'sanitize_callback' => array( $this, 'sanitize_sidebar_position' ),
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'starter_theme_sidebar_position',
			array(
				'label'   => __( 'Sidebar Position', 'starter-theme' ),
				'section' => 'starter_theme_layout',
				'type'    => 'select',
				'choices' => array(
					'none'  => __( 'No Sidebar', 'starter-theme' ),
					'left'  => __( 'Left Sidebar', 'starter-theme' ),
					'right' => __( 'Right Sidebar', 'starter-theme' ),
				),
			)
		);

		// Content width
		$wp_customize->add_setting(
			'starter_theme_content_width',
			array(
				'default'           => 720,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'starter_theme_content_width',
			array(
				'label'       => __( 'Content Width (px)', 'starter-theme' ),
				'section'     => 'starter_theme_layout',
				'type'        => 'range',
				'input_attrs' => array(
					'min'  => 600,
					'max'  => 1000,
					'step' => 20,
				),
			)
		);

		// Performance section
		$wp_customize->add_section(
			'starter_theme_performance',
			array(
				'title'    => __( 'Performance', 'starter-theme' ),
				'priority' => 55,
			)
		);

		// Lazy loading
		$wp_customize->add_setting(
			'starter_theme_lazy_loading',
			array(
				'default'           => true,
				'sanitize_callback' => 'wp_validate_boolean',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'starter_theme_lazy_loading',
			array(
				'label'   => __( 'Enable Lazy Loading', 'starter-theme' ),
				'section' => 'starter_theme_performance',
				'type'    => 'checkbox',
			)
		);

		// Prefetch links
		$wp_customize->add_setting(
			'starter_theme_prefetch_links',
			array(
				'default'           => true,
				'sanitize_callback' => 'wp_validate_boolean',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'starter_theme_prefetch_links',
			array(
				'label'   => __( 'Prefetch Internal Links', 'starter-theme' ),
				'section' => 'starter_theme_performance',
				'type'    => 'checkbox',
			)
		);
	}

	public function customize_preview(): void {
		wp_enqueue_script(
			'starter-theme-customizer',
			STARTER_THEME_URI . '/assets/js/customizer.js',
			array( 'jquery', 'customize-preview' ),
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
		$css_rules = array();

		// Brand colors
		$primary_color   = get_theme_mod( 'starter_theme_primary_color', '#2563eb' );
		$secondary_color = get_theme_mod( 'starter_theme_secondary_color', '#64748b' );
		$accent_color    = get_theme_mod( 'starter_theme_accent_color', '#f59e0b' );

		$css_rules[] = sprintf(
			':root { --wp--preset--color--primary: %s; --wp--preset--color--secondary: %s; --wp--preset--color--accent: %s; }',
			esc_attr( $primary_color ),
			esc_attr( $secondary_color ),
			esc_attr( $accent_color )
		);

		// Typography
		$heading_font   = get_theme_mod( 'starter_theme_heading_font', 'heading' );
		$body_font      = get_theme_mod( 'starter_theme_body_font', 'body' );
		$base_font_size = get_theme_mod( 'starter_theme_base_font_size', 16 );

		if ( 'heading' !== $heading_font ) {
			$css_rules[] = sprintf(
				'h1, h2, h3, h4, h5, h6 { font-family: var(--wp--preset--font-family--%s); }',
				esc_attr( $heading_font )
			);
		}

		if ( 'body' !== $body_font ) {
			$css_rules[] = sprintf(
				'body { font-family: var(--wp--preset--font-family--%s); }',
				esc_attr( $body_font )
			);
		}

		if ( 16 !== $base_font_size ) {
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
		if ( 200 !== $logo_width ) {
			$css_rules[] = sprintf(
				'.custom-logo { max-width: %dpx; }',
				(int) $logo_width
			);
		}

		// Layout
		$content_width = get_theme_mod( 'starter_theme_content_width', 720 );
		if ( 720 !== $content_width ) {
			$css_rules[] = sprintf(
				':root { --wp--custom--layout--content-size: %dpx; }',
				(int) $content_width
			);
		}

		return implode( ' ', $css_rules );
	}

	public function sanitize_font_family( $input ): string {
		$valid_fonts = array( 'heading', 'body', 'mono' );
		return in_array( $input, $valid_fonts, true ) ? $input : 'body';
	}

	public function sanitize_sidebar_position( $input ): string {
		$valid_positions = array( 'none', 'left', 'right' );
		return in_array( $input, $valid_positions, true ) ? $input : 'right';
	}
}
