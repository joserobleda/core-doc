<?php

namespace JR\CoreDocBundle;

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
        return $this->map->getHandlers();
    }
}
