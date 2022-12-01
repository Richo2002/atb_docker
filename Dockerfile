# FROM webdevops/php-nginx:8.1-alpine
# FROM richarvey/nginx-php-fpm:2.0.0
FROM tangramor/nginx-php8-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN apk --no-cache add nodejs npm

WORKDIR /var/www/html

COPY . .

COPY conf/nginx/nginx-site.conf to /etc/nginx/conf.d/default.conf

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]


# RUN composer install --no-interaction --optimize-autoloader --no-dev

# RUN npm install

# RUN php artisan config:cache

# RUN php artisan route:cache

# RUN php artisan view:cache

# RUN php artisan migrate --force

# RUN chown -R application:application .
