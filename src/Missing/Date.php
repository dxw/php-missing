<?php

namespace Missing;

class Date {
  static function parse_strptime($a) {
    date_default_timezone_set('UTC');
    return mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'], $a['tm_mon']+1, $a['tm_mday'], $a['tm_year'] + 1900);
  }

  static function parse($str) {
    $formats = array(
      '%Y-%m-%dT%H:%M',
      '%Y-%m-%d %H:%M',
      '%Y-%m-%d',
    );

    foreach ($formats as $format) {
      $time = strptime($str, $format);
      if ($time !== false) {
        return self::parse_strptime($time);
      }
    }

    throw new \InvalidArgumentException('Unparseable date format');
  }
}
