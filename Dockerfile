# FROM webdevops/php-nginx:8.1-alpine
# FROM richarvey/nginx-php-fpm:2.0.0
FROM tangramor/nginx-php8-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN chown -R nginx:nginx /var/www/html

copy conf/nginx/nginx-site.conf /etc/nginx/conf.d/default.conf


ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

# ENV COMPOSER_ALLOW_SUPERUSER 1

RUN composer install --no-interaction --optimize-autoloader --no-dev --working-dir="/var/www/html"

RUN npm install

RUN npm run build

CMD ["/start.sh"]


