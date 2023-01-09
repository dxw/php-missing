<?php declare(strict_types=1);

namespace Missing;

class Reflection
{
    /**
    * @param object $obj
    * @return mixed
    */
    public static function call($obj, string $methodName, array $args = [])
    {
        $ref = new \ReflectionObject($obj);

        $method = $ref->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($obj, $args);
    }
}
