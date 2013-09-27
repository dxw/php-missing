# php-missing

PHP's standard library contains a lot of stuff, but it's missing a lot of stuff. All these functions are basic things that I've had to implement over and over again.

## API

* [\Missing\Arr::flatten](#arr_flatten)
* [\Missing\Arr::sort_by](#arr_sort_by)
* [\Missing\Date::parse_strptime](#date_parse_strptime)
* [\Missing\Date::parse](#date_parse)
* [\Missing\String::starts_with](#string_starts_with)
* [\Missing\String::ends_with](#string_ends_with)
* [\Missing\String::get_output](#string_get_output)

### Array

<a name="arr_flatten"></a>
#### $array = \Missing\Arr::flatten($array)

Flattens an array containing arrays.

    \Missing\Arr::flatten([1, [2, 3, [4, 5]]]) === [1, 2, 3, 4, 5]

<a name="arr_sort_by"></a>
#### $array = \Missing\Arr::sort_by($array, $callback)

Sorts $array by $callback($array_element).

    \Missing\Arr::sort_by(['abc', 'ab', 'a'], function ($a) {return strlen($a);}) === ['a', 'ab', 'abc']

### Date

<a name="date_parse_strptime"></a>
#### $timestamp = \Missing\Date::parse_strptime($array)

Used by \Missing\Date::parse() to convert the output of strptime() into something useful.

* Sets timezone to UTC
* Passes tm_hour, tm_min, etc values from given array to mktime
* Resets timezone
* Returns a UNIX timestamp

<a name="date_parse"></a>
#### list($timestamp, $err) = \Missing\Date::parse($str)

Parses several common/standard time formats, returns UNIX timestamp and error (true/null).

    list($d, $err) = \Missing\Date::parse(get_post_meta($post->ID, '_EventStartDate', true));
    if ($err) {
      $date = 'Unknown date';
    } else {
      $date = strftime('%e %B %Y', d);
    }


### String

<a name="string_starts_with"></a>
#### $bool = \Missing\String::starts_with($haystack, $needle)

Returns true if string $haystack starts with $needle (uses substr() - regexes not supported).

<a name="string_ends_with"></a>
#### $bool = \Missing\String::ends_with($haystack, $needle)

Returns true if string $haystack ends with $needle (uses substr() - regexes not supported).

<a name="string_get_output"></a>
#### $string = \Missing\String::get_output($callback)

Executes $callback, returns what it prints as a string.

## Credits

TODO

## Licence

TODO
