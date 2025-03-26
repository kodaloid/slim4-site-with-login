<?php
/**
 * Initialisation dependencies should be added here, in this example the
 * settings, logger, database & basic JWT auth dependencies are initialised.
 */

use Opis\JsonSchema\Helper;

// Load settings.
$settings_data = require_once __DIR__ . '/settings.php';


// Settings dep.
$container->set('settings', function() use($settings_data) {
	return $settings_data;
});


// Logger dep.
$container->set('logger', function($container) {
	$settings = $container->get('settings')->get('logger');
   $logger = new Monolog\Logger($settings['name']);
   $logger->pushProcessor(new Monolog\Processor\UidProcessor());
   $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
   return $logger;
});


// JWT auth dep.
$container->set('jwt', function($container) {
	$jws_settings = $container->get('settings')->get('jwt');
	$jws_settings['logger'] = Helpers::getLogger();
  	return new Tuupola\Middleware\JwtAuthentication($jws_settings);
});


// Database via Eloquent
$container->set('db', function($container) {
	$config = (object) $container->get('settings')->get('database');
	$dsn = "mysql:host={$config->host};dbname={$config->database}";
	$db = new MeekroDB($dsn, $config->username, $config->password);
	return $db;
});