<?php
/**
 * Custom block style variations.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

namespace Starter_Theme;

class Block_Styles {

	public function init(): void {
		add_action( 'init', [ $this, 'register' ] );
	}

	public function register(): void {
		$styles = $this->get_styles();

		foreach ( $styles as $block => $variations ) {
			foreach ( $variations as $variation ) {
				register_block_style( $block, $variation );
			}
		}
	}

	/**
	 * @return array<string, array<int, array{name: string, label: string}>>
	 */
	private function get_styles(): array {
		return [
			'core/button' => [
				[
					'name'  => 'outline',
					'label' => esc_html__( 'Outline', 'starter-theme' ),
				],
				[
					'name'  => 'rounded',
					'label' => esc_html__( 'Rounded', 'starter-theme' ),
				],
				[
					'name'  => 'shadow',
					'label' => esc_html__( 'Shadow', 'starter-theme' ),
				],
			],
			'core/image'  => [
				[
					'name'  => 'rounded',
					'label' => esc_html__( 'Rounded', 'starter-theme' ),
				],
				[
					'name'  => 'shadow',
					'label' => esc_html__( 'Shadow', 'starter-theme' ),
				],
				[
					'name'  => 'frame',
					'label' => esc_html__( 'Frame', 'starter-theme' ),
				],
			],
			'core/group'  => [
				[
					'name'  => 'card',
					'label' => esc_html__( 'Card', 'starter-theme' ),
				],
				[
					'name'  => 'highlight',
					'label' => esc_html__( 'Highlight', 'starter-theme' ),
				],
			],
			'core/quote'  => [
				[
					'name'  => 'large',
					'label' => esc_html__( 'Large', 'starter-theme' ),
				],
				[
					'name'  => 'bordered',
					'label' => esc_html__( 'Bordered', 'starter-theme' ),
				],
			],
		];
	}
}
