<?php
/**
 * Configure your settings in this file, however do not leave credentials here,
 * instead load them via a .env file in the root of the project 
 */


// Define root path
define('DS', DIRECTORY_SEPARATOR);
define('ABS_PATH', dirname(__DIR__) . DS);


// Load .env file
if (file_exists(ABS_PATH . '.env')) {
	$dotenv = Dotenv\Dotenv::createImmutable(ABS_PATH);
	$dotenv->load();
}


return new App\Settings([
	// App Settings
	'app' => [
		'name' => Helpers::getenv('APP_NAME'),
		'url'  => Helpers::getenv('APP_URL'),
		'env'  => Helpers::getenv('APP_ENV'),
	],

	// Database settings
	'database' => [
		'driver'    => Helpers::getenv('DB_CONNECTION'),
		'host'      => Helpers::getenv('DB_HOST'),
		'database'  => Helpers::getenv('DB_DATABASE'),
		'username'  => Helpers::getenv('DB_USERNAME'),
		'password'  => Helpers::getenv('DB_PASSWORD'),
		'port'      => Helpers::getenv('DB_PORT'),
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	],

	// Monolog settings
	'logger'                 => [
		'name'  => Helpers::getenv('APP_NAME'),
		'path'  => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
		'level' => \Monolog\Logger::DEBUG,
	],

	'cors' => Helpers::getenv('CORS_ALLOWED_ORIGINS', '*'),

	// jwt settings
	'jwt' => [
		'header' => 'Authorization',
		'secret' => Helpers::getenv('JWT_SECRET'),
		'passthrough' => ['OPTIONS']
	],
]);