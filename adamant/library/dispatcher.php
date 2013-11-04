<?php


/**
 * Dispatchering calls in the system
 *
 */
class Dispatcher {
	/**
	 * Database
	 *
	 * @var database connector
	 */
	public $db;
	private $queue = array(ADAMANT_ACTION_PRIORITY_HIGH=>array(),ADAMANT_ACTION_PRIORITY_NORMAL=>array(),ADAMANT_ACTION_PRIORITY_LOW=>array());
	function __construct($db) {
		$this->db = $db;
		include_once('adamant/library/smarty/Smarty.class.php');
		$this->sm = new Smarty();
		$this->sm->cache_dir='tmp/cache';
		$this->sm->template_dir='adamant/view/default';
		$this->sm->compile_dir='tmp/tplc';
		$this->sm->caching=false;
		$this->sm->compile_check=true;
		$this->sm->force_compile=false;
		$this->sm->debugging=false;
		$this->sm->cache_modified_check=true;
		$this->sm->error_reporting= E_ALL & ~ E_NOTICE;
	}
	
	/**
	 * Registering actions
	 *
	 * @param unknown_type $action
	 * @param unknown_type $priority
	 * ADAMANT_PRIORITY_FIRST
	 * ADAMANT_PRIORITY_LAST
	 * ADAMANT_PRIORITY_NORMAL
	 * ADAMANT_PRIORITY_BEFORE
	 */
	public function registerAction($action=array(),$priority=ADAMANT_ACTION_PRIORITY_NORMAL, $position=ADAMANT_ACTION_POSITION_LAST){
		if (!isset($action[1])) $action[1] = 'index';
		if (!isset($action[2])) $action[2] = array();
		if (!isset($action[3])) $action[3] = false;
		if ($position == ADAMANT_ACTION_POSITION_LAST) {
			array_push($this->queue[$priority], $action);
		}
		else {
			array_unshift($this->queue[$priority], $action);
		}
	}
	
	public function run() {
		foreach ($this->queue as $priority => &$element) {
			while (count($element) ) {
				$this->process();
			}
		}
		
	}
	
	private function process() {
		foreach ($this->queue as $priority => &$element) {
			if(count($element) > 0) {
				$action = array_shift($element);
				list($className, $methodName, $arguments, $isolated) = $action;
				include_once('adamant/controller/'.$className.'.php');
				$obj_ns = "c_".str_replace('/','_',$className);
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
	}
	
	public function tick($ticks=1) {
		while (count($this->queue) && $ticks > 0) {
			$this->process();
			$ticks--;
		}
	}
}
