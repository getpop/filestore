<?php

declare(strict_types=1);

namespace PoP\FileStore\File;

abstract class AbstractAccessibleFile extends AbstractFile
{
    abstract public function getUrl();

    public function getFileurl()
    {
        return $this->getUrl() . '/' . $this->getFilename();
    }
}
