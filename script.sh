#!/bin/sh

composer install
php artisan sail:install --with=mysql
cp .env.example .env
./vendor/bin/sail up -d
php artisan app:start-app
open http://localhost:8800
