<?php


use DI\Container;
use Slim\Factory\AppFactory;


// autoload composer.
require __DIR__ . '/../vendor/autoload.php';

// init helper functions.
require __DIR__ . '/../src/helpers.php';

// Create App
global $app;
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();
$app->setBasePath("");

// Register dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();