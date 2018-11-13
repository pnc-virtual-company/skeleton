# Skeleton

The skeleton application is a starter kit for Laravel based projects developed during the Virtual Company II at PNC.

## Features

* Debug bar

## Prepare the database

Create a database

## Setup

Install the backend dependencies:

    composer install

Install the frontend dependencies:

    npm install

Build the JS and CSS bundles of the application:

    npm run dev

Launch the migration of the database and populate it with some random data:

    php artisan migrate:fresh --seed

The application is deployed and accessible from the public subfolder.
So you might need to create a virtual host as explained into the following paragraph.

## Default users and roles

Connect to the application as a user (password is *password* for all regular users) with one of the following logins:

* employee@example.com
* georges@example.com
* bernard@example.com
* luke@example.com
* dark@example.com
* emperor@example.com
* uncle@example.com
* bob@example.com
* leila@example.com
* obi@example.com

Connect to the application as an administrator (password is *manager* for all regular admins) with one of the following logins:

* manager@example.com
* channak@example.com
* rady@example.com
* rith@example.com

## Create your own application

You can clean the following files if you want to build your own application:

* resources/views/examples/*
* resources/views/emails/example.php
* public/images/examples/*
* app/Http/Controllers/ExamplesComtroller.php
* app/Mail/ExampleEmail.php
* And the routes associated to the examples into routes/web.php

Follow a tutorial like this one: https://laravel-news.com/your-first-laravel-application

Good luck for your project :)
