<?php

class Controller {

    public function views($name) {
        
        $filename = "../views". $name.".views.php";
        if(file_exists($filename)) {
          
            require $filename;
        } else {
            require "../views/404.views.php";
        }
    }
}