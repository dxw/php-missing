<?php

namespace Missing;

class Arrays
{
    public static function flatten($array)
    {
        $return = array();
        array_walk_recursive($array, function ($a) use (&$return) { $return[] = $a; });

        return $return;
    }

    public static function sortBy($array, $callback)
    {
        if (!is_callable($callback) || !is_array($array)) {
            trigger_error('Arguments are in the wrong order', E_USER_ERROR);
        } //@codeCoverageIgnore

        usort($array, function ($a, $b) use ($callback) {
            $a = call_user_func($callback, $a);
            $b = call_user_func($callback, $b);

            if ($a > $b) {
                return 1;
            } elseif ($a < $b) {
                return -1;
            } else {
                return 0;
            }
        });

        return $array;
    }
}
