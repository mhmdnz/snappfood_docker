cd /var/www/html/snappfood
composer install
php artisan key:generate
php artisan migrate:fresh --seed
echo "* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1" > /etc/crontabs/root
