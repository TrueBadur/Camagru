<?php

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/CoreClass/Router.php');
require_once(ROOT.'/CoreClass/Controller.php');

$router = new Router();
$router->run();