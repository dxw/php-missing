<?php

namespace Missing\Date;

function parse_strptime($a) {
  date_default_timezone_set('UTC');
  return mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'], $a['tm_mon']+1, $a['tm_mday'], $a['tm_year'] + 1900);
}

function parse($str) {
  $formats = array(
    '%Y-%m-%dT%H:%M',
    '%Y-%m-%d %H:%M',
    '%Y-%m-%d',
  );

  foreach ($formats as $format) {
    $time = strptime($str, $format);
    if ($time !== false) {
      return parse_strptime($time);
    }
  }
}
