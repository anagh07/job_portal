<?php
// Initialize a session
session_start();

// Point to db config file
require_once 'config.php';

// Point to helpers
require_once 'helpers/system_helper.php';

// Setup auto loader
function __autoload($class_name) {
    require_once 'models/' . $class_name . '.php';
}

// spl_autoload_register(function ($class_name) {
//     include 'lib/' . $class_name . '.php';
// });

// echo 'hi';