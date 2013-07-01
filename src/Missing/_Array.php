<?php

namespace Missing\_Array;

function flatten($array) {
  $return = array();
  array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
  return $return;
}
