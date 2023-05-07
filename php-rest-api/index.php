<?php
require_once "Database.php";
require_once "UserController.php";
require_once "DevController.php";

$uri = parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH);
$uri_segments = explode('/', $uri);
print_r($uri_segments);
die;
$controller = $uri_segments[5]. "Controller";
$objFeedController = new $controller();
$strMethodName = $uri_segments[6] . 'Action';
$objFeedController->{$strMethodName}();
