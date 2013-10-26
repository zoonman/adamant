<?php

namespace zm;

class MySQLi extends AbstractDB {
  private $link = null;
	function __construct($database,$host='localhost', $user=null, $password=null,$new_connection=null,$extra_flags=null) {
    $this->link = mysqli_connect($host, $user, $password, $database);
    if (is_object($this->link)) {

    }
    else {
      throw new \Exception("Cannot connect to host [$host]. ".mysqli_error($this->link));
    }
	}
	function __destruct(){
	  if (is_resource($this->link)) {
      mysqli_close($this->link);
	  }
	}
	public function q($unsafe_value, $quotes="'"){
	  return $quotes.mysqli_real_escape_string($unsafe_value, $this->link).$quotes;
	}
	public function s2a($sql) {
	  $result = mysqli_query($this->link, $sql);
	  if (is_object($result)) {
	    //$resource = array();
	    while (($resource[] = $result->fetch_array(MYSQLI_ASSOC)) == true);
      $result->free();
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
	  $result = mysqli_query($this->link,$sql);
	  if ($result===false) {
	  	throw new Exception("Cannot execute query [$sql]. ".mysql_error($this->link));
	  	return false;
	  }
	  return true;
	}
	public function aff() {
	  return mysqli_affected_rows($this->link);
	}
	public function id() {
	  return mysqli_insert_id($this->link);
	}
}

?>