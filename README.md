# Seat Booking App
## _by Alan NGAI_

Seat Booking App is designed for employee to book a seat in the working day within different offices located

## Features

- Register an employee
- Register N number of offices and their number of seats
- Book a seat for an already registered employee
- Book a seat for a working day (08:00-17:00) or for an hour
- Display all office seats (for a working day / an hour)

## Tech

Seat Booking App use Laravel as the framework to work properly:

- [Laravel] - PHP Framework for the app MVC design
- [Bootstrap] - UI Framework for the frontend
- [PHP Unit] - For the unit test
- [jQuery] - Frontend javascript libray

## Installation

Seat-Booking-App requires the following to run
 - [PHP](https://www.php.net/downloads.php#v7.3.32) 7.3+
 - [Laravel](https://laravel.com/) 8.70.2+
 - [MariaDB](https://mariadb.org/) 10.6.4+

Install the dependencies and devDependencies and start the server.

Copy .env.example and rename to .env 
Update the database configuration in .env:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

Start the application...

```sh
cd seat-booking-app
php artisan migrate
php artisan db:seed
php artisan serve
```
> Basically, the app will be run on 127.0.0.1:8000
## Unit Test

Copy .env.example to .env.testing and Update the database configuration in .env:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

After updating .env.testing for your testing Database, follow the below commands
Dummy test data will be generated for feature/unit test
```sh
cd seat-booking-app
php artisan migrate --env=testing
php artisan migrate:fresh --seed --env=testing
php artisan test
```
