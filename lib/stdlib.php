<?php

function startswith($haystack, $needle) {
  return substr($haystack, 0, strlen($needle)) === $needle;
}

function endswith($haystack, $needle) {
  return substr($haystack, -strlen($needle)) === $needle;
}

function get_r($x) {
  ob_start();
  print_r($x);
  return ob_get_clean();
}

function parse_strptime($a) {
  date_default_timezone_set('UTC');
  return mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'], $a['tm_mon'], $a['tm_mday'], $a['tm_year'] + 1900);
}
