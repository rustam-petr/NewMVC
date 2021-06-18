<?php

namespace App;

class Router
{
    public function run()
    {
        $type = $_GET["type"] ?? "Main";
        $action = "action" . ($_GET["action"] ?? "index");

        $controllerName = "App\\Controller\\$type";
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $action)) {
                $controller->{$action}();
            } else {
//                echo "Method not found";
                header('HTTP/1.0 403 Forbidden');
                include __DIR__ . "/../templaces/errors/403.php";
            }
        } else {
//            echo "Class not found";
            header('HTTP/1.0 404 Not Found');
            include __DIR__ . "/../templaces/errors/404.php";
//                header('HTTP/1.0 403 Forbidden');
        }


    }
}