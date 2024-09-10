<?php

class FileUtility
{
    // Method to write data to a file
    public static function writeToFile($filename, $data)
    {
        if (file_put_contents($filename, $data) === false) {
            throw new Exception("Error writing to file: $filename");
        }
    }

    // Method to open a file and return its contents
    public static function openFile($filename)
    {
        if (!file_exists($filename)) {
            throw new Exception("File not found: $filename");
        }

        $contents = file_get_contents($filename);
        if ($contents === false) {
            throw new Exception("Error reading file: $filename");
        }

        return $contents;
    }
}
