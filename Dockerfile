# syntax=docker/dockerfile:1

FROM php:8.3-cli-bookworm

# System libraries + PHP extensions required by Laravel + SQLite + zip uploads
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libzip-dev libsqlite3-dev libonig-dev \
    && docker-php-ext-install pdo_sqlite mbstring zip \
    && rm -rf /var/lib/apt/lists/*

# Reasonable upload limits for image/CV uploads in the admin panel
RUN { \
        echo "upload_max_filesize=12M"; \
        echo "post_max_size=14M"; \
        echo "memory_limit=256M"; \
    } > /usr/local/etc/php/conf.d/app.ini

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node 20 (for building front-end assets)
COPY --from=node:20-bookworm-slim /usr/local/bin/node /usr/local/bin/node
COPY --from=node:20-bookworm-slim /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -sf /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

WORKDIR /app

# Copy the application
COPY . .

# Install PHP + JS dependencies, build assets, then drop build-only files
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts \
    && npm ci \
    && npm run build \
    && rm -rf node_modules \
    && chmod +x docker/entrypoint.sh \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

ENTRYPOINT ["/app/docker/entrypoint.sh"]
