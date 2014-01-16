<?php

namespace Missing;

class Reflection {
  static function call($obj, $methodName, $args=[]) {
    $ref = new \ReflectionObject($obj);

    $method = $ref->getMethod($methodName);
    $method->setAccessible(true);
    return $method->invokeArgs($obj, $args);
  }
}
