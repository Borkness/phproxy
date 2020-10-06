<?php

namespace Borkness\Phproxy;

use Psr\Container\ContainerInterface;
use RuntimeException;

abstract class Phproxy
{
    protected static $instance;
    protected static $app;

    /**
     * Get the class identifier that has been set in the DI container
     * Will throw a runtime exception when not set.
     *
     * @throws RuntimeException
     */
    public static function getClassIdentifier()
    {
        throw new RuntimeException('Class identifier not implemented');
    }

    /**
     * Set the Instance resolver to be used when locating the underlying class
     * this must be a PSR-11 compliant container.
     *
     * @param ContainerInterface $container
     */
    public static function setInstanceResolver(ContainerInterface $container)
    {
        static::$app = $container;
    }

    public static function getInstanceResolver()
    {
        return static::$app;
    }

    public static function __callStatic($name, $args)
    {
        if (!static::$instance) {
            $class = static::getClassIdentifier();
            static::$instance = self::$app->get($class);
        }

        $instance = static::$instance;

        return $instance->$name(...$args);
    }
}
