#!/bin/bash
# Execute to setup

COMPOSER_CMD=$(which composer)
PHP_CMD=$(which php)

echo "Starting composer..."
$COMPOSER_CMD update
$COMPOSER_CMD dumpautoload -o
echo "Done composer..."

echo "Starting migration and seeding..."
$PHP_CMD artisan migrate
$PHP_CMD artisan db:seed
echo "Done migration and seeding..."

echo "Starting API and web server on localhost:8000..."
$PHP_CMD -S localhost:8000 -t public
