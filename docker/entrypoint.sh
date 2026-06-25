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

# SQLite database. NOTE: Render's free tier has an ephemeral filesystem, so this
# database is recreated (and re-seeded) on every deploy/restart. Add a persistent
# disk or a managed database, and remove the auto-seed below, when you need data
# (contact messages, admin edits) to survive restarts.
mkdir -p database
[ -f database/database.sqlite ] || touch database/database.sqlite

php artisan migrate --force
php artisan db:seed --force
php artisan storage:link 2>/dev/null || true
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
