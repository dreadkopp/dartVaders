#!/bin/sh
composer install

npm install && npm run watch &


php artisan migrate
#php artisan optimize

crond -f &

echo "starting nginx"
nginx -c /etc/nginx/nginx.conf

php-fpm
