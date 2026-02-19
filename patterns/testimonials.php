<?php
/**
 * Testimonials pattern for Starter Theme
 *
 * @package starter-theme
 */

return [
	'title'       => __( 'Testimonials Grid', 'starter-theme' ),
	'description' => __( 'A 3-column grid of testimonials with quotes, author names and avatars.', 'starter-theme' ),
	'categories'  => [ 'starter-theme', 'testimonials', 'text' ],
	'keywords'    => [ 'testimonials', 'reviews', 'quotes', 'customers', 'social-proof' ],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--3xl);padding-bottom:var(--wp--preset--spacing--3xl)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">What Our Customers Say</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:quote {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"fontSize":"medium"} -->
<blockquote class="wp-block-quote has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph -->
<p>"This theme has completely transformed our website. The design is beautiful, the performance is excellent, and our users love the accessibility features."</p>
<!-- /wp:paragraph --></blockquote>
<!-- /wp:quote -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":0,"width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image size-full is-resized" style="border-radius:50%"><img src="data:image/svg+xml,%3Csvg width='48' height='48' viewBox='0 0 48 48' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='24' cy='24' r='24' fill='%23E5E7EB'/%3E%3Cpath d='M24 12C18.48 12 14 16.48 14 22C14 27.52 18.48 32 24 32C29.52 32 34 27.52 34 22C34 16.48 29.52 12 24 12ZM24 29C20.13 29 17 25.87 17 22C17 18.13 20.13 15 24 15C27.87 15 31 18.13 31 22C31 25.87 27.87 29 24 29Z' fill='%239CA3AF'/%3E%3C/svg%3E" alt="" width="48" height="48"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="margin-bottom:0"><strong>Sarah Johnson</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-text-color has-small-font-size" style="margin-bottom:0">CEO, TechStart Inc</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:quote {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"fontSize":"medium"} -->
<blockquote class="wp-block-quote has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph -->
<p>"Outstanding support and incredible attention to detail. The theme works flawlessly and our site speed has improved dramatically."</p>
<!-- /wp:paragraph --></blockquote>
<!-- /wp:quote -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":0,"width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image size-full is-resized" style="border-radius:50%"><img src="data:image/svg+xml,%3Csvg width='48' height='48' viewBox='0 0 48 48' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='24' cy='24' r='24' fill='%23E5E7EB'/%3E%3Cpath d='M24 12C18.48 12 14 16.48 14 22C14 27.52 18.48 32 24 32C29.52 32 34 27.52 34 22C34 16.48 29.52 12 24 12ZM24 29C20.13 29 17 25.87 17 22C17 18.13 20.13 15 24 15C27.87 15 31 18.13 31 22C31 25.87 27.87 29 24 29Z' fill='%239CA3AF'/%3E%3C/svg%3E" alt="" width="48" height="48"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="margin-bottom:0"><strong>Michael Chen</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-text-color has-small-font-size" style="margin-bottom:0">Founder, Design Studio</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:quote {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"fontSize":"medium"} -->
<blockquote class="wp-block-quote has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--lg)"><!-- wp:paragraph -->
<p>"Easy to customize, fantastic documentation, and the accessibility features make it perfect for our diverse audience. Highly recommend!"</p>
<!-- /wp:paragraph --></blockquote>
<!-- /wp:quote -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":0,"width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image size-full is-resized" style="border-radius:50%"><img src="data:image/svg+xml,%3Csvg width='48' height='48' viewBox='0 0 48 48' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='24' cy='24' r='24' fill='%23E5E7EB'/%3E%3Cpath d='M24 12C18.48 12 14 16.48 14 22C14 27.52 18.48 32 24 32C29.52 32 34 27.52 34 22C34 16.48 29.52 12 24 12ZM24 29C20.13 29 17 25.87 17 22C17 18.13 20.13 15 24 15C27.87 15 31 18.13 31 22C31 25.87 27.87 29 24 29Z' fill='%239CA3AF'/%3E%3C/svg%3E" alt="" width="48" height="48"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="margin-bottom:0"><strong>Emma Rodriguez</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-text-color has-small-font-size" style="margin-bottom:0">Marketing Director, GrowthCo</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];