<?php 
    
    define('WWW_ROOT', 'http://localhost');
    define('PROJECT_ROOT', dirname(__DIR__, 1));

    // Add Database Constants
    define('DB_HOST', 'localhost');
    define('DB_USER', 'notes_app_user');
    define('DB_PASS', '!k+Y2J');
    define('DB_DATABASE', 'notes_app');

    // Include functions
    require('functions.php');

    // Connect to the database
    $db = db_connect();