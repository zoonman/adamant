<?php

function adamant_error_handler($errno, $errstr, $errfile, $errline = null ) {
	error_reporting(0);
  echo '<div style="color: red"><pre>Error#: '.$errno."\nError: ".$errstr."\nFile: ".$errfile."\nLine: $errline </pre></div>";
	return true;
}

function adamant_exception_handler($exception) {
  echo '<div style="color: red"><pre>Exception: '.$exception->getMessage()."</pre></div>";
	return true;
}
set_error_handler("adamant_error_handler");	
set_exception_handler("adamant_exception_handler");	

?>