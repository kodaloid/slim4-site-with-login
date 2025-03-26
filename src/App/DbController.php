<?php
/**
 * This is an example controller to demonstrate db implementation.
 */



namespace App;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;


class DbController {

	function test(ServerRequestInterface $request, ResponseInterface $response, array $args) {
		$db = \Helpers::getContainerService('db');
		$res = $db->query("SELECT * FROM people");
		ob_start();
		var_dump($res);
		$res_txt = ob_get_clean();

    	$response->getBody()->write("This works " . time() . "<br />" . $res_txt);
    	return $response;
	}

}