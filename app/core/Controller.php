<?php

class Controller
{

    public function views($name)
    {

        $filename = "../app/views/" . $name . ".views.php";

        if (file_exists($filename)) {

            require $filename;
        } else {
            require "../app/views/404.views.php";
        }
    }
}
