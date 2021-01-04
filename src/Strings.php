<?php

namespace Missing;

class Strings
{
    public static function startsWith(string $haystack, string $needle) : bool
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }

    public static function endsWith(string $haystack, string $needle) : bool
    {
        return substr($haystack, -strlen($needle)) === $needle;
    }

    public static function getOutput(callable $callback) : string
    {
        ob_start();
        call_user_func($callback);
        $s = ob_get_contents();
        ob_end_clean();

        return $s;
    }
}
