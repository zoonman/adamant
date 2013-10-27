<?php




class DB {
	private $_obj;
	public function __construct($database,$host='localhost', $user=null, $password=null,$new_connection=null,$extra_flags=null) {
		if (function_exists("mysqli_connect")) {
			
			$this->_obj = new zm\MySQLi($database, $host, $user, $password);
		}
		elseif (function_exists("mysql_connect")) {
			
			$this->_obj = new zm\MySQL($database, $host, $user, $password, $new_connection, $extra_flags);
		}
		else {
			throw new Exception("Cannot initialize database provider");
		}
	}
	public function __call($name,$args) {
		return call_user_func_array(array($this->_obj,$name),$args);
	}
}

?>