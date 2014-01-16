# php-missing [![Build Status](https://secure.travis-ci.org/dxw/php-missing.png)](http://travis-ci.org/dxw/php-missing)

PHP's standard library contains a lot of stuff, but it's missing a lot of stuff. All these functions are basic things that I've had to implement over and over again.

## Installation

Install [composer](http://getcomposer.org/).

Run the following in the root of your project:

    composer require dxw/php-missing dev-master

Or, create a composer.json file with the following contents and run "composer install":

    {
      "require": {
        "dxw/php-missing": "dev-master"
      }
    }

## API

* [\Missing\Arr::flatten](#arr_flatten)
* [\Missing\Arr::sort_by](#arr_sort_by)
* [\Missing\Date::parse](#date_parse)
* [\Missing\Int::ordinalize](#int_ordinalize)
* [\Missing\Reflection::call](#reflection_call)
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

<a name="date_parse"></a>
#### list($timestamp, $err) = \Missing\Date::parse($str)

Parses several common/standard time formats, returns UNIX timestamp and error (true/null).

    list($d, $err) = \Missing\Date::parse(get_post_meta($post->ID, '_EventStartDate', true));
    if ($err) {
      $date = 'Unknown date';
    } else {
      $date = strftime('%e %B %Y', $d);
    }

The following date formats are parsed:

* %Y-%m-%dT%H:%M:%S
* %Y-%m-%d %H:%M:%S
* %Y-%m-%dT%H:%M
* %Y-%m-%d %H:%M
* %Y-%m-%d

### Int

<a name="int_ordinalize"></a>
#### $string = \Missing\Int::ordinalize($number)

Returns English ordinals for any given integer (i.e. 1 => "1st", 2 => "2nd").

Copied directly from active_record's [Inflector#ordinalize](http://api.rubyonrails.org/classes/ActiveSupport/Inflector.html#method-i-ordinalize) (also MIT licensed).

### Reflection

<a name="reflection_call"></a>
#### $value = \Missing\Reflection::call($object, $methodName, $arguments)

Calls private or protected method $methodName of $object with $arguments (an array) and returns what it returns.

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


## Licence

MIT - see COPYING.md

\Missing\Int\ordinal and \Missing\Int\ordinalize were ported from the Rails active_support module, also licensed under MIT.
