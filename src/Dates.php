<?php declare(strict_types=1);

namespace Missing;

class Dates
{
    public static function parseStrptime(array $a) : int
    {
        // Reset the timezone after using mktime
        $tz = date_default_timezone_get();
        date_default_timezone_set('UTC');
        $r = mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'], $a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
        date_default_timezone_set($tz);

        return $r;
    }

    public static function parse(string $str) : \Dxw\Result\Result
    {
        $formats = [
            '%Y-%m-%dT%H:%M:%S',
            '%Y-%m-%d %H:%M:%S',
            '%Y-%m-%dT%H:%M',
            '%Y-%m-%d %H:%M',
            '%Y-%m-%d',
        ];

        foreach ($formats as $format) {
            $time = strptime($str, $format);
            if ($time !== false) {
                return \Dxw\Result\Result::ok(self::parseStrptime($time));
            }
        }

        return \Dxw\Result\Result::err('date string did not match any known format');
    }


    /**
    * @param int|string $datetime
    * @param mixed $else
    * @return mixed
    */
    public static function strftime($datetime, string $format, $else, string $tz)
    {
        // Allow timestamps
        if (is_int($datetime)) {
            $t = $datetime;
        } else {
            $result = self::parse($datetime);
            if ($result->isErr()) {
                return $else;
            }
            $t = $result->unwrap();
        }

        $old_tz = date_default_timezone_get();
        date_default_timezone_set($tz);

        $ret = strftime($format, $t);

        date_default_timezone_set($old_tz);

        return $ret;
    }
}
