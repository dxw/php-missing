<?php

namespace Missing;

class Date {
  static function parse_strptime($a) {
    // Reset the timezone after using mktime
    $tz = date_default_timezone_get();
    date_default_timezone_set('UTC');
    $r = mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'], $a['tm_mon']+1, $a['tm_mday'], $a['tm_year'] + 1900);
    date_default_timezone_set($tz);
    return $r;
  }

  static function parse($str) {
    $formats = array(
      '%Y-%m-%dT%H:%M:%S',
      '%Y-%m-%d %H:%M:%S',
      '%Y-%m-%dT%H:%M',
      '%Y-%m-%d %H:%M',
      '%Y-%m-%d',
    );

    foreach ($formats as $format) {
      $time = strptime($str, $format);
      if ($time !== false) {
        return [self::parse_strptime($time), null];
      }
    }

    return [null, true];
  }

  static function strftime($datetime, $format, $else, $tz) {
    // Allow timestamps
    if (is_int($datetime)) {
      $t = $datetime;
    } else {
      list($t, $err) = self::parse($datetime);
      if ($err) {
        return $else;
      }
    }

    $old_tz = date_default_timezone_get();
    date_default_timezone_set($tz);

    $ret = strftime($format, $t);

    date_default_timezone_set($old_tz);

    return $ret;
  }
}
