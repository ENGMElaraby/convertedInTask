#!/bin/sh

composer install
php artisan sail:install --with=mysql
cp .env.example .env
./vendor/bin/sail up -d
alias sail='bash vendor/bin/sail'
sail artisan app:start-app
open http://localhost:8800
