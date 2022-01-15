# Laravel 8 + Vue 3 + Bootstrap 5

## What inside?
- Laravel ^8.6 - [Laravel Docs](https://laravel.com/docs/8.x)
- Vue ^3.x - [Vue.js Docs](https://vuejs.org/v2/guide)
- Bootstrap 5.x [Bootstrap Docs](https://getbootstrap.com/docs/5.0/getting-started/introduction/)

## What next?
After clone or download this repository, next step is install all dependency required by laravel and laravel-mix.

```shell
# create copy of .env
$ cp .env.example .env
# sett your .env (DB, etc)
# install all-dependency
$ composer install
$ npm install && npm run dev
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# generate laravel app key
$ php artisan key:generate
$ php artisan serve
```
