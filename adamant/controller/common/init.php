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
			function fltr($s) {return preg_match("/^[a-z0-9_]+$/",$s);}
			$this->safe_qa = array_filter($rqpa, "fltr");
			$this->qa = array_filter($rqpa);
			if (count($this->safe_qa) > 1) {
				$path = implode('/', array_slice($this->safe_qa,0, count($this->safe_qa)-1));
				print_r($this->safe_qa);
				print_r($path);
				if (file_exists('adamant/controller/'.$path.'.php')){
					if ($path != 'common/init') {
						$this->dispatcher->registerAction(array($path, $this->safe_qa[count($this->safe_qa)-1]));
								
					}
				};
			}
			
		}

	}
	public function fetch() {
		echo parent::fetch();
	}
}



?>