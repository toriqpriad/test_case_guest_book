# MyGuestBook

MyGuestBook is coding test case build by @toriqpriad

## System Spesification

- PHP version 8
- Apache2
- MySQL Database version 14.14 Distrib 5.7.24
- Laravel version 8
- Bootstrap version 4

## Installation & Running

- Use the composer to install laravel project

```bash
$ composer install 
```

- Set database connection on `.env` file .
- Run migration to build your database table

```bash
$ php artisan migrate
```

- Use artisan to start dev server

```bash
$ php artisan serve
```

## Accessing Page

- If you run this with artisan , then access `http://localhost:8000` to start acessing the page
- If you run this without artisan , then access `http://localhost/<project-directory>/public` to start acessing the page
- Laravel + InertiaJS version access `http://localhost/<project-directory>/public/buku-tamu`

