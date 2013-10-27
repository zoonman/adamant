<?php
if(!defined('ADAMANT')) exit(1);

$config_file_template  = <<<CONFIG_T
<?php
/**
 * Database name
 *
 */
define('DB_NAME', '{db}');
/**
 * Database host
 *
 */
define('DB_HOST', '{host}');
/**
 * Database username
 *
 */
define('DB_USER', '{user}');
/**
 * Database password
 *
 */
define('DB_PASS', '{pass}');
CONFIG_T;

if (setup_validate_form_data()) {
	
	$config_file_content = str_replace(array('{db}','{user}','{pass}'), array($_POST['db'],$_POST['user'],$_POST['pass']), $config_file_template);
	if (@file_put_contents('adamant/config.php', $config_file_content) != 0) {
		echo '<div class="message success">Config installed. <a href="/">Continue</a>.</div>';
	}
	else {
		echo '<div class="message warning">Check filesystem access rights</div>';
	}
}

function setup_validate_form_data() {
	if (is_writable('adamant')) {
		
		$setup_form =  <<<SETUP_FORM
		<style>
		label	{width: 200px;display:inline-block;}
		</style>
		<form class="simple_form" method="POST">
			<h1>Provide database connection credentials</h1>
			<p><label for="host">Database host</label><input type="text" name="host" id="host" value="localhost">
			<p><label for="db">Database name</label><input type="text" name="db" id="db" value="adamant">
			<p><label for="user">Username</label><input type="text" name="user" id="user" value="username">
			<p><label for="pass">Password</label><input type="text" name="pass" id="pass" placeholder="password">
			<p><input type="submit">
		</form>
SETUP_FORM;

		if (empty($_POST)) {
			echo $setup_form;
		}
		else {
			if (filter_var($_POST['db'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/\S+/'))) !== false 
				&& filter_var($_POST['user'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/\S+/'))) !== false 
				&& filter_var($_POST['pass'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/\S+/'))) !== false) {
				return true;
			}
			else {
				echo $setup_form;
			}
		}
	}
	else {
		echo '<div class="message warning">Check filesystem access rights</div>';
	}
	return false;
}

?>