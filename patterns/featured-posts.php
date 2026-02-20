<?php
/**
 * Featured Posts pattern for Starter Theme
 *
 * @package starter-theme
 */

return array(
	'title'       => __( 'Featured Posts', 'starter-theme' ),
	'description' => __( 'A 3-column grid of featured posts with thumbnails, excerpts and read more links.', 'starter-theme' ),
	'categories'  => array( 'starter-theme', 'posts', 'featured' ),
	'keywords'    => array( 'posts', 'blog', 'featured', 'grid', 'articles' ),
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--3xl);padding-bottom:var(--wp--preset--spacing--3xl)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">Featured Posts</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":0,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xl"}},"layout":{"type":"grid","columnCount":"3"}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"var:custom|border-radius|default"},"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|sm"}}}} /-->

<!-- wp:post-excerpt {"moreText":"Continue reading →","showMoreOnNewLine":false,"excerptLength":20,"fontSize":"medium","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-date {"fontSize":"small","textColor":"muted"} /-->

<!-- wp:post-comments-count {"fontSize":"small","textColor":"muted"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--2xl);padding-bottom:var(--wp--preset--spacing--2xl)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
<h3 class="wp-block-heading has-text-align-center has-x-large-font-size">No featured posts yet</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
<p class="has-text-align-center has-muted-text-color">Mark some posts as featured to see them here, or check out our latest posts below.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->',
);
