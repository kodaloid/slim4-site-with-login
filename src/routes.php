<?php
/**
 * Setup the routes for your application in here.
 */

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteCollectorProxy;


$app->get('/', 'App\PageController:home');


$app->get('/hello/{name}', 'App\PageController:hello');


$app->group('/api', function(RouteCollectorProxy $group) {
	$jwt = Helpers::getContainerService('jwt');
	$group->get('/tester', '\App\ApiController:test')->add($jwt)->setName('test');
	return $group;
});


$app->get('/db-test', '\App\DbController:test')->setName('dbTest');