<?php


/**
 * Dispatchering calls in the system
 *
 */
class Dispatcher {
	public $db;
	private $queue = array();
	function __construct($db) {
		$this->db = $db;
		$this->sm = new Smarty();
	}
	
	public function registerAction($action=array(),$priority=0){
		if (!isset($action[1])) $action[1] = 'index';
		if (!isset($action[2])) $action[2] = array();
		if (!isset($action[3])) $action[3] = false;
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
			include_once('adamant/controller/'.$className.'.php');
			$obj_ns = "object_".str_replace('/','_',$className);
			$className = ucwords(str_replace('/',' ',$className));
			$className = str_replace(' ','',$className);
			if ($isolated) {
				$obj = new $className($this);
				call_user_func_array(array($obj,$methodName),$arguments);
			}
			else {
				if (!property_exists($this,$obj_ns) || !is_object($this->$obj_ns)) {
					$this->$obj_ns = new $className($this);
				}
				call_user_func_array(array($this->$obj_ns,$methodName),$arguments);
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
