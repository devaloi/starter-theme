<?php
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
