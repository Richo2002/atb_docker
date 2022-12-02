# FROM webdevops/php-nginx:8.1-alpine
# FROM richarvey/nginx-php-fpm:2.0.0
FROM tangramor/nginx-php8-fpm

User root

copy conf/nginx-site.conf to /etc/nginx/conf.d/default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .


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

RUN chown -R 777 /var/www/html

RUN npm install

RUN npm run build

CMD ["/start.sh"]


