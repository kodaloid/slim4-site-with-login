<?php
/**
 * This is an example controller class. The routes.php file points the root /
 * path to the home function on this controller. The class is automatically 
 * instantiated via composer psr-4 lookups, so the functions in the class do
 * not need to be static.
 */



namespace App;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;


class PageController {

	function home(ServerRequestInterface $request, ResponseInterface $response, array $args) {
		$view = Twig::fromRequest($request);

		$logger = \Helpers::getLogger('logger');
		$logger->info('hey there!');
		
		return $view->render($response, 'home.twig', [
			'name' => 'World',
	  ]);
	}


	function hello(ServerRequestInterface $request, ResponseInterface $response, array $args) {
		$name = $args['name'];
    	$response->getBody()->write("Hello, $name");
    	return $response;
	}

}