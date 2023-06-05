<?php 

// User-Defined Functions
// ----------

// Returns a URL to a path
// Adds a leading '/' if one has not been provided.
function get_public_url($path = "") {
    if($path[0] != '/') {
        $path = '/' . $path;
    }
    return WWW_ROOT . '/public' . $path;
}

// Returns the location on the server to a path
// Adds a leading '/' if one has not been provided.
function get_path($path = "") {
    if ($path != "") {
        if($path[0] != '/') {
        $path = '/' . $path;
    }
}
    return PROJECT_ROOT . $path;
}

// redirects to a given URL via the get_url function
function redirect($path) {
    header('Location: ' . get_public_url($path) );
}

// Return special characters as HTML entities for security
function h($str) {
    return htmlspecialchars($str);
}

// Returns a URL safe string
function u($string) {
    return urlencode($string);
}

// Checks if a value is blank 
function is_blank($var) {
    if(!isset($var) || "" === trim($var, " ") ) {
        return true;
    } 
    return false;
}

// Prints out human readable data wrapped in <pre> tags, for debugging
function wrap_pre($data) {
    return '<pre>' . print_r($data,true) . '</pre>';
}

// Prints out human readable data, and prevents the script from continuing
function dd($data) {
    echo wrap_pre($data);
    die();
}

// This function will return if a POST request has been sent
function is_post_request() {
    return $_SERVER[ 'REQUEST_METHOD'] === 'POST';
    
}

// Database Connection function
function db_connect() {

    // The variables needed to connect to the database
    $host = "localhost";
    $username = "notes_app_user";
    $password = "!k+Y2J";
    $db_name = "notes_app";

    // Built-in function
    // Creates a new instance of the mysqli class to connect to the database
    // Passes the variables defined above as the parameters
    $db = new mysqli($host, $username, $password, $db_name);

    // Checks if there are any errors while connecting to the database
    // exit() is a built-in function that prints a message to the screen and
    // terminates the current script if an error is found
    if($db->connect_errno) {
        echo "Failed to connect to MySQL: " . $db-> connect_error;
        exit();
    }

    // If there are no errors, this creates a connection to the database
    return $db;

    // now the $db object can be used to interact with the database
}
