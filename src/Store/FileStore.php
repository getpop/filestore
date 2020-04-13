<?php

declare(strict_types=1);

namespace PoP\FileStore\Store;

use PoP\FileStore\File\AbstractFile;

class FileStore implements FileStoreInterface
{
    public function save(AbstractFile $file, $contents)
    {
        $filePath = $file->getFilepath();

        // Create the directory
        $dir = dirname($filePath);
        if (!file_exists($dir)) {
            // Create folder
            @mkdir($dir, 0777, true);
        }

        // Open the file, write content and close it
        $handle = fopen($filePath, "wb");
        $numbytes = fwrite($handle, $contents);
        fclose($handle);
    }

    public function delete(AbstractFile $file)
    {
        $filePath = $file->getFilepath();

        if (file_exists($filePath)) {
            unlink($filePath);
            return true;
        }

        return false;
    }

    public function get(AbstractFile $file)
    {
        $filePath = $file->getFilepath();
        if (file_exists($filePath)) {
            // Return the file contents
            return file_get_contents($filePath);
        }

        return null;
    }
}
