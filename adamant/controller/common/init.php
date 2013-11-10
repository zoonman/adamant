<?php
if(!defined('ADAMANT')) exit(1);
/**
 * Common class
 *
 */
final class CommonInit extends Controller {
	/**
	 * Default call
	 *
	 */
	public function index() {
		$this->page = array( 'title' => 'Adamant v'.ADAMANT);
		$this->page['css'] = array('/adamant/view/default/css/core.css');
		$this->page['js'] = array('/adamant/view/default/js/core.js');
		$this->page['description'] = '';
		$this->page['keywords'] = '';
		$this->route();
	}
	
	/**
	 * Provides basic rounting and call controllers
	 *
	 */
	private  function route() {
		$this->qa = array();
		if (isset($_GET['rqp'])) {
			$rqpa = explode('/',$_GET['rqp']);
			$this->safe_qa = array_filter($rqpa, "filter_safe_path_components");
			$this->qa = array_filter($rqpa);
			if (count($this->safe_qa) > 1) {
				$path = implode('/', array_slice($this->safe_qa,0, count($this->safe_qa)-1));
				$path_f = implode('/', $this->safe_qa);
				if (file_exists('adamant/controller/'.$path.'.php')){
					if ($path != 'common/init') {
						$this->dispatcher->registerAction(array($path, $this->safe_qa[count($this->safe_qa)-1]));
					}
				}
				elseif (file_exists('adamant/controller/'.$path_f.'.php')){
					if ($path_f != 'common/init') {
						$this->dispatcher->registerAction(array($path_f, 'index'));
					}
				}
			}
		}
	}

	/**
	 * Fetch template
	 *
	 */
	public function fetch() {
		echo parent::fetch();
	}
}



?>