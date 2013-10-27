<?php
// Common functions 
require_once('library/error.php');
require_once('library/common.php');


include_once('config.php');
// class loading
function __autoload($className) {
	$classPath = 'adamant/library/'.strtolower(str_replace("\\","/",$className)).'.php';
	if(file_exists($classPath)) {
		include_once($classPath);
	}
	else {
		throw new Exception(_("Unable to load")." $classPath.");
	}
}

$db = new DB(DB_NAME,DB_HOST, DB_USER,DB_PASS);

?>