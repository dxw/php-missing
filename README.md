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

* [\Missing\Arrays::flatten](#arr_flatten)
* [\Missing\Arrays::sortBy](#arr_sort_by)
* [\Missing\Dates::parse](#date_parse)
* [\Missing\Dates::strftime](#date_strftime)
* [\Missing\Ints::ordinalize](#int_ordinalize)
* [\Missing\Reflection::call](#reflection_call)
* [\Missing\Strings::startsWith](#string_starts_with)
* [\Missing\Strings::endsWith](#string_ends_with)
* [\Missing\Strings::getOutput](#string_get_output)

### Arrays

<a name="arr_flatten"></a>
#### $array = \Missing\Arrays::flatten($array)

Flattens an array containing arrays.

    \Missing\Arrays::flatten([1, [2, 3, [4, 5]]]) === [1, 2, 3, 4, 5]

<a name="arr_sort_by"></a>
#### $array = \Missing\Arrays::sortBy($array, $callback)

Sorts $array by $callback($array_element).

    \Missing\Arrays::sortBy(['abc', 'ab', 'a'], function ($a) {return strlen($a);}) === ['a', 'ab', 'abc']

### Dates

<a name="date_parse"></a>
#### list($timestamp, $err) = \Missing\Dates::parse($str)

Parses several common/standard time formats, returns UNIX timestamp and error (true/null).

    list($d, $err) = \Missing\Dates::parse(get_post_meta($post->ID, '_EventStartDate', true));
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

<a name="date_strftime"></a>
#### $date = \Missing\Dates::strftime($date_string, $format, $else, $tz)

Parses $date_string using \Missing\Dates::parse() (also accepts a UTC timestamp), if it parses correctly, return the date formatted with $format in the timezone $tz, otherwise return $else.

    <p>Date: <?php echo \Missing\Dates::strftime($date, '%d/%m/%Y', 'unknown', 'Europe/London') ?></p>

### Ints

<a name="int_ordinalize"></a>
#### $string = \Missing\Ints::ordinalize($number)

Returns English ordinals for any given integer (i.e. 1 => "1st", 2 => "2nd").

Copied directly from active_record's [Inflector#ordinalize](http://api.rubyonrails.org/classes/ActiveSupport/Inflector.html#method-i-ordinalize) (also MIT licensed).

### Reflection

<a name="reflection_call"></a>
#### $value = \Missing\Reflection::call($object, $methodName, $arguments)

Calls private or protected method $methodName of $object with $arguments (an array) and returns what it returns.

### Strings

<a name="string_starts_with"></a>
#### $bool = \Missing\Strings::startsWith($haystack, $needle)

Returns true if string $haystack starts with $needle (uses substr() - regexes not supported).

<a name="string_ends_with"></a>
#### $bool = \Missing\Strings::endsWith($haystack, $needle)

Returns true if string $haystack ends with $needle (uses substr() - regexes not supported).

<a name="string_get_output"></a>
#### $string = \Missing\Strings::getOutput($callback)

Executes $callback, returns what it prints as a string.


## Licence

MIT - see COPYING.md

\Missing\Ints::ordinal and \Missing\Ints::ordinalize were ported from the Rails active_support module, also licensed under MIT.
