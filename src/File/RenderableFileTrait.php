<?php

declare(strict_types=1);

namespace PoP\FileStore\File;

trait RenderableFileTrait
{
    /**
     * @var string[]|null
     */
    private ?array $fragments = null;

    public function getFragments()
    {
        if (is_null($this->fragments)) {
            $this->fragments = $this->getFragmentObjects();
        }

        return $this->fragments;
    }

    abstract protected function getFragmentObjects(): array;
}
