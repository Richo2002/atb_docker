#!/usr/bin/env bash
# echo "permission in public folder"
# chmod -R 777 /var/www/html

echo "install php dependencies ..."
composer install --no-dev --working-dir=/var/www/html

echo "install js dependencies..."
npm install

echo "Symbolique link"
php artisan storage:link

echo "build assets..."
npm run build

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

# change /var/www/html user/group




