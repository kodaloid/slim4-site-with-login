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


$app->get('/{file:.*}', function (Request $request, Response $response, array $args) {
	$filePath = __DIR__ . '/../public/' . $args['file'];

	if (!file_exists($filePath)) {
		 return $response->withStatus(404, 'File Not Found');
	}

	switch (pathinfo($filePath, PATHINFO_EXTENSION)) {
		 case 'css':
			  $mimeType = 'text/css';
			  break;
		 case 'js':
			  $mimeType = 'application/javascript';
			  break;
		 case 'txt':
			  $mimeType = 'text/plain';
		 default:
			  $mimeType = 'text/html';
	}

	$newResponse = $response->withHeader('Content-Type', $mimeType . '; charset=UTF-8');
	$newResponse->getBody()->write(file_get_contents($filePath));
	return $newResponse;
});