<?php

namespace Jse\AmfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class AmfController extends Controller
{
    public function indexAction()
    {
        $response = new Response($this->get('jse.amf')->load());
        $response->headers->set('Content-Type', 'application');
        $response->headers->set('Another-Header', 'header-value');
        return $response;
    }
}
