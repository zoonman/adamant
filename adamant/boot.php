<?php
if(!defined('ADAMANT')) exit(1);
// Common functions 
require_once('library/error.php');
require_once('library/common.php');
require_once('library/controller.php');


include_once('config.php');
// class loading
function __autoload($className) {
	
	$classPath = 'adamant/library/'.strtolower(str_replace("\\","/",$className)).'.php';
	
	try {
		
		include_once($classPath);
	}
	catch (Exception $e) {
		throw new Exception(_("Unable to load")." $classPath.");
	}
}

$db = new DB(DB_NAME,DB_HOST, DB_USER,DB_PASS);


$dispatcher = new Dispatcher($db);
$dispatcher->registerAction(array('common/init','index'),ADAMANT_ACTION_PRIORITY_HIGH,ADAMANT_ACTION_POSITION_FIRST);
$dispatcher->registerAction(array('common/init','fetch'),ADAMANT_ACTION_PRIORITY_LOW,ADAMANT_ACTION_POSITION_LAST);
$dispatcher->run();

?>