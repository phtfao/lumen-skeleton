#!

cp .env.example .env
composer install
touch database/database.sqlite
chmod 777 database/database.sqlite
chmod 777 storage -R

cp -R vendor/phtfao/panako/tests .
php /panako/artisan migrate:refresh --seed
