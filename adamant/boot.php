<?php

// class loading
function __autoload($className) {
	$classPath = 'library/'.strtolower($className).'.php';
	if(file_exists($classPath)) {
		include_once($classPath);
	}
	else {
		throw new MissingException(_("Unable to load")." $classPath.");
	}
}

$db = new DB();

?>