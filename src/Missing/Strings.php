<?php

namespace Missing;

class Strings
{
    public static function startsWith($haystack, $needle)
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }

    public static function endsWith($haystack, $needle)
    {
        return substr($haystack, -strlen($needle)) === $needle;
    }

    public static function getOutput($callback)
    {
        ob_start();
        call_user_func($callback);
        $s = ob_get_contents();
        ob_end_clean();

        return $s;
    }
}
