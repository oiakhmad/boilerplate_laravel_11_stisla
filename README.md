# Starter Project
Essential software that must be installed on your computer

|Software |Versi |
|---------|------|
|PHP      |8.2.18|
|MariaDB  |8.0.30|

# Getting Started

## How to Use 

**Step 1:**

Download or clone this repo by using the link below:

```
https://github.com/oiakhmad/boilerplate_laravel_11_stisla.git
```
**Step 2:**

Go to project root and execute the following command in console to get the required dependencies: 

```
composer install
```
**Step 3:**

set up configuration

create local database, you can use phpmyadmin,laragon(heidesQL) ect
adjust config on .env as
```
DB_CONNECTION=your_connection example (mysql) DB_HOST=your_host example (127.0.0.1) 
DB_PORT=your_port example (3306) 
DB_DATABASE=your_data_base_name 
DB_USERNAME=your_user_name 
DB_PASSWORD=your_db_password
```
**Step 4:**

Migration

run the code 
```
php artisan migrate:fresh --seed 
```
for create all table on your database local'.

on factory in defauld project laravel 11 use for create fake data

for run servie can use 
```
php artisan serve
```
# all package in use on this project
template admin stisla https://github.com/stisla/stisla

fortify https://laravel.com/docs/11.x/fortify

example use add page route on (app/Providers/FortifyServiceProvider.php) in fuction boot() Fortify::loginView(function(){ return view('pages.auth.login'); });
# List feature
 1.login and logout
 2.crud users

## Noted
-- config pagination 'app\Providers\AppServiceProvider.php' add the code Paginator::useBootstrapFour(); on function boot()

if what is your changes not uptodate when service is running please try run this code 'php artisan optimize:clear' for clear all chace.
