# Technical Reference & Shortcodes

## Shortcode Library
Enhance your blog and case studies with these premium components:

### ROI Callout
Display institutional impact metrics.
`[roi_callout value="+140%" label="Leadership Efficiency"]`

### Executive Quote
Anchor authority with client testimonials.
`[exec_quote author="John Doe, CEO"]The framework provided by this system revolutionized our operations...[/exec_quote]`

### Premium CTA
High-impact buttons that match your brand identity.
`[cta_button text="Book Your Diagnostic" url="/#cta"]`

## Tracking Events (GTM)
The theme automatically pushes the following events to your DataLayer:
- `Lead_Step1`: Fired on email submission.
- `Lead_Qualified`: Fired when a prospect meets your engagement fee criteria.
- `CTA_Click_Booking`: Fired on intent-to-book.
- `Exit_Intent_Triggered`: Fired when the recovery overlay appears.

## CSS Customization
The theme utilizes CSS variables for easy styling:
- `--primary-color`: Corporate Navy (#0B1D33)
- `--accent-color`: Executive Gold (Customizable)
- `--font-heading`: Playfair Display
- `--font-body`: Inter

## Mobile & SEO Optimization
The theme is engineered for elite performance and search visibility:

### 1. Mobile-First Architecture
- **Fluid Grids:** CSS Grid and Flexbox automatically adjust for Executive devices (Tablets/Phones).
- **Interactive Navigation:** Hamburger menu implemented via `aria-expanded` and lightweight JS.
- **Fluid Typography:** Uses `clamp()` to scale headlines without breaking layout.

### 2. SEO Best Practices
- **Automated Metadata:** Generates dynamic meta descriptions from page excerpts.
- **Schema.org Integration:** Automatically injects `ProfessionalService`, `Person`, and `BreadcrumbList` JSON-LD.
- **Semantic HTML:** Core templates utilize `<header>`, `<footer>`, `<article>`, and `<section>` correctly.
- **Lazy Loading:** Critical images are optimized for Core Web Vitals.
