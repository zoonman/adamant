<?php
// Common functions 
require_once('library/error.php');
require_once('library/common.php');



// class loading
function __autoload($className) {
	$classPath = 'library/'.strtolower($className).'.php';
	if(file_exists($classPath)) {
		include_once($classPath);
	}
	else {
		throw new Exception(_("Unable to load")." $classPath.");
	}
}

$db = new DB();

?>