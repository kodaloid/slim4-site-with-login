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



class ApiController {

	function test(ServerRequestInterface $request, ResponseInterface $response, array $args) {
		$token = $request->getAttribute("token");
		$response->getBody()->write("Test Worked! Issuer is " . $token['iss']);
		return $response;
	}

}