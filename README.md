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

## Configuration of Apache

Maybe explain about creating vhost. But might cause a problem when hosting on kratie.

Edit the file `C:\Windows\System32\drivers\etc\hosts` and add this line at the end of the file:

    127.0.0.1 skeleton.local

Edit the file `httpd-vhosts.conf` which is somewhere into the place where Apache server is installed and add this configuration block:

```xml
<VirtualHost skeleton.local:80>
  ServerName skeleton.local
  ServerAlias www.skeleton.local
  DocumentRoot "${INSTALL_DIR}/www/skeleton/public"
  <Directory "${INSTALL_DIR}/www/skeleton/public/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>
```

Don't forget to reload Apache before accessing to http://skeleton.local/

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
