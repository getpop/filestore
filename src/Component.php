<?php
namespace PoP\FileStore;

use PoP\Root\Component\YAMLConfigurableServicesTrait;

/**
 * Class required to check if this component exists and is active
 */
class Component
{
    use YAMLConfigurableServicesTrait;

    /**
     * Initialize services
     */
    public static function init()
    {
        self::initYAMLServiceConfiguration(dirname(__DIR__));
    }
}
