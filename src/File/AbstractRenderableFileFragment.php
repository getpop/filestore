<?php
namespace PoP\FileStore\File;

abstract class AbstractRenderableFileFragment
{
    abstract public function getAssetsPath();

    public function getConfiguration()
    {
        return array();
    }

    public function isJsonReplacement()
    {
        return true;
    }

    public function getJsonEncodeOptions()
    {
        // Documentation: https://secure.php.net/manual/en/function.json-encode.php
        return 0;
    }
}
