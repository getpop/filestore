<?php
namespace PoP\FileStore\File;

trait RenderableFileTrait
{
    private $fragments;

    public function getFragments()
    {
        if (is_null($this->fragments)) {
            $this->fragments = array_map(function($class) {
                return new $class;
            }, $this->getFragmentClasses());
        }
        
        return $this->fragments;
    }

    abstract public function getFragmentClasses(): array;
}
