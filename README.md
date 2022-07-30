
# Affiliate Marketing App

## Features

- Roles bases authentication (user/admin)
- Referral link for registeration
- create wallet and categories with types (income/expenses)
- create transactions


## Installation

Install project by these steps

first of all, copy 
```
.env.example with new name .env
```

then install the packages by :
```
composer install
```

then run :
```
php artisan key:generate
```


then create database in phpmyadmin by (affiliate_marketing_db) name.

then migrate tables and seed data by this command :
```
php artisan migrate --seed
```

then you need to make some files as public by run this command :
```
php artisan storage:link
```

you can get a tour with admin account :
Email: admin@gmail.com
Password: 123456789

you can test features automatically through run this command :
```
php artisan test
```
