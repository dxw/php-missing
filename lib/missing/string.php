<?php

namespace Missing\String;

function startswith($haystack, $needle) {
  return substr($haystack, 0, strlen($needle)) === $needle;
}

function endswith($haystack, $needle) {
  return substr($haystack, -strlen($needle)) === $needle;
}
