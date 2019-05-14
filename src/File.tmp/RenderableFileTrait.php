<?php
namespace PoP\FileStore\File;

trait RenderableFileTrait
{
    private $fragments;

    public function getFragments()
    {
        if (is_null($this->fragments)) {
            $this->fragments = $this->getFragmentObjects();
        }
        
        return $this->fragments;
    }

    abstract protected function getFragmentObjects(): array;
}
