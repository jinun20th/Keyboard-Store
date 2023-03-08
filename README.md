# Keyboard Store using Laravel framework

This is a Ecommerce app that the product is about keyboard with admin section. <br>

## Features
-   Fully functional E-commerce website front-end and back-end built from scratch.
-   Using laravel voyager as an admin panel for the site.
-   Intelligent searching mechanism for products.
-   Awesome Cart package that uses session.
-   An artisan command to seed the database with all neccessary dummy data, even for voyager tables.
-   Different user roles and privileges.
-   Categories, tags and price filtering for easier search for products.

---

## Clone My Repo <br>

```
git clone https://github.com/alutom2002/Keyboard-Store
```

After Cloning, Go to the directory by typing the command shown below.

```
cd Keyboard-Store
```

Then create `.env` file on root directory

```
cp .env.example .env
```

Then install package and run package

```
composer install
npm install
npm run dev
```
Then generate key to set APP_KEY value
```
php artisan key:generate
```

After that install ecommerce and migrate database and create random data to interact.

```
php artisan migrate --seed
php artisan ecommerce:install
```

Finally run and visit `http://127.0.0.1:8000/`

```
php artisan serve
```

This app have 2 sections. <br>

```
1. User Panel
2. Admin Panel
```

To access the admin pages: 

```
email: admin@admin.com
password: password
```

After login admin panel you can access the admin page from: 

`http://127.0.0.1/8000/admin`

### Thanks for reading :heart:
### Have a nice day :heart:
