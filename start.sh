#!

cp .env.example .env
composer install
touch database/database.sqlite
cp -R vendor/phtfao/panako/tests .
php /panako/artisan migrate:refresh --seed