<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $response = $this->get('auction_generator')->generate(
            array(
                'nazwa' => 'Aukcja testowa',
                'dlugosc' => 100
                )
            );
        return new Response(var_export($response, true));
    }
}
