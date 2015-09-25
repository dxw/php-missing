<?php

namespace Missing;

class Strings {
  static function starts_with($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
  }

  static function ends_with($haystack, $needle) {
    return substr($haystack, -strlen($needle)) === $needle;
  }

  static function get_output($callback) {
    ob_start();
    call_user_func($callback);
    $s = ob_get_contents();
    ob_end_clean();
    return $s;
  }
}
