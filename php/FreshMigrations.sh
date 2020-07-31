php /var/www/html/snappfood/artisan migrate:fresh --seed
echo "* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1" > /etc/crontabs/root
