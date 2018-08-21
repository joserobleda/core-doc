<?php

namespace JR\CoreDocBundle\Annotation;

/**
 * @Annotation
 */
final class Command
{
    /** @var string */
    public $description;

    /** @var array */
    public $events;
}
