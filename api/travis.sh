#!/bin/sh

composer install --prefer-source --no-interaction --dev
./vendor/bin/phpcs --standard=PSR2 --encoding=utf-8 src/ tests/
composer unit
composer integration