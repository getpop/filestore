<?php

declare(strict_types=1);

namespace PoP\FileStore\Facades;

use PoP\FileStore\Store\FileStoreInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class FileStoreFacade
{
    public static function getInstance(): FileStoreInterface
    {
        return ContainerBuilderFactory::getInstance()->get('file_store');
    }
}
