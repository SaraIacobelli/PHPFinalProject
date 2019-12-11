<?php
declare(strict_types=1);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use DI\ContainerBuilder;
use SimpleMVC\Controller\Error;
use Zend\Diactoros\ServerRequestFactory;

$builder = new ContainerBuilder();
$builder->addDefinitions('config/container.php');
$container = $builder->build();

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// Routing
$path   = $request->getUri()->getPath();
$method = $request->getMethod();

$v = explode("/",$path);
if(array_key_exists(2,$v) && $v[2]!="")
	$path=$v[0]."/".$v[1];

$murl   = sprintf("%s %s", $method, $path);

$routes = require 'config/route.php';
$controllerName = $routes[$murl] ?? Error::class;

$controller = $container->get($controllerName);
$controller->execute($request);
