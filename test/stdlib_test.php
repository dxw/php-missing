<?php

include dirname(__FILE__).'/../lib/stdlib.php';

# startswith
assert(startswith('abc', 'a'));
assert(!startswith('abc', 'b'));
assert(!startswith('a', 'abc'));

# endswith
assert(endswith('abc', 'c'));
assert(!endswith('abc', 'b'));
assert(!endswith('c', 'abc'));

# get_r
assert(get_r(array(1,2,3)) === "Array\n(\n    [0] => 1\n    [1] => 2\n    [2] => 3\n)\n");

# parse_strptime
assert(1339009200 === parse_strptime(array(
  'tm_sec' => 0,
  'tm_min' => 0,
  'tm_hour' => 19,
  'tm_mday' => 6,
  'tm_mon' => 6,
  'tm_year' => 112,
  'tm_wday' => 5,
  'tm_yday' => 187,
  'unparsed' => null,
)));
