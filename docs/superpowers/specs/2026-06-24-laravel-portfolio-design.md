# Laravel Web Developer Portfolio — Design Spec

**Date:** 2026-06-24
**Status:** Approved

## Goal

Convert an existing React + Vite + TypeScript portfolio frontend into a proper,
server-rendered **Laravel 11** web developer portfolio website that is **strongly
SEO-optimized**, with a database-backed admin panel for managing content.

## Decisions (locked)

- **Rendering:** Blade server-rendered (best SEO). Reproduce the existing design
  pixel-for-pixel with Tailwind CSS v4 + Alpine.js for light interactivity.
- **Identity/content:** Editable placeholders ("Alex Johnson"-style), changed later
  via the admin panel.
- **Content model:** Full DB-backed admin with Laravel auth and CRUD.
- **Contact form:** Store submissions in DB **and** send an email notification.
- **Database:** SQLite by default (zero-config on Windows), switchable to MySQL via `.env`.

## Stack

Laravel 11, PHP 8.3, Blade, Tailwind CSS v4 (Vite), Alpine.js, SQLite, Pest/PHPUnit.

## Design system

- Colors: primary green `#1a3c2a` (dark `#142e21`), accent gold `#f5a623`.
- Fonts: Inter (body), Dancing Script (`.font-script` signature).
- Reproduce sections: Navbar (floating pill), Hero, Marquee, Services, About,
  Tools, Projects, Blog, Testimonials, Contact, Footer.

## Routes

Public:
- `GET /` — landing page (all sections, reads from DB)
- `GET /projects` and `GET /projects/{slug}` — list + detail
- `GET /blog` and `GET /blog/{slug}` — list + full article
- `POST /contact` — validated submission (store + mail)
- `GET /sitemap.xml`, `GET /robots.txt`

Admin (auth, prefix `/admin`):
- `GET /admin/login`, `POST /admin/login`, `POST /admin/logout`
- `GET /admin` dashboard
- Resource CRUD: `projects`, `posts`, `testimonials`, `services`, `tools`
- `GET/PUT /admin/profile` (site settings/profile)
- `GET /admin/messages`, `GET /admin/messages/{id}`, `DELETE` — contact inbox

## Data model

- `users` — admin login (Laravel default).
- `site_settings` — single-row: name, title, location, bio, hero/about images,
  stats (projects/clients/years), email, phone, address, social links (json), CV path,
  SEO defaults (meta title/description, OG image).
- `services` — icon, title, description, sort order.
- `tools` — name, icon/color, sort order.
- `projects` — title, slug, description, body, tags (json), icon, color, link, github,
  image, featured, sort order.
- `posts` — title, slug, excerpt, body, cover image, published_at.
- `testimonials` — name, role, content, rating, avatar/initials, color, sort order.
- `contact_messages` — first_name, last_name, email, subject, message, read_at.

Seeders port the existing demo content so the site looks complete on first load.

## Contact form behavior

Server-side validation → persist `ContactMessage` → send `ContactMessage` mail/notification.
Default mailer is `log` (works with no credentials); real SMTP/Mailgun added via `.env`.

## SEO requirements

- Per-page `<title>`, meta description, canonical via Blade layout + `@section` slots.
- Open Graph + Twitter Card tags.
- JSON-LD: `Person` + `WebSite` (home), `Article` (posts), `BreadcrumbList`.
- Auto-generated `sitemap.xml` and `robots.txt`.
- Semantic HTML: one `<h1>` per page, `<main>`, `<article>`, descriptive `alt`,
  `loading="lazy"` images, clean slugged URLs, fast server-rendered first paint.

## Testing

Pest/PHPUnit feature tests:
- Public pages return 200 and render seeded content.
- Project/blog detail pages resolve by slug; 404 on unknown.
- Contact form validates, persists a row, and queues/sends mail.
- Admin routes redirect guests to login; authenticated admin can CRUD.
- `sitemap.xml` and `robots.txt` respond with correct content types.

## Removed

Old React/Vite/TS source (`src/`, `tsconfig.json`, `vite.config.ts`, old
`package.json`/`package-lock.json`, root `index.html`) replaced by the Laravel app.

## Out of scope (YAGNI)

Multi-author blog, comments, tag pages, pagination beyond simple lists, i18n,
newsletter, analytics dashboards.
