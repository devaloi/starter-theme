<?php
/**
 * Team Grid pattern for Starter Theme
 *
 * @package starter-theme
 */

return [
	'title'       => __( 'Team Grid', 'starter-theme' ),
	'description' => __( 'A responsive grid showcasing team members with photos, names, roles and social links.', 'starter-theme' ),
	'categories'  => [ 'starter-theme', 'about', 'people' ],
	'keywords'    => [ 'team', 'staff', 'people', 'about', 'members' ],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--3xl);padding-bottom:var(--wp--preset--spacing--3xl)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--md)">Meet Our Team</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"muted"} -->
<p class="has-text-align-center has-muted-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">The talented people behind our success</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:image {"id":0,"width":"120px","height":"120px","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized" style="border-radius:50%"><img src="data:image/svg+xml,%3Csvg width='120' height='120' viewBox='0 0 120 120' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='60' cy='60' r='60' fill='%23E5E7EB'/%3E%3Cpath d='M60 30C48.96 30 40 38.96 40 50C40 61.04 48.96 70 60 70C71.04 70 80 61.04 80 50C80 38.96 71.04 30 60 30ZM60 63C53.38 63 48 57.62 48 51C48 44.38 53.38 39 60 39C66.62 39 72 44.38 72 51C72 57.62 66.62 63 60 63Z' fill='%239CA3AF'/%3E%3C/svg%3E" alt="" width="120" height="120"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size">Sarah Johnson</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"textColor":"primary","fontSize":"medium"} -->
<p class="has-text-align-center has-primary-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--sm)">CEO & Founder</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
<p class="has-text-align-center has-muted-text-color has-small-font-size">Leading innovation in web design with over 10 years of experience in digital transformation and user experience.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"muted","iconColorValue":"var(--wp--preset--color--muted)","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|sm"},"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color" style="margin-top:var(--wp--preset--spacing--md)"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"mail","label":"Email"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:image {"id":0,"width":"120px","height":"120px","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized" style="border-radius:50%"><img src="data:image/svg+xml,%3Csvg width='120' height='120' viewBox='0 0 120 120' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='60' cy='60' r='60' fill='%23E5E7EB'/%3E%3Cpath d='M60 30C48.96 30 40 38.96 40 50C40 61.04 48.96 70 60 70C71.04 70 80 61.04 80 50C80 38.96 71.04 30 60 30ZM60 63C53.38 63 48 57.62 48 51C48 44.38 53.38 39 60 39C66.62 39 72 44.38 72 51C72 57.62 66.62 63 60 63Z' fill='%239CA3AF'/%3E%3C/svg%3E" alt="" width="120" height="120"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size">Michael Chen</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"textColor":"primary","fontSize":"medium"} -->
<p class="has-text-align-center has-primary-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--sm)">Lead Developer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
<p class="has-text-align-center has-muted-text-color has-small-font-size">Full-stack developer passionate about creating accessible, performant websites. Specializes in modern web technologies and user-centered design.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"muted","iconColorValue":"var(--wp--preset--color--muted)","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|sm"},"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color" style="margin-top:var(--wp--preset--spacing--md)"><!-- wp:social-link {"url":"#","service":"github"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"mail","label":"Email"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"var:custom|border-radius|card"}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:image {"id":0,"width":"120px","height":"120px","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized" style="border-radius:50%"><img src="data:image/svg+xml,%3Csvg width='120' height='120' viewBox='0 0 120 120' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='60' cy='60' r='60' fill='%23E5E7EB'/%3E%3Cpath d='M60 30C48.96 30 40 38.96 40 50C40 61.04 48.96 70 60 70C71.04 70 80 61.04 80 50C80 38.96 71.04 30 60 30ZM60 63C53.38 63 48 57.62 48 51C48 44.38 53.38 39 60 39C66.62 39 72 44.38 72 51C72 57.62 66.62 63 60 63Z' fill='%239CA3AF'/%3E%3C/svg%3E" alt="" width="120" height="120"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)"><!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size">Emma Rodriguez</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"textColor":"primary","fontSize":"medium"} -->
<p class="has-text-align-center has-primary-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--sm)">UX Designer</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
<p class="has-text-align-center has-muted-text-color has-small-font-size">Creative designer focused on accessibility and inclusive design. Expert in user research, prototyping, and creating delightful digital experiences.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"muted","iconColorValue":"var(--wp--preset--color--muted)","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|sm"},"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color" style="margin-top:var(--wp--preset--spacing--md)"><!-- wp:social-link {"url":"#","service":"dribbble"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"mail","label":"Email"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];