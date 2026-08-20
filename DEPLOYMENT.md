# Deploying Hearts & Mind to cPanel

This gets the project running on cPanel shared hosting **exactly as it runs
locally right now** — same code, same real database (your actual events,
users, and admin accounts), same images. Nothing gets reset or reseeded.

## What you need
- cPanel hosting with PHP **8.2+** (cPanel → *Select PHP Version*)
- Composer — on your own computer (recommended) or via cPanel's *Terminal*
- SSH/Terminal access in cPanel (for one symlink command in Step 5 — almost
  all cPanel plans include a Terminal app even without separate SSH login)
- Your Stripe account (https://dashboard.stripe.com)

---

## Step 1 — Install dependencies locally

Inside this project folder, on your own computer:

```bash
composer install --no-dev --optimize-autoloader
```

This fills in `vendor/`. Upload it along with everything else in Step 3 — no
need to run Composer on the server unless you'd rather do that instead.

## Step 2 — Decide: keep SQLite, or move to MySQL?

Your `database/database.sqlite` already has your real data — the admin
accounts, your 11 real events with their Cloudinary fliers and Eventbrite
links, etc. **The simplest and safest path is to keep using SQLite in
production too** — upload that exact file and nothing needs converting or
re-entering.

cPanel/shared hosts generally support SQLite (`pdo_sqlite`/`sqlite3` PHP
extensions) out of the box, but **check first**: cPanel → *Select PHP
Version* → extensions list → confirm `pdo_sqlite` and `sqlite3` are ticked.
If they're not available and you can't enable them, you'll need MySQL
instead — that's a bigger step (exporting/converting this data into MySQL)
and not covered here; ask if you need it.

Everything below assumes you're keeping SQLite.

## Step 3 — Upload the project

Recommended layout (keeps app code out of the public web root):

```
/home/YOURUSER/
├── heartsandmind/          ← the whole project EXCEPT public/
│   ├── app/  bootstrap/  config/  database/  resources/  routes/  storage/  vendor/
│   ├── artisan  composer.json  .env
└── public_html/            ← the CONTENTS of the project's public/ folder
    ├── index.php  .htaccess  css/  images/
```

1. Zip the project (include `vendor/`, `database/database.sqlite`, and
   `public/images/` — the whole thing is roughly 200MB+ mostly from images,
   so a zip upload via File Manager is much faster than uploading file-by-file).
2. Upload and extract into `/home/YOURUSER/heartsandmind`.
3. Move the **contents** of `heartsandmind/public/` into `public_html/`
   (index.php, .htaccess, css/, images/, favicon.ico, everything).
4. Edit `public_html/index.php` and point the two paths at the app folder:

```php
require __DIR__.'/../heartsandmind/vendor/autoload.php';
(require_once __DIR__.'/../heartsandmind/bootstrap/app.php')
    ->handleRequest(Request::capture());
```

(There's also a maintenance-mode check near the top of `index.php` — update
it the same way: `__DIR__.'/../heartsandmind/storage/framework/maintenance.php'`.)

> Alternative: if your plan lets you change a subdomain's document root,
> point it straight at `heartsandmind/public` and skip steps 3–4 entirely.

## Step 4 — Configure `.env`

Your local `.env` is already shaped for production (`APP_ENV=production`,
`APP_URL=https://heartsandmind.org`, a real `APP_KEY`) — upload it as-is,
then fix these before going live:

```
DB_CONNECTION=sqlite
# leave DB_DATABASE unset — Laravel defaults to database/database.sqlite,
# which is exactly the file you uploaded.

STRIPE_KEY=pk_live_...          # currently a placeholder — get the real
                                 # publishable key from the Stripe dashboard
STRIPE_SECRET=sk_live_...       # you already have a live key set locally —
                                 # double check it's the one you want live
STRIPE_WEBHOOK_SECRET=whsec_... # still a placeholder — see Step 6
```

⚠️ **Your local `.env` currently has a live Stripe secret key paired with a
placeholder *test* publishable key** — that mismatch won't break checkout
(the publishable key isn't actually used anywhere in this app's flow today),
but fix it before you rely on Stripe Elements/client-side code in the future.

## Step 5 — Make storage work (event fliers)

This is the one step that's easy to miss with the split `public/` /
`public_html/` layout above, and it's what serves your uploaded event
flier images.

In cPanel → **Terminal**:

```bash
mkdir -p ~/heartsandmind/storage/app/public
ln -s /home/YOURUSER/heartsandmind/storage/app/public /home/YOURUSER/public_html/storage
chmod -R 775 ~/heartsandmind/storage ~/heartsandmind/bootstrap/cache
```

Replace `YOURUSER` with your actual cPanel username. (Don't use
`php artisan storage:link` here — with this split layout it creates the
symlink inside `heartsandmind/public/`, which nothing actually serves,
instead of inside `public_html/`.)

Your **existing** event fliers (the Cloudinary ones already in your
database) don't depend on this — they're full external URLs and just work.
This step is only for fliers uploaded *from now on* via the admin panel.

## Step 6 — Clear cached config

```bash
cd ~/heartsandmind
php artisan config:clear
php artisan route:cache
php artisan view:cache
```

Don't run `php artisan migrate --seed` — your tables already exist with
real data in them, and re-seeding would overwrite the admin account matching
`ADMIN_EMAIL` with whatever's in `ADMIN_PASSWORD`. If a future update adds a
new migration, run `php artisan migrate` (no `--seed`) — it only applies
what's new.

## Step 7 — Stripe webhook

1. Stripe Dashboard → **Developers → Webhooks → Add endpoint**.
2. Endpoint URL: `https://heartsandmind.org/stripe/webhook`
3. Events to send: `checkout.session.completed` and `checkout.session.expired`.
4. Copy the **Signing secret** (`whsec_...`) into `.env` as
   `STRIPE_WEBHOOK_SECRET`, then `php artisan config:clear` again.

**Test with Stripe test keys first**: card `4242 4242 4242 4242`, any future
expiry, any CVC. Confirm the donation shows **Paid** in `/admin/donations`,
then switch `STRIPE_KEY`/`STRIPE_SECRET` to live keys.

## Step 8 — Verify

- Homepage loads, hero image slider and program cards show correctly.
- `/events` shows your real events with fliers and Register links.
- `/admin/login` — log in with one of your real existing admin accounts
  (not the seeder defaults — those were never applied to this database).
- Create a test event with a flier upload in `/admin/events` and confirm it
  displays on the site — this specifically checks Step 5 worked.

## Troubleshooting

| Symptom | Fix |
|---|---|
| 500 error | Check `storage/logs/laravel.log`; usually permissions (`chmod -R 775 storage bootstrap/cache`) or wrong paths in `public_html/index.php`. |
| "No application encryption key" | `.env` should already have `APP_KEY` from local — if missing, run `php artisan key:generate`. |
| DB connection / "unable to open database file" | Confirm `database/database.sqlite` was actually uploaded to `heartsandmind/database/` and that the `database` folder + file are writable (`chmod 775 database`, `chmod 664 database/database.sqlite`). |
| New event fliers 404 | Step 5's symlink — confirm `public_html/storage` exists and points at `heartsandmind/storage/app/public`. |
| Donations stay "Pending" | Webhook not configured — Step 7. (The success page also confirms as a fallback when the donor returns.) |
| Changed `.env` but nothing changes | Run `php artisan config:clear` again. |
