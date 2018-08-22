<?php

namespace JR\CoreDocBundle;

class EventDoc
{
    /** @var string */
    private $className;

    /** @var string */
    private $description;

    public function __construct(string $className, string $description)
    {
        $this->className = $className;
        $this->description = $description;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
