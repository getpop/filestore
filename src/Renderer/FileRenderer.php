<?php
namespace PoP\FileStore\Renderer;

use PoP\FileStore\File\AbstractFile;
use PoP\FileStore\File\AbstractRenderableFileFragment;
use PoP\FileStore\Store\FileStoreInterface;

class FileRenderer implements FileRendererInterface
{
    private $fileStore;
    private $separator;
    public function __construct(FileStoreInterface $fileStore, string $separator = PHP_EOL)
    {
        $this->fileStore = $fileStore;
        $this->separator = $separator;
    }
    public function render(AbstractFile $file): string
    {
        // Render the content
        $renderedFragments = array_map(function ($fragment) {
            return $this->renderFragment($fragment);
        }, $file->getFragments());

        return implode($this->separator, $renderedFragments);
    }

    public function renderAndSave(AbstractFile $file): void
    {
        // Render and save the content
        $contents = $this->render($file);
        $this->fileStore->save($file, $contents);
    }

    protected function renderFragment(AbstractRenderableFileFragment $fragment): string
    {
        $contents = file_get_contents($fragment->getAssetsPath());
        foreach ($fragment->getConfiguration() as $key => $replacement) {
            $value = $fragment->isJsonReplacement() ? json_encode($replacement, $fragment->getJsonEncodeOptions()) : $replacement;
            $contents = str_replace($key, $value, $contents);
        }
        return $contents;
    }
}
