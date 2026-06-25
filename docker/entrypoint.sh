#!/usr/bin/env sh
set -e

# Generate a fallback app key if none is configured. For stable sessions across
# deploys, set a fixed APP_KEY in the Render dashboard instead.
if [ -z "$APP_KEY" ]; then
    export APP_KEY="base64:$(php -r 'echo base64_encode(random_bytes(32));')"
fi

# Use Render's external URL so canonical/OG/sitemap links are correct.
if [ -n "$RENDER_EXTERNAL_URL" ] && [ -z "$APP_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

# Ensure the SQLite file exists only when SQLite is the configured driver.
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
    mkdir -p database
    [ -f database/database.sqlite ] || touch database/database.sqlite
fi

php artisan migrate --force
# Seed only when the database is empty, so existing data (contact messages,
# admin edits, profile/SEO settings) is preserved across deploys.
php artisan app:seed-if-empty
# The project catalogue is managed in code (database/seeders/ProjectSeeder.php),
# so re-sync it on every deploy. updateOrCreate by slug updates the listed
# projects without touching other tables or admin-added projects.
php artisan db:seed --class=ProjectSeeder --force
# Keep the admin login in sync with the ADMIN_PASSWORD env var on every boot,
# so the password can be set/changed from the dashboard without shell access.
if [ -n "$ADMIN_PASSWORD" ]; then
    php artisan app:set-admin-password || true
fi
php artisan storage:link 2>/dev/null || true
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
