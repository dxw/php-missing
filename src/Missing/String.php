<?php

namespace Missing;

class String {
  static function startswith($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
  }

  static function endswith($haystack, $needle) {
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
