<?php

namespace DTL\ClassFileConverter\Composer;

use DTL\ClassFileConverter\ClassName;
use DTL\ClassFileConverter\FilePath;

final class Psr0NameInflector implements NameInflector
{
    public function inflectToRelativePath(string $prefix, ClassName $className): string
    {
        return str_replace('\\', '/', $className) . '.php';
    }

    public function inflectToClassName(FilePath $filePath, string $pathPrefix, string $classPrefix): ClassName
    {
        $className = substr($filePath, strlen($pathPrefix) + 1);
        $className = str_replace('/', '\\', $className);
        $className = preg_replace('{\.(.+)$}', '', $className);

        return ClassName::fromString($className);
    }
}