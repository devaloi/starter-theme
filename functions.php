<?php
/**
 * Starter Theme functions and definitions.
 *
 * @package starter-theme
 * @since 1.0.0
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

define( 'STARTER_THEME_VERSION', '1.0.0' );
define( 'STARTER_THEME_DIR', get_template_directory() );
define( 'STARTER_THEME_URI', get_template_directory_uri() );

require_once STARTER_THEME_DIR . '/inc/class-theme-setup.php';
require_once STARTER_THEME_DIR . '/inc/class-enqueue.php';
require_once STARTER_THEME_DIR . '/inc/class-customizer.php';
require_once STARTER_THEME_DIR . '/inc/class-block-patterns.php';
require_once STARTER_THEME_DIR . '/inc/class-block-styles.php';
require_once STARTER_THEME_DIR . '/inc/class-performance.php';

( new Starter_Theme\Theme_Setup() )->init();
( new Starter_Theme\Enqueue() )->init();
( new Starter_Theme\Customizer() )->init();
( new Starter_Theme\Block_Patterns() )->init();
( new Starter_Theme\Block_Styles() )->init();
( new Starter_Theme\Performance() )->init();
