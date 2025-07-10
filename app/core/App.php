<?php

class App
{

    private  function splitURL()
    {
        $URL = $_GET["url"] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this-> splitURL(); // e.g. ['blog', 'post', '123']

        // Capitalize the controller name (first part of URL)
        $controllerName = ucfirst($URL[0]);

        // Build the controller file path
        $filename = "../controllers/" . $controllerName . ".php";
        // Load appropriate controller
        if (file_exists($filename)) {
            require $filename;
        } else {
            require "../controllers/_404.php";
        }
    }
}
