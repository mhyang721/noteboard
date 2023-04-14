<?php 
    
    // Define Path Constants
    define('WWW_ROOT', 'http://localhost:8888');
    define('PROJECT_ROOT', dirname(__DIR__, 1));

    // Define Database Constants
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_DATABASE', 'notes_app');

    // Include Functions
    require('functions.php');

    // Require Classes
    require(get_path('app/Classes/Note.php'));
    require(get_path('/app/Classes/User.php'));

    // Connect to the database
    $db = db_connect();

    // set_db() is a static method of the Note class
    // Sets the $db object as a static property of the Note class
    // Allows any method of the Note class to access the database connection
    Note::set_db($db);
    User::set_db($db);
