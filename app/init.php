<?php 

    // Start Output Buffering
    ob_start();

    // Define Path Constants
    define('WWW_ROOT', 'https://noteboard.michelle-yang.co');
    define('PROJECT_ROOT', dirname(__DIR__, 1));

    // Define Database Constants
    define('DB_HOST', 'localhost');
    define('DB_USER', 'michuebl_noteboard_app_user');
    define('DB_PASS', '#36j1-,8b;=5');
    define('DB_DATABASE', 'michuebl_noteboard_app');

    // Include Functions
    require('functions.php');

    // Require Classes
    require(get_path('app/Classes/Note.php'));
    require(get_path('/app/Classes/User.php'));
    require(get_path('/app/Classes/Session.php'));

    // Connect to the database
    $db = db_connect();

    // Initialize the session
    $session = new Session();

    // set_db() is a static method of the Note & User classes
    // Sets the $db object as a static property of the Note & User classes respectively
    // Allows any method of the Note and User classes to access the database connection respectively
    Note::set_db($db);
    User::set_db($db);
