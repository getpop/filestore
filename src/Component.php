<?php
namespace PoP\FileStore;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use PoP\Root\Container\ContainerBuilderFactory;

/**
 * Class required to check if this component exists and is active
 */
class Component
{
    /**
     * Indicate if the component is active
     *
     * @var boolean
     */
    public static $active;
    
    /**
     * Initialize services
     */
    public static function init()
    {
        self::$active = true;

        // Initialize the ContainerBuilder with this component's service implementations
        $containerBuilder = ContainerBuilderFactory::getInstance();
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(dirname(__DIR__)));
        $loader->load('config/services.yaml');
    }
}
