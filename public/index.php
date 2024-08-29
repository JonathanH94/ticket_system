<?php 
require '../logic/session_config.php';
require '../helper.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

route($request);



 

