<?php

namespace JR\CoreDocBundle\Annotation;

/**
 * @Annotation
 */
final class Command
{
    /** @var string */
    private $className;

    /** @var string */
    private $description;

    public function __construct(array $values)
    {
        $this->description = $values['description'];
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
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
