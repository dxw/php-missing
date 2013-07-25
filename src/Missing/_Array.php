<?php

namespace Missing;

class _Array {
  static function flatten($array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
  }
}
