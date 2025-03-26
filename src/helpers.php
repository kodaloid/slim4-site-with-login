<?php
/**
 * Various helper functions should be stored in here.
 */


class Helpers {


	/**
	 * Get a service from the app dependency container.
	 */
	static function getContainerService($name) {
		global $app;
		$a = (object)$app;
		$container = $a->getContainer();
		return $container->get($name);
	}


	/**
	 * Shortcut to return the logger app dependency.
	 */
	static function getLogger() {
		return self::getContainerService('logger');
	}


	/**
	 * Get an environment variable, and specify a default if it's missing.
	 */
	static function getenv($name, $default = null) {
		if (isset($_ENV[$name]) && !is_null($_ENV[$name])) {
			return $_ENV[$name];
		}
		return $default;
	}


}