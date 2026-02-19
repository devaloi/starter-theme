<?php
/**
 * FAQ Accordion pattern for Starter Theme
 *
 * @package starter-theme
 */

return [
	'title'       => __( 'FAQ Accordion', 'starter-theme' ),
	'description' => __( 'Frequently asked questions in an accordion layout using details/summary elements.', 'starter-theme' ),
	'categories'  => [ 'starter-theme', 'text', 'faq' ],
	'keywords'    => [ 'faq', 'accordion', 'questions', 'answers', 'help' ],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--3xl);padding-bottom:var(--wp--preset--spacing--3xl)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">Frequently Asked Questions</h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:html -->
<details class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);margin-bottom:var(--wp--preset--spacing--md);padding:var(--wp--preset--spacing--lg);">
    <summary style="cursor:pointer;font-weight:600;font-size:var(--wp--preset--font-size--large);padding:var(--wp--preset--spacing--sm) 0;outline:none;list-style:none;">
        <span style="display:flex;justify-content:space-between;align-items:center;">
            What makes this theme different from others?
            <span class="accordion-icon" style="font-size:1.5em;transition:transform 0.2s ease;">+</span>
        </span>
    </summary>
    <div style="padding-top:var(--wp--preset--spacing--md);color:var(--wp--preset--color--text);">
        <p>Our theme is built with accessibility-first design, modern web standards, and performance optimization. It features comprehensive WCAG 2.1 AA compliance, responsive CSS custom properties, and clean semantic markup that works for everyone.</p>
    </div>
</details>
<!-- /wp:html -->

<!-- wp:html -->
<details class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);margin-bottom:var(--wp--preset--spacing--md);padding:var(--wp--preset--spacing--lg);">
    <summary style="cursor:pointer;font-weight:600;font-size:var(--wp--preset--font-size--large);padding:var(--wp--preset--spacing--sm) 0;outline:none;list-style:none;">
        <span style="display:flex;justify-content:space-between;align-items:center;">
            Is the theme suitable for beginners?
            <span class="accordion-icon" style="font-size:1.5em;transition:transform 0.2s ease;">+</span>
        </span>
    </summary>
    <div style="padding-top:var(--wp--preset--spacing--md);color:var(--wp--preset--color--text);">
        <p>Absolutely! The theme is designed to be user-friendly with comprehensive documentation, pre-built patterns, and an intuitive customizer. You can create beautiful websites without coding knowledge, while developers have full control for advanced customization.</p>
    </div>
</details>
<!-- /wp:html -->

<!-- wp:html -->
<details class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);margin-bottom:var(--wp--preset--spacing--md);padding:var(--wp--preset--spacing--lg);">
    <summary style="cursor:pointer;font-weight:600;font-size:var(--wp--preset--font-size--large);padding:var(--wp--preset--spacing--sm) 0;outline:none;list-style:none;">
        <span style="display:flex;justify-content:space-between;align-items:center;">
            Does it work with page builders?
            <span class="accordion-icon" style="font-size:1.5em;transition:transform 0.2s ease;">+</span>
        </span>
    </summary>
    <div style="padding-top:var(--wp--preset--spacing--md);color:var(--wp--preset--color--text);">
        <p>The theme is built for WordPress\'s native Full Site Editing (FSE) and block editor, providing the best performance and compatibility. While it may work with page builders, we recommend using the built-in block patterns and customizer for optimal results.</p>
    </div>
</details>
<!-- /wp:html -->

<!-- wp:html -->
<details class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);margin-bottom:var(--wp--preset--spacing--md);padding:var(--wp--preset--spacing--lg);">
    <summary style="cursor:pointer;font-weight:600;font-size:var(--wp--preset--font-size--large);padding:var(--wp--preset--spacing--sm) 0;outline:none;list-style:none;">
        <span style="display:flex;justify-content:space-between;align-items:center;">
            What support do you provide?
            <span class="accordion-icon" style="font-size:1.5em;transition:transform 0.2s ease;">+</span>
        </span>
    </summary>
    <div style="padding-top:var(--wp--preset--spacing--md);color:var(--wp--preset--color--text);">
        <p>We provide comprehensive documentation, video tutorials, and community support through our forums. Premium support is available for customization questions, troubleshooting, and advanced implementation guidance.</p>
    </div>
</details>
<!-- /wp:html -->

<!-- wp:html -->
<details class="wp-block-group has-surface-background-color has-background" style="border-radius:var(--wp--custom--border-radius--card);margin-bottom:var(--wp--preset--spacing--md);padding:var(--wp--preset--spacing--lg);">
    <summary style="cursor:pointer;font-weight:600;font-size:var(--wp--preset--font-size--large);padding:var(--wp--preset--spacing--sm) 0;outline:none;list-style:none;">
        <span style="display:flex;justify-content:space-between;align-items:center;">
            Can I customize the colors and fonts?
            <span class="accordion-icon" style="font-size:1.5em;transition:transform 0.2s ease;">+</span>
        </span>
    </summary>
    <div style="padding-top:var(--wp--preset--spacing--md);color:var(--wp--preset--color--text);">
        <p>Yes! The theme includes a powerful customizer with color palettes, typography options, and style variations. You can also create custom CSS for advanced styling. All changes are made through the WordPress interface—no code editing required.</p>
    </div>
</details>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];