<?php

// Format Output
function  show($stuff)
{

    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

// Prevent others from Typing in Javascript
function esc($str)
{
    return htmlspecialchars($str);
}

function redirect($path)
{
    header("Location:" . ROOT . "/" . $path);
    die;
}
