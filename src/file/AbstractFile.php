<?php
namespace PoP\FileStore\File;

abstract class AbstractFile
{
    abstract public function getDir();

    abstract public function getFilename();

    public function getFilepath()
    {
        return $this->getDir().'/'.$this->getFilename();
    }
}
