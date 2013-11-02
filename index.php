<?php

/**
 * Adamant Core
 *
 * @author Philipp Tkachev <zoonman at gmail dot com>
 * @package Adamant
 * @version 1
 */

define("ADAMANT",1); // contains Adamant system version
if (!file_exists('adamant/config.php')) {
	require_once('adamant/setup.php');
}
else {
	require_once('adamant/boot.php');
}
?>