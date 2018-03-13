# Skeleton application

The Skeleton application is designed for the WEP Students of Passerelles numériques.
It contains some useful frontend and backend libraries:

 * vv

https://materialdesignicons.com/


The Skeleton application is a starter kit for your CodeIgniter 3 projects.
It contains a login page, session and user management.

## PHP requirements

 * PHP version at least 5.6 or 7.0+ (PHP 7 recommended).
 * PHP Extension ctype
 * PHP Extension dom
 * PHP Extension gd
 * PHP Extension iconv
 * PHP Extension libxml
 * PHP Extension mbstring
 * PHP Extension SimpleXML
 * PHP Extension xml
 * PHP Extension xmlreader
 * PHP Extension xmlwriter
 * PHP Extension zip
 * PHP Extension zlib

## Setup

Create a database named (for example) skeleton with the collating option utf8_general_ci
Import the schema by using the SQL script provided into the SQL folder.
Edit the file `application/config/database.php` and point to your database.

/!\ IMPORTANT: Please change the name of the session cookie by opening `application/config/config.php` and change the value of  `sess_cookie_name` with the name of your application. For example:

    $config['sess_cookie_name'] = 'ci_session';

Would become:

    $config['sess_cookie_name'] = 'my_application_session';
