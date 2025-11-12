FROM laravelsail/php84-composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 80

CMD php artisan serve --host=0.0.0.0 --port=80
