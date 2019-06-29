<?php
define('URL', 'http://localhost:8080/');
define('ROOT', dirname(__DIR__));
define('VIEWS_PATH', ROOT.'/Views/');
define('MODELS_PATH', ROOT.'/Models/');

require_once(ROOT.'/CoreClass/Router.php');
require_once(ROOT.'/CoreClass/Controller.php');
require_once(ROOT.'/CoreClass/View.php');
require_once(ROOT.'/CoreClass/Model.php');
require_once(ROOT.'/config/db.php');