<?php
namespace PoP\FileStore\Store;

use PoP\FileStore\File\AbstractFile;

interface FileStoreInterface
{
    public function save(AbstractFile $file, $contents);
    public function delete(AbstractFile $file);
    public function get(AbstractFile $file);
}
