<?php

function startswith($haystack, $needle) {
  return substr($haystack, 0, strlen($needle)) === $needle;
}

function endswith($haystack, $needle) {
  return substr($haystack, -strlen($needle)) === $needle;
}

function array_flatten($array) {
  $return = array();
  array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
  return $return;
}

function parse_strptime($a) {
  date_default_timezone_set('UTC');
  return mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'], $a['tm_mon']+1, $a['tm_mday'], $a['tm_year'] + 1900);
}
