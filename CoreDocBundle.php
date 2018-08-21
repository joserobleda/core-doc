<?php

namespace JR\CoreDocBundle;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JR\CoreDocBundle\DependencyInjection\Compiler\RegisterHandlers;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CoreDocBundle extends Bundle
{
    public function boot()
    {
        AnnotationRegistry::registerLoader([AnnotationLoader::class, 'load']);
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(
            new RegisterHandlers(
                'core_doc.handler_map',
                [
                    'command_handler',
                    'asynchronous_command_handler',
                    'messenger.message_handler',
                ]
            )
        );
    }

}
