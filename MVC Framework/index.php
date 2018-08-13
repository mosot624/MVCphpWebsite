<?php

//start session_cache_expire

session_start();
require('config.php');

require('classes/Messages.php');
require('classes/bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');


require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');



$bootstrap = new bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller){
	$controller->executeAction();
}