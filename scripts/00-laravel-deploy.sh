#!/usr/bin/env bash

echo "Clear cache..."
php artisan optimize:clear

echo "link storage folder"
php artisan storage:link

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

echo "Running User seeder..."
php artisan make:seeder UserSeeder






