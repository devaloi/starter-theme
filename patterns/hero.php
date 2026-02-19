<?php
/**
 * Hero pattern for Starter Theme
 *
 * @package starter-theme
 */

return [
	'title'       => __( 'Hero Section', 'starter-theme' ),
	'description' => __( 'A large hero section with heading, subtitle, call-to-action buttons and optional background image.', 'starter-theme' ),
	'categories'  => [ 'starter-theme', 'header', 'call-to-action' ],
	'keywords'    => [ 'hero', 'banner', 'header', 'cta', 'welcome' ],
	'content'     => '<!-- wp:cover {"url":"","id":0,"dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":80,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--3xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--3xl);padding-left:var(--wp--preset--spacing--md);min-height:80vh"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}},"typography":{"lineHeight":"1.1"}},"textColor":"background"} -->
<h1 class="wp-block-heading has-text-align-center has-background-color has-text-color has-xx-large-font-size" style="margin-bottom:var(--wp--preset--spacing--md);line-height:1.1">Welcome to Your New Website</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}},"typography":{"lineHeight":"1.4"}},"textColor":"background"} -->
<p class="has-text-align-center has-background-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--xl);line-height:1.4">Create something amazing with our modern, accessible WordPress block theme. Built for performance and designed for everyone.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"border":{"radius":"var:custom|border-radius|button"},"spacing":{"padding":{"left":"var:preset|spacing|xl","right":"var:preset|spacing|xl","top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color wp-element-button" href="#" style="border-radius:var(--wp--custom--border-radius--button);padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--xl)">Get Started</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"transparent","textColor":"background","style":{"border":{"radius":"var:custom|border-radius|button","width":"2px","color":"#ffffff"},"spacing":{"padding":{"left":"var:preset|spacing|xl","right":"var:preset|spacing|xl","top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-transparent-background-color has-text-color has-border-color wp-element-button" href="#" style="border-color:#ffffff;border-radius:var(--wp--custom--border-radius--button);border-width:2px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--xl)">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
];