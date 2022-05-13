# Laravel 8: API Task

A simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it.

## Installation

install backend modules by running

     composer install

rename .env.example to .env and updated it with your database credentials

    php artisan key:generate

    composer update

    php artisan serve
