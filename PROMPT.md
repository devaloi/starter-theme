# Build starter-theme — WordPress Block Theme Starter

You are building a **portfolio project** for a Senior AI Engineer's public GitHub. It must be impressive, clean, and production-grade. Read these docs before writing any code:

1. **`W02-wordpress-starter-theme.md`** — Complete project spec: architecture, theme.json config, block patterns, template structure, commit plan. This is your primary blueprint. Follow it phase by phase.
2. **`github-portfolio.md`** — Portfolio goals and Definition of Done (Level 1 + Level 2). Understand the quality bar.
3. **`github-portfolio-checklist.md`** — Pre-publish checklist. Every item must pass before you're done.

---

## Instructions

### Read first, build second
Read all three docs completely before writing a single line of code. Understand Full Site Editing (FSE), theme.json v3, the block template hierarchy, and how modern WordPress themes work. This is a block theme — not a classic theme.

### Follow the phases in order
The project spec has 6 phases. Do them in order:
1. **Theme Foundation** — scaffold, theme.json design tokens, base CSS custom properties, accessibility foundation
2. **Templates & Template Parts** — header, footer, sidebar parts; all core templates (index, single, page, archive, search, 404)
3. **Navigation & Interactivity** — accessible mobile nav with keyboard support, vanilla JS modules, lazy loading
4. **Block Patterns & Style Variations** — 6 reusable patterns, custom block styles, 3 color/typography variations
5. **Customizer & Performance** — Customizer sections for brand, typography, layout; performance cleanup and optimization
6. **Tests, Docs & Polish** — PHPUnit tests, accessibility audit, README, WordPress readme.txt, PHPCS cleanup

### Commit frequently
Follow the commit plan in the spec. Use **conventional commits** (`feat:`, `test:`, `refactor:`, `docs:`, `ci:`, `chore:`). Each commit should be a logical unit.

### Quality non-negotiables
- **Block theme (FSE), not classic.** Templates are HTML files with block markup. No `get_header()` / `get_footer()` PHP includes. Use `theme.json` for all design tokens.
- **theme.json v3.** All colors, typography, spacing, and layout defined in `theme.json`. Blocks inherit these tokens. No hardcoded hex values in CSS.
- **CSS custom properties only.** No CSS framework. No Tailwind. No Bootstrap. Responsive design with `clamp()`, Grid, and Flexbox.
- **No jQuery.** Vanilla JavaScript ES modules only. Conditional loading — don't enqueue JS on pages that don't need it.
- **WCAG 2.1 AA.** Skip links, visible focus indicators, keyboard navigation for all interactive elements, ARIA landmarks, color contrast ratios passing AA.
- **WordPress coding standards.** PHPCS with `WordPress-Theme` ruleset must pass cleanly. All output escaped. All strings translatable.
- **Sanitized Customizer.** Every Customizer setting has a `sanitize_callback`. No raw user input rendered.
- **Block patterns use tokens.** Every pattern references theme.json colors and spacing — no hardcoded values. Patterns must work with all style variations.
- **Performance.** Under 50KB total CSS, under 10KB JS. No render-blocking resources. Lazy loading for below-fold images.

### What NOT to do
- Don't build a classic theme. This is a block theme — templates are `.html` files, not `.php` files.
- Don't use a CSS framework (Bootstrap, Tailwind, Foundation). Write vanilla CSS with custom properties.
- Don't use jQuery or any JS library. Vanilla ES modules only.
- Don't hardcode colors or spacing in CSS. Reference `var(--wp--preset--color--primary)` and `var(--wp--preset--spacing--md)` from theme.json.
- Don't skip the accessibility work. Focus styles, skip links, keyboard nav, and ARIA are non-negotiable.
- Don't leave `// TODO` or `// FIXME` comments anywhere.

---

## GitHub Username

The GitHub username is **devaloi**. For any GitHub URLs in the README, use `github.com/devaloi/starter-theme`. The theme `Text Domain` is `starter-theme`.

## Start

Read the three docs. Then begin Phase 1 from `W02-wordpress-starter-theme.md`.
