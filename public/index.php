<?php

// Load necessary controllers
require_once("../controllers/PatientController.php");
require_once("../controllers/AuthorizationController.php");

// Load routes
$routes = require_once("../routes/web.php");

// Get the action from the query string or default to 'signup'
$action = isset($_GET['action']) ? $_GET['action'] : 'signup';

if (array_key_exists($action, $routes)) {
    [$controllerClass, $method] = $routes[$action];
    $controller = new $controllerClass();
    $controller->$method();
} else {
    // Default action or redirect to signup if the action is not found
    header('Location: index.php?action=signup');
    exit();
}