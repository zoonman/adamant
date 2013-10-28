<?php

class Controller {
	protected $db;
	function __construct($dispatcher) {
		$this->db = $dispatcher->db;
	}
}