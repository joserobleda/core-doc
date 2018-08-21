<?php

namespace JR\CoreDocBundle;

class AnnotationLoader
{
    public static function load(string $class)
    {
        $file = __DIR__ . '/Annotation/' . $class . '.php';

        if (file_exists($file)) {
            include $file;
        }
    }
}
