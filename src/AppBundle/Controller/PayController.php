<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PayController extends Controller
{

    public function sendAction(Request $request)
    {
        return new Response(
                "OK",
                Response::HTTP_OK,
                array('content-type' => 'text/html')
                );
    }
}
