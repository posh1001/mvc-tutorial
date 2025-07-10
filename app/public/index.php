<?php

session_start();

require "../core/init.php";

$app = new App;
$app-> loadController();