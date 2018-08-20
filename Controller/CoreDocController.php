<?php

namespace JR\CoreDocBundle\Controller;

use App\MessageHandler\MyMessage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class CoreDocController
{
    /** @var MessageBusInterface */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function docUiAction(): Response
    {
        $this->bus->dispatch(new MyMessage());

        return new Response("Hello world!");
    }
}
