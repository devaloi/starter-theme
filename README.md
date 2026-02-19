# Starter Theme

A clean, accessible WordPress block theme with full FSE support, theme.json design tokens, custom block patterns, responsive CSS custom properties, and WCAG 2.1 AA compliance.

![Theme Screenshot](screenshot.png)

## Features

- **Full Site Editing (FSE)** — Modern block theme with `theme.json` configuration
- **Accessibility First** — WCAG 2.1 AA compliant with comprehensive keyboard navigation
- **Performance Optimized** — Lazy loading, asset optimization, minimal JavaScript
- **Responsive Design** — Mobile-first CSS with fluid typography and flexible layouts
- **Style Variations** — Ocean, Forest, and Sunset color/typography presets
- **Block Patterns** — Hero, CTA, testimonials, FAQ, team grid, and featured posts
- **Custom Block Styles** — Button, image, group, and quote variations
- **Customizer Integration** — Live preview for colors, typography, and layout
- **Developer Friendly** — Clean code, documented hooks, extensible architecture

## Requirements

- **WordPress:** 6.5 or higher
- **PHP:** 8.2 or higher
- **Browser Support:** Modern browsers (Chrome, Firefox, Safari, Edge)

## Installation

1. **Download the theme:**
   ```bash
   git clone https://github.com/devaloi/starter-theme.git
   ```

2. **Upload to WordPress:**
   - Upload the `starter-theme` folder to `/wp-content/themes/`
   - Or zip the folder and upload through WordPress admin

3. **Activate the theme:**
   - Go to **Appearance → Themes**
   - Click **Activate** on Starter Theme

4. **Customize your site:**
   - Visit **Appearance → Customize** for theme options
   - Use **Appearance → Editor** for full site editing

## Quick Start

### Setting Up Your Homepage

1. Create a new page and add the **Hero** pattern
2. Add the **Featured Posts** pattern to showcase your content
3. Include a **Call to Action** pattern to drive engagement
4. Set this page as your homepage in **Settings → Reading**

### Customizing Colors

1. Go to **Appearance → Customize → Brand Identity**
2. Choose your primary, secondary, and accent colors
3. Changes appear instantly in the preview
4. Or try one of the style variations in **Appearance → Editor → Styles**

### Adding Navigation

1. Go to **Appearance → Menus**
2. Create a new menu and assign it to "Primary Menu"
3. The responsive navigation includes mobile hamburger menu

## Customization Options

### Customizer Sections

| Section | Options | Description |
|---------|---------|-------------|
| **Brand Identity** | Primary, secondary, accent colors | Core brand colors used throughout the site |
| **Typography** | Heading font, body font, base size | Typography controls with live preview |
| **Header Options** | Sticky header, search toggle, logo width | Header layout and functionality |
| **Footer Options** | Column count, copyright text | Footer customization |
| **Layout Options** | Sidebar position, content width | Page layout controls |
| **Performance** | Lazy loading, link prefetching | Performance optimization toggles |

### Style Variations

Access these through **Appearance → Editor → Styles → Browse styles**:

- **Ocean** — Blue/cyan palette with Playfair Display + Inter fonts
- **Forest** — Green/natural palette with Merriweather + Source Sans
- **Sunset** — Warm orange/coral palette with Crimson Text + Open Sans

### Block Patterns

Insert these patterns through the block editor:

| Pattern | Use Case | Blocks Used |
|---------|----------|-------------|
| **Hero** | Homepage headers, landing pages | Cover, Heading, Paragraph, Buttons |
| **Call to Action** | Conversion sections | Group, Heading, Paragraph, Button |
| **Testimonials** | Social proof, reviews | Columns, Quote, Image, Group |
| **FAQ Accordion** | Help pages, product info | HTML (details/summary) |
| **Team Grid** | About pages, staff listings | Columns, Image, Heading, Social Links |
| **Featured Posts** | Blog highlights | Query, Post Template, Post blocks |

### Custom Block Styles

Available in the block editor's styles panel:

**Button Styles:**
- **Outline** — Transparent with border
- **Rounded** — Pill-shaped buttons
- **Shadow** — Elevated appearance

**Image Styles:**
- **Rounded** — Rounded corners
- **Shadow** — Drop shadow effect
- **Frame** — Border with padding

**Group Styles:**
- **Card** — Elevated container with shadow
- **Highlight** — Accent background color

**Quote Styles:**
- **Large** — Oversized with quotation mark
- **Bordered** — Left accent border with gradient

## Development

### Prerequisites

```bash
# Install development dependencies
make dev-setup

# Or manually:
composer install
npm install
```

### Available Commands

```bash
# Lint PHP files
make lint

# Run tests
make test

# Fix coding standards
make fix

# Build production zip
make zip

# Clean build artifacts
make clean
```

### File Structure

```
starter-theme/
├── style.css                 # Theme header + base styles
├── functions.php             # Theme initialization
├── theme.json                # FSE configuration + design tokens
├── templates/                # Block templates
├── parts/                    # Template parts
├── patterns/                 # Block patterns
├── assets/                   # CSS, JS, images
├── inc/                      # PHP classes
├── styles/                   # Style variations
├── tests/                    # PHPUnit tests
└── README.md                 # This file
```

### Hooks & Filters

#### Actions

```php
// Modify theme setup
add_action( 'after_setup_theme', 'your_custom_setup' );

// Customize asset enqueuing
add_action( 'wp_enqueue_scripts', 'your_custom_assets' );

// Add custom patterns
add_action( 'init', 'your_custom_patterns' );
```

#### Filters

```php
// Modify customizer settings
add_filter( 'starter_theme_customizer_settings', 'your_custom_settings' );

// Customize performance options
add_filter( 'starter_theme_lazy_loading', '__return_false' );

// Add custom block styles
add_filter( 'starter_theme_block_styles', 'your_custom_block_styles' );
```

### Creating Child Themes

```php
// child-theme/functions.php
<?php
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );

function child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}
```

## Accessibility Statement

This theme is designed to be accessible to users with disabilities and assistive technologies:

- **WCAG 2.1 AA Compliant** — Meets Web Content Accessibility Guidelines
- **Keyboard Navigation** — Full keyboard support for all interactive elements
- **Screen Reader Support** — Proper heading structure, landmarks, and ARIA labels
- **High Contrast Mode** — Enhanced styles for users who prefer high contrast
- **Reduced Motion** — Respects `prefers-reduced-motion` user preference
- **Color Contrast** — All text meets minimum 4.5:1 contrast ratio
- **Focus Management** — Visible focus indicators and logical tab order

## Performance

The theme is optimized for speed and performance:

- **Core Web Vitals** — Optimized for Google's performance metrics
- **Lazy Loading** — Images load only when needed using Intersection Observer
- **Minimal JavaScript** — Less than 10KB of JavaScript for core functionality
- **Efficient CSS** — Under 50KB total CSS with critical styles inlined
- **Asset Optimization** — Deferred loading, DNS prefetch, resource hints
- **Clean HTML** — Semantic markup with minimal DOM manipulation

## Browser Support

- **Modern Browsers** — Chrome 90+, Firefox 88+, Safari 14+, Edge 90+
- **Progressive Enhancement** — Core functionality works in older browsers
- **Mobile Optimized** — Responsive design tested on iOS and Android
- **Touch Friendly** — Appropriate touch targets and gestures

## Contributing

1. **Fork the repository**
2. **Create a feature branch:** `git checkout -b feature/amazing-feature`
3. **Follow coding standards:** Run `make lint` before committing
4. **Write tests:** Add tests for new functionality
5. **Commit changes:** `git commit -m 'Add amazing feature'`
6. **Push to branch:** `git push origin feature/amazing-feature`
7. **Open Pull Request**

### Coding Standards

- **PHP:** WordPress Coding Standards with PHP 8.2+ features
- **CSS:** BEM methodology with custom properties
- **JavaScript:** ES2020+ with no jQuery dependency
- **HTML:** Semantic markup with accessibility in mind

## Testing

```bash
# Run PHP unit tests
vendor/bin/phpunit

# Run coding standards check
vendor/bin/phpcs

# Test theme in WordPress
wp-env start
```

## Changelog

### Version 1.0.0
- Initial release with full FSE support
- Theme.json v3 configuration
- Accessibility-first design
- Performance optimizations
- Block patterns and custom styles
- Style variations
- Comprehensive test suite

## License

This theme is licensed under the [GPL-2.0-or-later](LICENSE) license.

## Support

- **Documentation:** [Theme Documentation](https://github.com/devaloi/starter-theme/wiki)
- **Issues:** [GitHub Issues](https://github.com/devaloi/starter-theme/issues)
- **Discussions:** [GitHub Discussions](https://github.com/devaloi/starter-theme/discussions)

## Credits

- **Author:** [devaloi](https://github.com/devaloi)
- **Contributors:** See [contributors list](https://github.com/devaloi/starter-theme/contributors)
- **Inspiration:** WordPress block theme best practices and accessibility guidelines

---

Made with ❤️ for the WordPress community