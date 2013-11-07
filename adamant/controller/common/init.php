<?php

final class CommonInit extends Controller {
	public function index() {
		$this->page = array( 'title' => 'Adamant v'.ADAMANT);
		$this->page['css'] = array('/adamant/view/default/css/core.css');
		$this->page['js'] = array('/adamant/view/default/js/core.js');
		$this->page['description'] = '';
		$this->page['keywords'] = '';
		$this->route();
	}
	
	public function route() {
		$this->qa = array();
		if (isset($_GET['rqp'])) {
			$rqpa = explode('/',$_GET['rqp']);
			$this->safe_qa = array_filter($rqpa, function ($s) {return preg_match("/^[a-z0-9_]+$/",$s);} );
			$this->qa = array_filter($rqpa);
		}
		print_r($this->qa);
	}
	public function fetch() {
		echo parent::fetch();
	}
}



?>