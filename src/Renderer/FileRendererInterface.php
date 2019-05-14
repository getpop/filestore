<?php
namespace PoP\FileStore\Renderer;

use PoP\FileStore\File\AbstractFile;

interface FileRendererInterface
{
    public function render(AbstractFile $file): string;
    public function renderAndSave(AbstractFile $file): void;
}
