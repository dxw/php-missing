<?php declare(strict_types=1);

namespace Missing;

class Arrays
{
    public static function flatten(array $array) : array
    {
        $return = [];
        array_walk_recursive(
            $array,
            /** @param mixed $a */
            function ($a) use (&$return) {
                $return[] = $a;
            }
        );

        return $return;
    }

    public static function sortBy(array $array, callable $callback) : array
    {
        usort(
            $array,
            /**
            * @param mixed $a
            * @param mixed $b
            */
            function ($a, $b) use ($callback) : int {
                $a = call_user_func($callback, $a);
                $b = call_user_func($callback, $b);

                if ($a > $b) {
                    return 1;
                } elseif ($a < $b) {
                    return -1;
                } else {
                    return 0;
                }
            }
        );

        return $array;
    }
}
