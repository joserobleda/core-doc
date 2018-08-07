<?php

namespace JR\CoreDocBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterHandlers implements CompilerPassInterface
{
    /** @var string */
    private $mapServiceId;

    /** @var array */
    private $tags;

    public function __construct(string $mapServiceId, array $tags)
    {
        $this->mapServiceId = $mapServiceId;
        $this->tags = $tags;
    }

    public function process(ContainerBuilder $container)
    {
        $handlers = [];

        foreach($this->tags as $tag) {
            $services = $container->findTaggedServiceIds($tag);

            foreach ($services as $handlerName => $serviceTags) {
                $handlers[$handlerName] = $serviceTags[0]['handles'];
            }
        }

        $definition = $container->findDefinition($this->mapServiceId);
        $definition->replaceArgument(0, $handlers);
    }
}
