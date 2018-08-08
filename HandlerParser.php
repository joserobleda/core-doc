<?php

namespace JR\CoreDocBundle;

use phpDocumentor\Reflection\DocBlockFactoryInterface;

class HandlerParser
{
    /** @var HandlerMap */
    private $map;

    /** @var DocBlockFactoryInterface */
    private $docBlockFactory;

    public function __construct(HandlerMap $map, DocBlockFactoryInterface $docBlockFactory)
    {
        $this->map = $map;
        $this->docBlockFactory = $docBlockFactory;
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

        return $this->docBlockFactory->create($rc->getDocComment());
    }
}
