<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Pay;

class PayController extends Controller
{

    public function sendAction(Request $request)
    {

        if ($this->getUser() == NULL)
            return new Response(
                'user is not authorized',
                Response::HTTP_UNAUTHORIZED,
                array('content-type' => 'text/html')
                ); 

        $em = $this->getDoctrine()->getManager();

        $limits = $em->getRepository('AppBundle:PayLimits')->findAll()[0];

        $user = $this->getUser();

        $pay = new Pay();

        $pay->setUser($user);
        $pay->setPayWay($request->get("pay_way"));
        $pay->setSumm($request->get("pay_sum"));
        $pay->setDate(
            date_create(date("m.d.y"))
            );

        //user part
        $sumSetter = "set".ucfirst($pay->getPayWay())."Sum";
        $sumGetter = "get".ucfirst($pay->getPayWay())."Sum";
        $currentUserSum = call_user_func(array($user,$sumGetter));
        
        call_user_func(array($user, $sumSetter), $currentUserSum + $pay->getSumm());


        
        $user->addPay($pay);

        $em->flush();
        return new Response(
                "OK",
                Response::HTTP_OK,
                array('content-type' => 'text/html')
                );
    }
}
