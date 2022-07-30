
# Affiliate Marketing App

## Features

- Roles bases authentication (user/admin)
- Referral link for registeration
- create wallet and categories with types (income/expenses)
- create transactions



## Installation

Install project by these steps

first of all, copy 
```bash
.env.example with new name .env
```

then run :
```
php artisan key:generate
```

then install packages by :
```
composer install
```

then create database in phpmyadmin by (affiliate_marketing_db) name.

then migrate tables and seed data by this command :
```
php artisan migrate --seed
```


you can get a tour with admin account :
Email: admin@gmail.com
Password: 123456789
