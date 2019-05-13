<?php
namespace PoP\FileStore\Renderer;

use PoP\FileStore\File\AbstractFile;

interface FileRendererInterface
{
    public function render(AbstractFile $file, $separator = PHP_EOL): string;
    public function renderAndSave(AbstractFile $file, $separator = PHP_EOL): void;
}
