<?php

namespace DTL\ClassFileConverter;

use DTL\ClassFileConverter\FilePath;

final class FilePathCandidates implements \IteratorAggregate
{
    private $filePaths = [];

    private function __construct(array $filePaths = [])
    {
        foreach ($filePaths as $filePath) {
            $this->add($filePath);
        }
    }

    public static function create()
    {
        return new self([]);
    }

    public static function fromFilePaths(array $filePaths)
    {
        return new self($filePaths);
    }

    public function add(FilePath $filePath)
    {
        $this->filePaths[] = $filePath;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->filePaths);
    }

    public function notEmpty(): bool
    {
        return !empty($this->filePaths);
    }
}
