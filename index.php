<?php

/**
 * Adamant Core
 *
 * @author zoonman
 * @package defaultPackage
 */

if (!file_exists('adamant/config.php')) {
	require_once('adamant/setup.php');
}
else {
	require_once('adamant/boot.php');
}
?>