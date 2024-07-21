<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('ROOT', dirname(__FILE__));
session_start();

$request = $_SERVER['REQUEST_URI'];
echo "uri:{$request}<br>";
if(!empty($_SESSION['AUTH'])){echo "auth-status_" . var_dump($_SESSION['AUTH']);}

require_once(ROOT . '/config/router.php');
require_once(ROOT . '/config/database.php');
require_once(ROOT . '/config/session.php');

$session = new Session($request);

$router = new Router();
$router->run();

?>
