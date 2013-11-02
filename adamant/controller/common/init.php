<?php

final class CommonInit extends Controller {
	public function index() {
		$this->page = array( 'title' => 'Adamant v'.ADAMANT);
		$this->page['css'] = array('/adamant/view/default/css/core.css');
		$this->page['js'] = array('/adamant/view/default/js/core.js');
		$this->page['description'] = ' ';
		$this->page['keywords'] = ' ';
		echo $this->fetch();
	}
}



?>