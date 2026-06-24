# Developer Portfolio (Laravel)

[![CI](https://github.com/Ovidhub/portfolio/actions/workflows/ci.yml/badge.svg)](https://github.com/Ovidhub/portfolio/actions/workflows/ci.yml)

A server-rendered, SEO-optimized web developer portfolio built with **Laravel 11**,
**Blade**, **Tailwind CSS v4** and **Alpine.js**, backed by a database with a full
admin panel for managing content.

## Features

- **Public site** (server-rendered for SEO): hero, services, about, tools, projects,
  blog, testimonials and a working contact form.
- **Dedicated pages** with crawlable, slugged URLs: `/projects`, `/projects/{slug}`,
  `/blog`, `/blog/{slug}`.
- **Admin panel** (`/admin`): authentication + CRUD for projects, blog posts,
  testimonials, services and tools; editable profile/SEO settings with image & CV
  uploads; and a contact-message inbox.
- **Contact form** stores submissions in the database **and** emails a notification.
- **SEO**: per-page title/description/canonical, Open Graph + Twitter cards, JSON-LD
  structured data (`Person`, `WebSite`, `Article`, `BreadcrumbList`), auto-generated
  `sitemap.xml` and `robots.txt`, semantic HTML and lazy-loaded images.

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+ & npm

## Setup

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

# SQLite (default). Create the database file:
#   Windows (PowerShell):  New-Item database/database.sqlite -ItemType File
#   macOS / Linux:         touch database/database.sqlite

php artisan migrate --seed
php artisan storage:link

# Build assets (or use `npm run dev` while developing)
npm run build

php artisan serve
```

Visit `http://localhost:8000`.

### Admin access

The seeder creates an admin account:

- **URL:** `/admin/login`
- **Email:** `admin@example.com`
- **Password:** `password`

> Change these immediately for any real deployment (update the seeder or the user
> record, and set a strong password).

## Configuration

- **Database:** SQLite by default. To use MySQL, set `DB_CONNECTION=mysql` and the
  related `DB_*` values in `.env`.
- **Email (SMTP):** The contact form always saves submissions to the database (visible
  under **Admin → Messages**) and additionally emails a notification. To send real
  email, set the SMTP credentials in `.env`:

  ```dotenv
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.gmail.com      # Mailgun: smtp.mailgun.org · Postmark: smtp.postmarkapp.com
  MAIL_PORT=587
  MAIL_SCHEME=tls
  MAIL_USERNAME=you@gmail.com
  MAIL_PASSWORD=your-app-password   # Gmail: create at https://myaccount.google.com/apppasswords
  MAIL_FROM_ADDRESS=you@gmail.com
  CONTACT_NOTIFICATION_EMAIL=you@gmail.com   # where submissions are sent
  ```

  After editing `.env`, run `php artisan config:clear`. Send a quick test with:

  ```bash
  php artisan tinker --execute="Mail::raw('SMTP works', fn(\$m) => \$m->to(config('mail.contact_notification'))->subject('Test'));"
  ```

  > Gmail requires 2-Step Verification plus a 16-character **App Password** (your normal
  > password won't work). Set `MAIL_MAILER=log` to disable real sending — notifications
  > then go to `storage/logs/laravel.log` and nothing breaks.
  >
  > If SMTP is misconfigured the visitor still sees a success message and the submission
  > is saved; the delivery error is logged rather than shown.
- **Content:** Everything (name, bio, stats, contact details, social links, SEO
  defaults, images, CV) is editable under **Admin → Profile & SEO**.

## Testing

```bash
php artisan test
```

## Tech

Laravel 11 · Blade · Tailwind CSS v4 · Alpine.js · SQLite · Pest/PHPUnit
