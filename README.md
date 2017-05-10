# AUDITOR

[![Build Status](https://travis-ci.org/devenvpl/auditor.svg?branch=master)](https://travis-ci.org/devenvpl/auditor)

## REQUIREMENTS

// TODO

## HOW TO RUN - API

```
$: cd api

$: composer install
$: vendor/bin/phinx init

; setup configuration for database migration
$: vim phinx.yml

; execute database migrations
$: vendor/bin/phinx migrate -e development

; database seeds
$: vendor/bin/phinx seed:run

; generate mappings from database to entity
$: php bin/console doctrine:mapping:import AuditorBundle yml

; check mappings, should be OK
$: php bin/console doctrine:schema:validate

; run development webserver
$: php bin/console server:run
```

## HOW TO RUN - WEBAUI

```
$: cd webui

; requirements
$: npm install gulp -g
$: npm install browserify -g

; run
$: npm install && gulp dist && gulp serve
```