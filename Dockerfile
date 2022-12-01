# FROM webdevops/php-nginx:8.1-alpine
# FROM richarvey/nginx-php-fpm:2.0.0
FROM tangramor/nginx-php8-fpm

RUN whoami

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN apk --no-cache add nodejs npm

WORKDIR /var/www/html

COPY . .

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN composer install --no-dev --working-dir=/var/www/html
RUn npm install
RUN npm run build

CMD ["/start.sh"]


# RUN composer install --no-interaction --optimize-autoloader --no-dev

# RUN npm install

# RUN php artisan config:cache

# RUN php artisan route:cache

# RUN php artisan view:cache

# RUN php artisan migrate --force

# RUN chown -R application:application .
