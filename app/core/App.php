<?php

class App
{
    private $controller = 'Home';
    private $method = 'index';

    private  function splitURL()
    {
        $URL = $_GET["url"] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL(); // e.g. ['blog', 'post', '123']

        // Capitalize the controller name (first part of URL)
        $controllerName = ucfirst($URL[0]);

        // Build the controller file path
        $filename = "../controllers/" . $controllerName . ".php";
        // Load appropriate controller
        if (file_exists($filename)) {
            require $filename;
            $this->controller = $controllerName;
        } else {
            require "../controllers/_404.php";
            $this->controller = "_404";
        }


        $controller = new  $this->controller;
        call_user_func_array([$controller, $this->method], [""]);
    }
}
