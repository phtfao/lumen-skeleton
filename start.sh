#!

cp .env.example .env
composer install
touch database/database.sqlite
php /panako/artisan migrate:refresh --seed