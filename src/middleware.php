<?php
/**
 * Add any needed middleware to this file.
 */


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;


$app->addErrorMiddleware(true, true, true);


// Add Twig-View Middleware
$twig = Twig::create(__DIR__ . '/../templates', ['cache' => false]);
$app->add(TwigMiddleware::create($app, $twig));


$app->add(function (Request $request, RequestHandler $handler) {
	$response = $handler->handle($request);
	$cors = $this->get('settings')->get('cors');
	return $response
		 ->withHeader('Access-Control-Allow-Origin', $cors)
		 ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, X-Token, Content-Type, Accept, Origin, Authorization')
		 ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});