<?php

namespace DTL\ClassFileConverter\Domain;

final class FilePath
{
    private $path;

    private function __construct(string $path)
    {
        $this->path = $path;
    }

    public function isAbsolute()
    {
        return 0 === strpos($this->path, '/');
    }

    public function __toString()
    {
        return $this->path;
    }

    public static function fromString($string)
    {
        return new self($string);
    }

    public static function fromParts(array $parts)
    {
        $path = implode('/', $parts);

        return new self($path);
    }
}