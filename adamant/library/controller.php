<?php

/**
 * Controller prototype
 *
 */
abstract class Controller {
	protected $db;
	protected $dispatcher;
	protected $data = array();
	protected $template = 'index';
	
	function __construct(&$dispatcher) {
		$this->db = $dispatcher->db;
		$this->sm = $dispatcher->sm;	
		$this->dispatcher = $dispatcher;
	}
	
	public function __set($name, $value) {
  	$this->data[$name] = $value;
  }
  
  function &__get($name) {
  	if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
    }
    return null;
  }
  
  function __isset($name) {
  	return isset($this->data[$name]);
  }
  
	protected function fetch() {
		foreach ($this->data as $name => $value) {
			$this->sm->assign($name,$value);
		}
		print_r( $this->sm->template_dir );
		
		if (file_exists($this->sm->template_dir[0] .  $this->template.'.tpl')) {
					return  $this->sm->fetch($this->template.'.tpl');
		}
		return '';
	}
}