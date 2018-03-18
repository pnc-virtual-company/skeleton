# Skeleton application

The Skeleton application is designed for the WEP Students of Passerelles numériques in Cambodia.
It contains some useful frontend and backend libraries:

 * CodeIgniter 3
 * PHPSpreadsheet (import/export Excel)
 * DOMPDF (create a PDF document)
 * picqer/php-barcode-generator Barcode generator
 * guzzlehttp/guzzle to call 3rd party API from PHP
 * sabre/vobject manipulate iCalendar objects (for an ICS feed)

 A lot of examples are provided for various frontend widgets:

 * Datatable
 * Calendar
 * Datepicker
 * Material design icons
 * Rich text editors
 * Treeview
 * etc.

The Skeleton application is a starter kit for any CodeIgniter 3 projects.
It contains a login page, session and user management.

## PHP requirements

 * PHP version at least 5.6 or 7.0+ (PHP 7 recommended).
 * PHP Extension dom
 * PHP Extension gd
 * PHP Extension mbstring
 * PHP Extension xml
 * PHP Extension zip
 * PHP Extension zlib

## Setup

If you have cloned the repository, you need an extra step to install the PHP libraries.
Use composer (PHP dependencies manager) to install the libraies with this command:

    composer install

Create a database named (for example) skeleton with the collating option `utf8_general_ci`
Import the schema by using the SQL script provided into the SQL folder.
Edit the file `application/config/database.php` and point to your database.
By default, the skeleton application uses a prefix (`skeleton_`) for all tables.
This behaviour can be changed by editing the databases options along with the name into the database.

The default user is *admin* and its password is *password*.

/!\ IMPORTANT: Please change the name of the session cookie by opening `application/config/config.php` and change the value of  `sess_cookie_name` with the name of your application. For example:

    $config['sess_cookie_name'] = 'ci_session';

Would become:

    $config['sess_cookie_name'] = 'my_application_session';
