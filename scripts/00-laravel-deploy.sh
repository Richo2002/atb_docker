#!/usr/bin/env bash
echo "Install php dependance"
composer install --no-dev --working-dir=/var/www/html

echo "Install js dependance"
npm install

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force
    echo "ngnix"
nginx -g daemon off;
echo "run production"
npm run build

echo "put nginx on the background"
nginx -g daemon off;


