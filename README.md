# Hearts & Mind — Laravel Website

A complete Laravel 11 rebuild of heartsandmind.org with a refreshed design,
Stripe donations (one-time + monthly), and a simple admin panel.

## Features
- **All public pages**: Home (hero, programs, relief tiers, live events calendar,
  support & contact forms), About, Give Help (sponsorship), 5 program pages,
  Community, Chapters & PODs, Events, Volunteer, Privacy.
- **Stripe donations** at `/donate` — preset or custom amount, one-time or monthly
  (Stripe Checkout + webhook confirmation), records stored in the database.
- **Admin panel** at `/admin` — dashboard stats, event management (drives the
  public calendar), donation history, and all form submissions in one inbox.
- **No build step** — hand-written CSS, Google Fonts, vanilla JS. Perfect for
  shared hosting.

## Quick start (local)
```bash
composer install
cp .env.example .env && php artisan key:generate
# for local dev use sqlite:
#   DB_CONNECTION=sqlite  (and create database/database.sqlite)
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```
Site: http://localhost:8000 · Admin: http://localhost:8000/admin
(login = ADMIN_EMAIL / ADMIN_PASSWORD from .env)

## Deploying to Namecheap cPanel
See **DEPLOYMENT.md** for the full step-by-step guide.

## Where to edit content
| Content | File |
|---|---|
| Program page text | `app/Http/Controllers/PageController.php` (`programs()` array) |
| Page copy / sections | `resources/views/pages/*.blade.php` |
| Nav / footer / contact info | `resources/views/layouts/app.blade.php` |
| Colors & styling | `public/css/site.css` (CSS variables at the top) |
| Events | Admin panel → Events |
| Donation presets | `resources/views/pages/donate.blade.php` |
