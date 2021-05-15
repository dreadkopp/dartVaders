#!/bin/sh

npm run production &


yes | php artisan migrate --database=migrate_connection
php artisan optimize

#clear cronjob leftovers
php artisan schedule:clear

#start supervisord and crond
supervisord -c /etc/supervisord.conf &
crond -f -L /var/www/dartVaders/storage/logs/cron.log &

# generate productfeed to prevent 404 hit from emarsys
php artisan emarsys:generate_productfeed

#fix permissions due to artisan commands run as admin
chown -R www-data:www-data storage

echo "starting nginx"
nginx -c /etc/nginx/nginx.conf

php-fpm
