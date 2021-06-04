<?php

use App\Router\Router;

require "vendor/autoloader.php";
Autoloader::register();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__).DS);

if(empty($_GET['url']))
{
	$_GET['url'] = null;
}

$router = new Router($_GET['url']);

$router->get('/', 'App\Controller\Controller#indexView');
$router->get('/index', 'App\Controller\Controller#indexView');
$router->get('/accueil', 'App\Controller\Controller#indexView');

$router->get('/connexion', 'App\Controller\User#signin');
$router->post('/connexion', 'App\Controller\Auth#postSignin');

$router->get('/inscription', 'App\Controller\User#signup');
$router->post('/inscription', 'App\Controller\Auth#postSignup');

$router->get('/profil', 'App\Controller\User#profil');
$router->post('/profil', 'App\Controller\Auth#postProfil');


$router->run();
