<?php

namespace JR\CoreDocBundle;

class CommandDoc
{
    /** @var string */
    private $className;

    /** @var string */
    private $description;

    /** @var array */
    private $events;

    public function __construct(string $className, string $description, array $events)
    {
        $this->className = $className;
        $this->description = $description;
        $this->events = $events;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}