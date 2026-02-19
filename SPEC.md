# W02: starter-theme — WordPress Block Theme Starter

**Catalog ID:** W02 | **Size:** M | **Language:** PHP / WordPress
**Repo name:** `starter-theme`
**One-liner:** A clean, accessible WordPress block theme with full FSE support, theme.json design tokens, custom block patterns, responsive CSS custom properties, and WCAG 2.1 AA compliance.

---

## Why This Stands Out

- **Full Site Editing (FSE)** — block theme with `theme.json`, template parts, and block patterns — the modern WordPress approach
- **No CSS framework** — responsive design built entirely on CSS custom properties and modern layout (grid/flexbox)
- **WCAG 2.1 AA accessible** — skip links, focus indicators, ARIA landmarks, keyboard navigation, color contrast
- **Customizer + theme.json synergy** — brand colors, typography, and layout configurable from both the Customizer and the editor
- **Performance-first** — no jQuery, lazy-loaded images, minimal CSS/JS, no render-blocking resources
- **Style variations** — multiple color/typography presets switchable in the editor
- **WordPress coding standards** — PHPCS clean, proper escaping, i18n ready, no deprecated APIs
- **Developer-friendly** — clear file structure, documented hooks/filters, easy to extend

---

## Architecture

```
starter-theme/
├── style.css                        # Theme header + base custom properties
├── functions.php                    # Theme setup, enqueues, customizer, hooks
├── theme.json                       # Global settings: colors, typography, spacing, layout
├── templates/
│   ├── index.html                   # Main template (block markup)
│   ├── single.html                  # Single post
│   ├── page.html                    # Single page
│   ├── archive.html                 # Archive/category/tag
│   ├── search.html                  # Search results
│   ├── 404.html                     # Not found
│   └── home.html                    # Blog home (posts page)
├── parts/
│   ├── header.html                  # Site header with navigation
│   ├── footer.html                  # Site footer with widget areas
│   ├── sidebar.html                 # Optional sidebar
│   └── post-meta.html               # Post metadata (date, author, categories)
├── patterns/
│   ├── hero.php                     # Hero section with heading, text, CTA
│   ├── featured-posts.php           # 3-column featured posts grid
│   ├── call-to-action.php           # CTA banner with background
│   ├── testimonials.php             # Testimonials carousel/grid
│   ├── faq-accordion.php            # FAQ with details/summary
│   └── team-grid.php                # Team member cards
├── assets/
│   ├── css/
│   │   ├── global.css               # Base styles, reset, custom properties
│   │   ├── blocks.css               # Block-specific style overrides
│   │   ├── navigation.css           # Nav menu styles + mobile hamburger
│   │   ├── accessibility.css        # Focus styles, skip links, screen reader
│   │   └── editor.css               # Editor-specific styles
│   └── js/
│       ├── navigation.js            # Mobile menu toggle, keyboard nav
│       └── lazy-load.js             # Intersection Observer lazy loading
├── inc/
│   ├── class-theme-setup.php        # Theme supports, menus, image sizes
│   ├── class-customizer.php         # Customizer sections, settings, controls
│   ├── class-enqueue.php            # Asset enqueuing with versioning
│   ├── class-block-patterns.php     # Pattern registration
│   ├── class-block-styles.php       # Custom block style variations
│   └── class-performance.php        # Lazy loading, prefetch, cleanup
├── styles/
│   ├── ocean.json                   # Style variation: ocean palette
│   ├── forest.json                  # Style variation: forest palette
│   └── sunset.json                  # Style variation: warm palette
├── tests/
│   ├── bootstrap.php
│   ├── test-theme-setup.php         # Theme supports, menus registered
│   ├── test-customizer.php          # Customizer settings, sanitization
│   └── test-block-patterns.php      # Patterns registered, valid markup
├── screenshot.png                   # Theme screenshot (1200×900)
├── readme.txt                       # WordPress.org theme readme
├── phpcs.xml                        # WordPress coding standards config
├── Makefile                         # lint, test, zip, clean
├── .gitignore
├── LICENSE
└── README.md
```

---

## theme.json Configuration

### Design Tokens

| Category | Tokens |
|----------|--------|
| Colors | primary, secondary, accent, text, background, surface, muted, border (light + dark) |
| Typography | heading (system serif), body (system sans), mono (monospace) — 5 size presets |
| Spacing | scale of 8: xs (4px), sm (8px), md (16px), lg (24px), xl (32px), 2xl (48px), 3xl (64px) |
| Layout | contentSize: 720px, wideSize: 1200px |
| Borders | default radius, card radius, button radius |

### Block Settings

| Block | Custom Settings |
|-------|----------------|
| `core/button` | Custom border-radius, hover transitions |
| `core/navigation` | Mobile breakpoint, hamburger style |
| `core/post-template` | Grid gap, column count |
| `core/query` | Pagination style |
| `core/image` | Aspect ratio presets |
| `core/group` | Background color + padding presets |

---

## Customizer Sections

| Section | Controls |
|---------|----------|
| Brand Identity | Primary color, secondary color, accent color |
| Typography | Heading font family, body font family, base font size |
| Header | Logo max-width, sticky header toggle, search toggle |
| Footer | Column count (1–4), copyright text, social links |
| Layout | Sidebar position (left/right/none), content width |
| Performance | Lazy loading toggle, prefetch toggle |

---

## Block Patterns

| Pattern | Description |
|---------|-------------|
| Hero | Full-width heading, subtext, CTA button, optional background image |
| Featured Posts | 3-column grid of latest posts with thumbnails |
| Call to Action | Colored banner with heading, text, and button |
| Testimonials | 3-column grid of quote cards with avatar and attribution |
| FAQ Accordion | `<details>`/`<summary>` pairs — no JavaScript |
| Team Grid | Responsive grid of member cards with photo, name, role |

---

## Tech Stack

| Component | Choice |
|-----------|--------|
| Platform | WordPress 6.5+ |
| Language | PHP 8.3 |
| Theme type | Block theme (FSE) |
| Config | theme.json v3 |
| CSS | Custom properties, Grid, Flexbox (no framework) |
| JS | Vanilla ES modules (no jQuery) |
| Testing | PHPUnit with WP test suite |
| Linting | PHPCS with WordPress-Theme standards |
| Accessibility | WCAG 2.1 AA |
| Build | None (no transpilation — vanilla CSS/JS) |

---

## Phased Build Plan

### Phase 1: Theme Foundation

**1.1 — Theme scaffold**
- Create directory structure, `style.css` with theme header, `functions.php`
- `theme.json` with color palette, typography, spacing, layout settings
- Register theme supports: `wp-block-styles`, `editor-styles`, `responsive-embeds`, `custom-logo`, `post-thumbnails`
- Makefile targets: lint, test, zip, clean
- `.gitignore`, `phpcs.xml`, `LICENSE`

**1.2 — Base CSS with custom properties**
- CSS reset (modern minimal reset, not normalize.css)
- Custom properties from theme.json: `--wp--preset--color--primary`, etc.
- Responsive typography using `clamp()`
- Base element styles: headings, paragraphs, links, lists, code blocks
- Container widths matching theme.json `contentSize` and `wideSize`

**1.3 — Accessibility foundation**
- Skip-to-content link
- Focus indicator styles (visible, high-contrast)
- Screen reader utility classes (`.sr-only`)
- Reduced motion media query — disable transitions when preferred
- Color contrast verification for all palette combinations

### Phase 2: Templates & Template Parts

**2.1 — Template parts**
- `parts/header.html` — site title/logo, navigation placeholder, search toggle
- `parts/footer.html` — widget areas (columns), copyright, social links
- `parts/sidebar.html` — widget area for optional sidebar
- `parts/post-meta.html` — date, author, categories, tags

**2.2 — Core templates**
- `templates/index.html` — query loop with post grid
- `templates/single.html` — header → post content → post meta → comments → footer
- `templates/page.html` — header → page content → footer
- `templates/archive.html` — header → archive title → query loop → pagination → footer
- `templates/search.html` — header → search form → results loop → footer
- `templates/404.html` — header → friendly message + search form → footer
- `templates/home.html` — header → hero pattern → featured posts → latest posts → footer

### Phase 3: Navigation & Interactivity

**3.1 — Navigation menu**
- Register primary and footer menu locations
- `core/navigation` block in header template part
- Mobile hamburger menu with CSS + minimal JS
- Keyboard navigation: Tab/Shift+Tab through items, Escape to close submenus
- ARIA attributes: `aria-expanded`, `aria-haspopup`, `role="navigation"`
- Dropdown submenus with hover and focus triggers

**3.2 — JavaScript modules**
- `navigation.js` — mobile toggle, keyboard trapping in open menu, escape key handling
- `lazy-load.js` — Intersection Observer for images below the fold
- No jQuery dependency — vanilla ES modules
- Conditional loading: only enqueue JS when needed

### Phase 4: Block Patterns & Style Variations

**4.1 — Block patterns**
- Register pattern category `starter-theme`
- Hero: cover block with heading, paragraph, buttons — wide alignment
- Featured Posts: query block in 3-column grid with post template
- Call to Action: group block with background color, centered content
- Testimonials: columns block with quote blocks, avatar images
- FAQ Accordion: custom HTML block with `<details>`/`<summary>` (pure CSS)
- Team Grid: columns block with image, heading, paragraph per member
- All patterns use theme.json design tokens — no hardcoded colors

**4.2 — Custom block styles**
- Button: `outline`, `rounded`, `shadow` variants
- Image: `rounded`, `shadow`, `frame` variants
- Group: `card` (with shadow + border-radius), `highlight` (accent background)
- Quote: `large` (oversized quotation mark), `bordered` (left accent border)
- Register via `register_block_style()` in `class-block-styles.php`

**4.3 — Style variations**
- `styles/ocean.json` — blue palette, serif headings, cool tones
- `styles/forest.json` — green palette, natural tones, rounded elements
- `styles/sunset.json` — warm orange/coral palette, bold typography
- Each overrides `settings.color.palette` and `settings.typography.fontFamilies`
- Switchable from Appearance → Editor → Styles → Browse styles

### Phase 5: Customizer & Performance

**5.1 — Customizer integration**
- Brand colors section: primary, secondary, accent pickers
- Typography section: heading/body font selects, base size slider
- Header section: sticky toggle, search toggle, logo width
- Footer section: copyright text, column count, social URLs
- Layout section: sidebar position, content width
- All settings sanitized (`sanitize_hex_color`, `absint`, `esc_url`, etc.)
- Live preview with `postMessage` transport where possible

**5.2 — Performance optimizations**
- Remove unused WordPress defaults: emoji script, oEmbed extras, wp-embed
- Add `loading="lazy"` to all images via `wp_get_attachment_image_attributes`
- Inline critical CSS (above-the-fold custom properties)
- `<link rel="preconnect">` for Google Fonts (if used)
- Defer non-critical JS
- No render-blocking resources in `<head>`
- Measure: < 50KB total CSS, < 10KB JS

### Phase 6: Tests, Docs & Polish

**6.1 — PHPUnit tests**
- Theme setup: all supports registered, menus registered, image sizes added
- Customizer: settings registered, sanitization callbacks work, defaults correct
- Block patterns: all patterns registered, pattern content is valid block markup
- Performance: emoji script removed, lazy loading active

**6.2 — Accessibility audit**
- Skip link present and functional
- All interactive elements keyboard-accessible
- Color contrast passes AA for all palette combinations
- Focus indicators visible on all interactive elements
- Landmark roles: `<header>`, `<nav>`, `<main>`, `<footer>`
- ARIA attributes on navigation and interactive patterns

**6.3 — README.md**
- Theme screenshot
- Features overview
- Installation: clone → activate → customize
- Customizer options reference
- Block patterns gallery (descriptions)
- Style variations gallery (descriptions)
- Performance notes
- Accessibility statement
- Development: lint, test, contribute
- Hook/filter reference for developers

**6.4 — WordPress.org readme.txt**
- Standard format: description, installation, FAQ, changelog, credits
- Tags: `block-theme`, `full-site-editing`, `custom-colors`, `accessibility-ready`
- Requires: WordPress 6.5+, PHP 8.3+

**6.5 — Final polish**
- `screenshot.png` at 1200×900 (placeholder or generated)
- PHPCS clean with zero warnings
- All text wrapped in `__()` or `esc_html__()` for i18n
- No hardcoded strings, URLs, or paths
- Theme Check plugin compatibility (if running locally)

---

## Commit Plan

1. `chore: scaffold theme with style.css, functions.php, and config`
2. `feat: add theme.json with design tokens and block settings`
3. `feat: add base CSS with custom properties and responsive typography`
4. `feat: add accessibility foundation (skip link, focus, sr-only)`
5. `feat: add template parts (header, footer, sidebar, post-meta)`
6. `feat: add core templates (index, single, page, archive, search, 404)`
7. `feat: add navigation with mobile menu and keyboard support`
8. `feat: add block patterns (hero, CTA, testimonials, FAQ, team)`
9. `feat: add custom block styles (button, image, group, quote)`
10. `feat: add style variations (ocean, forest, sunset)`
11. `feat: add Customizer sections with live preview`
12. `feat: add performance optimizations (lazy load, cleanup, defer)`
13. `test: add PHPUnit tests for setup, customizer, and patterns`
14. `docs: add README with features, customization, and hook reference`
15. `chore: PHPCS cleanup, i18n audit, and final polish`
