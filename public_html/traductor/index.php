
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
?>

<?php

    //session_start();

    $controller = $_GET['controller'] ?? 'auth';
    $action = $_GET['action'] ?? 'login';

    $controllerName = ucfirst($controller) . 'Controller';
    $controllerFile = "./controllers/$controllerName.php";

    if (!file_exists($controllerFile)) {
        die("Controller no encontrado");
    }

    require_once $controllerFile;

    $controllerObject = new $controllerName();

    if (!method_exists($controllerObject, $action)) {
        die("Acción no encontrada");
    }

    $controllerObject->$action();
