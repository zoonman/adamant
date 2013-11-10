<?php
if(!defined('ADAMANT')) exit(1);

final class CommonFire extends Controller {
	public function index() {

		$this->my_test = 'fire';
		$this->dispatcher->registerAction(array('common/fire', 'high'), ADAMANT_ACTION_PRIORITY_HIGH);
		$this->dispatcher->registerAction(array('common/fire', 'normal'), ADAMANT_ACTION_PRIORITY_NORMAL);
		$this->dispatcher->registerAction(array('common/fire', 'low'), ADAMANT_ACTION_PRIORITY_LOW, ADAMANT_ACTION_POSITION_FIRST);
	}
	
	public function high() {
		echo 'High priority';
	}
	
	public function normal() {
		echo 'Normal priority';
	}
	
	public function low() {
		echo 'Low priority';
	}
}