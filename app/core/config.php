<?php

if ($_SERVER["SERVER_NAME"] == "localhost") {

    // Database Config
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://localhost/mvc-tutorial/public');
} else {
     // Database Config
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    
    define('ROOT', 'https://www.yourwebsite.com');
}
