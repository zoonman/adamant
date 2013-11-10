<?php
if(!defined('ADAMANT')) exit(1);
function adamant_error_handler($errno, $errstr, $errfile, $errline = null ) {
	error_reporting(0);
  echo '<div style="color: red;padding-left: 5px;border-left: solid 5px red;background: #fff;"><pre>Error#: '.$errno."\nError: ".$errstr."\nFile: ".$errfile."\nLine: $errline </pre></div>";
	return true;
}

function adamant_exception_handler($exception) {
  echo '<div style="color: red;padding-left: 5px;border-left: solid 5px red;background: #fff;"><pre>Exception: '.$exception->getMessage()."</pre></div>";
	return true;
}
set_error_handler("adamant_error_handler");	
set_exception_handler("adamant_exception_handler");	

?>