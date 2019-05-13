<?php
namespace PoP\FileStore\Facades;

use PoP\FileStore\Renderer\FileRendererInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class FileRenderer
{
    public static function getInstance(): FileRendererInterface
    {
        return ContainerBuilderFactory::getInstance()->get('\PoP\FileStore\Contracts\FileRenderer');
    }
}
