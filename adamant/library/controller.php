<?php

/**
 * Controller prototype
 *
 */
abstract class Controller {
	protected $db;
	function __construct($dispatcher) {
		$this->db = $dispatcher->db;
	}
}