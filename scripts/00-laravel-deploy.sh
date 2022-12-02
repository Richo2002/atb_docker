#!/usr/bin/env bash

echo "install php dependencies ..."
composer install --no-interaction --optimize-autoloader --no-dev

echo "change /var/www/html user/group"
chown -Rf nginx:nginx /var/www/html

echo "install js dependencies..."
npm install

echo "build assets..."
npm run build

echo "Symbolique link"
php artisan storage:link

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force






