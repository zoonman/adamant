<?php

/**
 * Adamant Core
 *
 * @author zoonman
 * @package defaultPackage
 */

define("ADAMANT",1); // contains Adamant system version
if (!file_exists('adamant/config.php')) {
	require_once('adamant/setup.php');
}
else {
	require_once('adamant/boot.php');
}
?>