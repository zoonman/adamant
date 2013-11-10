<?php
if(!defined('ADAMANT')) exit(1);
/**
 * Queue management constants
 * */
define("ADAMANT_ACTION_POSITION_FIRST",1);
define("ADAMANT_ACTION_POSITION_LAST",0);
define("ADAMANT_ACTION_PRIORITY_HIGH",1);
define("ADAMANT_ACTION_PRIORITY_NORMAL",2);
define("ADAMANT_ACTION_PRIORITY_LOW",3);

/**
 * Translation prototype, provides basic mapping
 *
 * @param string $string
 * @return string
 */
if ( !function_exists('_') ) {
	function _($string) {
		return $string;
	}
}

/**
 * Filter for safe values
 *
 * @param string $s
 * @return bool
 */
function filter_safe_path_components($s) {
	return preg_match("/^[a-z0-9_]+$/",$s);
}



?>
