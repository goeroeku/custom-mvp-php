<?php
if(!isset($_SESSION)){
    session_start();
} 

require __DIR__ . '../../Autoload.php';

$app = new Autoload;
$app->run();