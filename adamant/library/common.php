<?php
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
function _($string) {
	return $string;
}

/**
 * Filter for safe values
 *
 * @param string $s
 * @return bool
 */
function fltr($s) {
	return preg_match("/^[a-z0-9_]+$/",$s);
}



?>