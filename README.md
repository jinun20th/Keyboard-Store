# Keyboard-Store using Laravel framework

## Features
-   Fully functional E-commerce website front-end and back-end built from scratch.
-   Using laravel voyager as an admin panel for the site.
-   javascript, jquery, bootstrap and css for the front-end.
-   Intelligent searching mechanism for products.
-   Awesome Cart package that uses session.
-   An artisan command to seed the database with all neccessary dummy data, even for voyager tables (php artisan ecommerce:install).
-   Different user roles and privileges.
-   Categories, tags and price filtering for easier search for products.
-   And much more features.

---

## Installation Guide

1. clone this repo to your local device
2. copy `.example.env` to `.env` file: `cp .example.env .env`
3. create a new database and add the database credentials to your `.env` file
4. run `composer install`
5. run `npm install && npm run dev`
6. run `php artisan key:generate`
7. run `php artisan ecommerce:install`
8. run `php artisan migrate --seed`
9. run `php artisan storage:link`
10. run `php artisan serve` and then visit `http://127.0.0.1:8000/`
11. credentials to access admin panel 
    (email: `admin@admin.com`, password: `password`)
12. after you login as admin, you can access the admin page from 
`http://127.0.0.1:8000/admin`