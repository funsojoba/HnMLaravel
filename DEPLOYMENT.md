# Deploying Hearts & Mind to Namecheap cPanel

This guide takes you from this project folder to a live site on Namecheap shared hosting.

## What you need
- Namecheap hosting with cPanel (Stellar or higher)
- PHP **8.2+** enabled (cPanel → *Select PHP Version*)
- A MySQL database (cPanel → *MySQL Databases*)
- A Stripe account (https://dashboard.stripe.com)
- Composer — available on your own computer **or** via cPanel's *Terminal*

---

## Step 1 — Install dependencies (vendor folder)

On your computer (recommended), inside this project folder:

```bash
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
```

If you don't have PHP/Composer locally, you can instead upload the project first
and run the same commands in **cPanel → Terminal** (Namecheap includes Composer on
most shared plans; if `composer` is missing, run
`curl -sS https://getcomposer.org/installer | php` then use `php composer.phar install`).

## Step 2 — Create the database in cPanel

1. cPanel → **MySQL Databases** → create a database (e.g. `youruser_hearts`).
2. Create a DB user with a strong password and **add the user to the database** with *All Privileges*.
3. Note the full names — cPanel prefixes them with your account name.

## Step 3 — Upload the project

Recommended layout (keeps app code out of the web root):

```
/home/YOURUSER/
├── heartsandmind/          ← the whole project EXCEPT public/
│   ├── app/  bootstrap/  config/  database/  resources/  routes/  storage/  vendor/
│   ├── artisan  composer.json  .env
└── public_html/            ← the CONTENTS of the project's public/ folder
    ├── index.php  .htaccess  css/  images/
```

1. Zip the project, upload via **cPanel → File Manager**, and extract into `/home/YOURUSER/heartsandmind`.
2. Move the **contents** of `public/` into `public_html/`.
3. Edit `public_html/index.php` and change the two paths to point at the app folder:

```php
require __DIR__.'/../heartsandmind/vendor/autoload.php';
(require_once __DIR__.'/../heartsandmind/bootstrap/app.php')
    ->handleRequest(Request::capture());
```

(There's also a maintenance-mode line near the top — update it the same way:
`__DIR__.'/../heartsandmind/storage/framework/maintenance.php'`.)

> Alternative: if your plan allows changing the document root (subdomains always do),
> point the document root directly at `heartsandmind/public` and skip the edits above.

## Step 4 — Configure .env

Edit `/home/YOURUSER/heartsandmind/.env`:

```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_DATABASE=youruser_hearts
DB_USERNAME=youruser_dbuser
DB_PASSWORD=the-password-you-created

ADMIN_EMAIL=info@heartsandmind.org
ADMIN_PASSWORD=pick-a-strong-password

STRIPE_KEY=pk_live_...        (or pk_test_ while testing)
STRIPE_SECRET=sk_live_...
STRIPE_WEBHOOK_SECRET=whsec_...   (Step 6)
```

## Step 5 — Migrate & seed

In cPanel → **Terminal**:

```bash
cd ~/heartsandmind
php artisan migrate --seed        # creates tables + admin user + sample event
php artisan config:cache          # AFTER seeding (seeder reads .env directly)
php artisan route:cache
php artisan view:cache
```

Also make storage writable: `chmod -R 775 storage bootstrap/cache`

## Step 6 — Stripe webhook

1. Stripe Dashboard → **Developers → Webhooks → Add endpoint**.
2. Endpoint URL: `https://yourdomain.com/stripe/webhook`
3. Events to send: `checkout.session.completed` and `checkout.session.expired`.
4. Copy the **Signing secret** (`whsec_...`) into `.env` as `STRIPE_WEBHOOK_SECRET`,
   then re-run `php artisan config:cache`.

**Test it:** use Stripe test keys first. Card `4242 4242 4242 4242`, any future
expiry, any CVC. Check the donation appears as **Paid** in `/admin/donations`,
then switch to live keys.

## Step 7 — Your images

Copy your existing logo and hero photo into `public_html/images/`:

- `images/logo.png` — your logo (download it from your current site or your files)
- `images/hero.jpg` — the homepage hero photo (currently at
  `https://heartsandmind.org/assets/foster-family-DxhJ1osJ.jpg` on your live site —
  save it and upload here)

The site degrades gracefully (purple gradient) until the images are in place.

## Step 8 — Admin panel

- URL: `https://yourdomain.com/admin`
- Login with `ADMIN_EMAIL` / `ADMIN_PASSWORD` from `.env`.
- Manage events (they drive the homepage calendar), review donations,
  and read all form submissions.

## Troubleshooting

| Symptom | Fix |
|---|---|
| 500 error | Check `storage/logs/laravel.log`; usually permissions (`chmod -R 775 storage bootstrap/cache`) or wrong paths in `public_html/index.php`. |
| "No application encryption key" | Run `php artisan key:generate`, then `php artisan config:cache`. |
| DB connection refused | Double-check the prefixed DB name/user and that the user is added to the DB. |
| Donations stay "Pending" | Webhook not configured — Step 6. (The success page also confirms as a fallback when the donor returns.) |
| Changed .env but nothing happens | Run `php artisan config:cache` again. |
