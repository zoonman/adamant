<?php
namespace zm;
include_once('abstract.db.php');
class MySQL extends AbstractDB {
	private $link = null;
	function __construct($database,$host='localhost', $user=null, $password=null,$new_connection=null,$extra_flags=null) {
		$this->link = @mysql_connect($host, $user, $password, $new_connection, $extra_flags);
		if (is_resource($this->link)) {
			if (@mysql_select_db($database, $this->link) == false) {
				throw new Exception("Cannot select database [$database]. ".mysql_error($this->link));
			}
		}
		else {
			throw new Exception("Cannot connect to host [$host]. ".mysql_error());
		}
	}
	function __destruct(){
		if (is_resource($this->link)) {
			mysql_close($this->link);
		}
	}
	public function q($unsafe_value, $quotes="'"){
		return $quotes.mysql_real_escape_string($unsafe_value, $this->link).$quotes;
	}
	public function s2a($sql,$keyField=null) {
		$result = mysql_query($sql, $this->link);
		if (is_resource($result)) {
			$resource = array();
			if (is_null($keyField)) {
				while ($row = mysql_fetch_assoc($result)) $resource[] = $row;
			}
			else {
				while ($row = mysql_fetch_assoc($result)) $resource[] = $row[$keyField];
			}
			mysql_free_result($result);
			unset($result);
			return $resource;
		}
		elseif ($result === true) {
			return true;
		}
		else {
			throw new Exception("Cannot execute query [$sql]. ".mysql_error($this->link));
			return false;
		}
	}
	public function run($sql) {
		$result = mysql_query($sql, $this->link);
		if ($result===false) {
			throw new Exception("Cannot execute query [$sql]. ".mysql_error($this->link));
			return false;
		}
		return true;
	}
	public function aff() {
		return mysql_affected_rows($this->link);
	}
	public function id() {
		return mysql_insert_id($this->link);
	}
}

?>