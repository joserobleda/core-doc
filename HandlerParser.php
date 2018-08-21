<?php

namespace JR\CoreDocBundle;

use Doctrine\Common\Annotations\Reader;
use JR\CoreDocBundle\Annotation\Command;

class HandlerParser
{
    /** @var HandlerMap */
    private $map;

    /** @var Reader */
    private $reader;

    public function __construct(HandlerMap $map, Reader $reader)
    {
        $this->map = $map;
        $this->reader = $reader;
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

        /** @var Command $annotation */
        $annotation = $this->reader->getClassAnnotation($rc, Command::class);
        $annotation->setClassName($class);

        return $annotation;
    }
}
