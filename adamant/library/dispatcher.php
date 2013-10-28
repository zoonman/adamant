<?php


class Dispatcher {
	public $db;
	private $queue;
	function __construct($db) {
		$this->db = $db;
	}
	
	public function registerAction($action=array(),$priority=0){
		if ($priority <= 0) {
			array_push($this->queue, $action);
		}
		else {
			array_unshift($this->queue, $action);
		}
	}
	
	public function run() {
		while (count($this->queue)) {
			$this->process();
		}
	}
	
	private function process() {
		if(count($this->queue) > 0) {
			$action = array_shift($this->queue);
			list($className, $methodName, $arguments, $isolated) = $action;
			$obj_ns = "object_".$className;
			if ($isolated) {
				$obj = new $className($this);
				call_user_method($methodName,$obj,$arguments);
			}
			else {
				if (!is_object($this->$obj_ns)) {
					$this->$obj_ns = new $className($this);
				}
				
				call_user_method($methodName,$this->$obj_ns,$arguments);
			}
		}	
	}
	
	public function tick($ticks=1) {
		while (count($this->queue) && $ticks > 0) {
			$this->process();
			$ticks--;
		}
	}
}
