<?php

namespace JR\CoreDocBundle;

use Doctrine\Common\Annotations\AnnotationReader;
use JR\CoreDocBundle\Annotation\CoreDoc;

class HandlerParser
{
    /** @var HandlerMap */
    private $map;

    public function __construct(HandlerMap $map)
    {
        $this->map = $map;
    }

    public function parse()
    {
        return array_map([$this, 'parseCommand'], $this->map->getHandlers());
    }

    private function parseCommand($class)
    {
        try {
            $rc = new \ReflectionClass($class);
        } catch (\ReflectionException $e) {
            return null;
        }

        $reader = new AnnotationReader();
        $annotation = $reader->getClassAnnotation($rc, CoreDoc::class);

        return $annotation;
    }
}
