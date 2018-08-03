<?php

namespace App\CoreDoc\CoreDocBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class CoreDocController
{
    public function docUiAction(): Response
    {
        return new Response("Hello world!");
    }
}
