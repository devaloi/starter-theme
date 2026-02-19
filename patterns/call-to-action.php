<?php
/**
 * Call to Action pattern for Starter Theme
 *
 * @package starter-theme
 */

return [
	'title'       => __( 'Call to Action', 'starter-theme' ),
	'description' => __( 'A centered call-to-action section with heading, text and button on colored background.', 'starter-theme' ),
	'categories'  => [ 'starter-theme', 'call-to-action', 'buttons' ],
	'keywords'    => [ 'cta', 'call-to-action', 'banner', 'button', 'conversion' ],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"margin":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl"}}},"backgroundColor":"primary","textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-primary-background-color has-text-color" style="margin-top:var(--wp--preset--spacing--3xl);margin-bottom:var(--wp--preset--spacing--3xl);padding-top:var(--wp--preset--spacing--3xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--3xl);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--md)">Ready to Get Started?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
<p class="has-text-align-center has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">Join thousands of users who have already transformed their websites with our powerful and easy-to-use theme.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"accent","textColor":"background","style":{"border":{"radius":"var:custom|border-radius|button"},"spacing":{"padding":{"left":"var:preset|spacing|xl","right":"var:preset|spacing|xl","top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color wp-element-button" href="#" style="border-radius:var(--wp--custom--border-radius--button);padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--xl)">Start Today</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];