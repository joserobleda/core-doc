<?php

namespace JR\CoreDocBundle;

class HandlerMap
{
    /** @var array */
    private $map;

    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function getHandlers(): array
    {
        return $this->map;
    }
}
