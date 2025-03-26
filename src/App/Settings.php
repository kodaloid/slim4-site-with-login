<?php
/**
 * This skeleton uses an array for the settings, but Slim likes classes for
 * dependencies, so this is a wrapper class for the settings. This can be
 * extended in the future to add further features related to settings (think
 * backup, export etc...).
 */


namespace App;


class Settings {
	private $settings;

	
	function __construct($settings) {
		$this->settings = $settings;
	}


	public function get(string $key = '') {
      return (empty($key)) ? $this->settings : $this->settings[$key];
   }
}