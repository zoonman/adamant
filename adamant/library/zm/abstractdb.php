<?php

namespace zm;

/**
 * Database abstraction class
 *
 */
abstract class AbstractDB {

  /**
   * Escaping unsafe values to place into query
   *
   * @param mixed $unsafe_value
   */
  abstract protected function q($unsafe_value,$quotes="'");
  /**
   * Run query and return results as associative array
   *
   * @param string $sql
   */
  abstract protected function s2a($sql);
  abstract protected function run($sql);
}


?>