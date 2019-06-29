<?php
require ('config/paths.php');
$router = new Router();
try {
    $db = new PDO('mysql:host=localhost;dbname=camagru', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    $router->errorUri('Database connection error', 'action500');
}
$router->run();