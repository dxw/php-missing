<?php

namespace Missing;

use DateTime;

class Dates
{
    public static function parseStrptime(array $a) : int
    {
        // Reset the timezone after using mktime
        $tz = date_default_timezone_get();
        date_default_timezone_set('UTC');
        $r = mktime($a['hour'], $a['minute'], $a['second'], $a['month'], $a['day'], $a['year']);
        date_default_timezone_set($tz);

        return $r;
    }

    public static function parse(string $str) : \Dxw\Result\Result
    {
        $formats = [
            'Y-m-d\TH:i:s',
            'Y-m-d H:i:s',
            'Y-m-d\TH:i',
            'Y-m-d H:i',
            'Y-m-d',
        ];

        foreach ($formats as $format) {
            $time = date_parse_from_format($format, $str);
            if ($time['error_count'] == 0) {
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

        $ret = date($format, $t);

        date_default_timezone_set($old_tz);

        return $ret;
    }
}
