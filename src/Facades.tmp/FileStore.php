<?php
namespace PoP\FileStore\Facades;

use PoP\FileStore\Store\FileStoreInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class FileStore
{
    public static function getInstance(): FileStoreInterface
    {
        return ContainerBuilderFactory::getInstance()->get('\PoP\FileStore\Contracts\FileStore');
    }
}
