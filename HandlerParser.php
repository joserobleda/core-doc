<?php

namespace JR\CoreDocBundle;

use Doctrine\Common\Annotations\Reader;
use JR\CoreDocBundle\Annotation\Command;
use JR\CoreDocBundle\Annotation\Event;

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

    private function getAnnotation(string $class, string $annotationClass)
    {
        try {
            $rc = new \ReflectionClass($class);
        } catch (\ReflectionException $e) {
            return null;
        }

        return $this->reader->getClassAnnotation($rc, $annotationClass);
    }

    private function parseCommand($class)
    {
        $annotation = $this->getAnnotation($class, Command::class);

        $events = array_map(function (string $eventClass) {
            $annotation = $this->getAnnotation($eventClass, Event::class);

            return new EventDoc($eventClass, $annotation->description);
        }, $annotation->events);

        $doc = new CommandDoc(
            $class,
            $annotation->description,
            $events
        );

        return $doc;
    }
}
