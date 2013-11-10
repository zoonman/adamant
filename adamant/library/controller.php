<?php
if(!defined('ADAMANT')) exit(1);
/**
 * Controller prototype
 *
 */
abstract class Controller {
	protected $db;
	protected $dispatcher;
	
	protected $template = 'index';
	
	function __construct(&$dispatcher) {
		$this->dispatcher = $dispatcher;
	}
	
	public function __set($name, $value) {
		
  	$this->dispatcher->data[$name] = $value;
  }
  
  public function &__get($name) {
  	$null = null;
  	if (array_key_exists($name, $this->dispatcher->data)) {
			return $this->dispatcher->data[$name];
    }
  	return $null;
  }
  
  public function __isset($name) {
  	return isset($this->dispatcher->data[$name]);
  }
  
	public  function fetch() {
		
		//print_r($this->dispatcher->data);
		foreach ($this->dispatcher->data as $name => $value) {
			$this->dispatcher->sm->assign($name,$value);
		}
		//print_r( $this->sm->template_dir );
		
		if (file_exists($this->dispatcher->sm->template_dir[0] .  $this->template.'.tpl')) {
					return  $this->dispatcher->sm->fetch($this->template.'.tpl');
		}
		return '';
	}
}