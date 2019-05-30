<?php
namespace PoP\FileStore\Facades;

use PoP\FileStore\Renderer\FileRendererInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class FileRendererFacade
{
    public static function getInstance(): FileRendererInterface
    {
        return ContainerBuilderFactory::getInstance()->get('file_renderer');
    }
}
