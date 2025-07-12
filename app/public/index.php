<?php

session_start();

require "../public/index.php";

$app = new App;
$app-> loadController();