<?php
namespace PoP\FileStore\Renderer;

use PoP\FileStore\File\AbstractFile;
use PoP\FileStore\File\AbstractRenderableFileFragment;
use PoP\FileStore\Facades\FileStore;
use PoP\FileStore\Store\FileStoreInterface;

class FileRenderer implements FileRendererInterface
{
    private $fileStore;
    public function __construct(FileStoreInterface $fileStore)
    {
        $this->fileStore = $fileStore;
    }
    public function render(AbstractFile $file, $separator = PHP_EOL): string
    {
        // Render the content
        $renderedFragments = array_map(function($fragment) {
            return $this->renderFragment($fragment);
        }, $file->getFragments());

        return implode($separator, $renderedFragments);
    }

    public function renderAndSave(AbstractFile $file, $separator = PHP_EOL): void
    {
        // Render and save the content
        $contents = $this->render($file, $separator);
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
