# Use official PHP image with necessary extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    npm \
    nodejs

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Build Tailwind CSS
RUN npm install && npm run build

# Set environment variables (these are overridden by Render)
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/data/database/database.sqlite
ENV APP_ENV=production
ENV APP_DEBUG=false
APP_KEY=base64:qMx8rFFEgsY97LlVtQEkpvLqUvTMjMrJpoyW7+tKLo0=

# Ensure DB path exists
RUN mkdir -p /var/data/database && touch /var/data/database/database.sqlite

# Run migrations
RUN php artisan config:cache && php artisan migrate --force

# Expose port
EXPOSE 8000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]