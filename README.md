# Skeleton

The skeleton application is a starter kit for Laravel based projects developed during the Virtual Company II at PNC.

## Features

* Simplified User/Roles management
* Debug bar
* Collection of PHP libraries
* Collection of JS libraries
* Examples of PHP and JS codes
* A comprehensive starter kit that allows you to focus on business needs

## Prepare the database

Create a database (eg. skeleton) and update your local .env (for development) or config/database.php file accordingly.

## Setup

Install the backend dependencies:

    composer install

Install the frontend dependencies:

    npm install

Build the JS and CSS bundles of the application (change for *prod* in production):

    npm run dev

Launch the migration of the database and populate it with some random data:

    php artisan migrate:fresh --seed

The application is deployed and accessible from the public subfolder (eg. http://localhost/skeleton/public/).

You might need to update config/app.php with your own encryption key.

/ ! \ Please change APP_NAME (either in .env or config/app.php) so as to avoid conflict in session name.

## Default users and roles

Connect to the application as an administrator with the login *manager@example.com* and the password *password*.
All other users are created with random emails as login but they always have the same password *password*.

## Create your own application

You can clean the following files if you want to build your own application:

* resources/views/examples/*
* resources/views/emails/example.php
* public/images/examples/*
* app/Http/Controllers/ExamplesComtroller.php
* app/Mail/ExampleEmail.php
* And the routes associated to the examples into routes/web.php

Follow a tutorial like this one: https://laravel-news.com/your-first-laravel-application

Good luck for your project, and don't forget to update this README file :)
