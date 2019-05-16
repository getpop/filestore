<?php
namespace PoP\FileStore;

use PoP\Root\Component\YAMLServicesTrait;

/**
 * Class required to check if this component exists and is active
 */
class Component
{
    use YAMLServicesTrait;

    /**
     * Initialize services
     */
    public static function init()
    {
        self::initYAMLServices(dirname(__DIR__));
    }
}
