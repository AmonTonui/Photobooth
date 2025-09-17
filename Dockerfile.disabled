# syntax=docker/dockerfile:1
FROM ghcr.io/railwayapp/nixpacks:ubuntu-1745885067

WORKDIR /app
COPY . /app

# PHP deps (no dev), then clear caches
RUN composer install --no-interaction --prefer-dist --no-dev
RUN php artisan optimize:clear

# Frontend build
RUN npm ci
RUN npm run build

# Cache for production
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Serve
ENV PORT=8080
EXPOSE 8080
CMD ["php","artisan","serve","--host=0.0.0.0","--port=${PORT}"]
