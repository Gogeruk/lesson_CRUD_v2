#!/bin/bash
echo 'refreshing db'
php artisan migrate:refresh

echo 'seeding db with trash data'
php artisan db:seed

echo 'DONE! please check your db'
