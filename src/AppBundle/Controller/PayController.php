<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


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

        $user = $this->getUser();
        
        if ($user->getLastPay()->format("m.d.y") != date("m.d.y")){
            // if the last pay was made not today, we can set all saved summs to zero to this user. This made instead of set to zeros all users saved summs eevery day 
            $user->setMobileSum(0);
            $user->setAtmSum(0);
            $user->setInternetSum(0);
        }

        $em = $this->getDoctrine()->getManager();

        $limits = $em->getRepository('AppBundle:PayLimits')->findAll()[0];



        $pay = new Pay();

        $pay->setUser($user);
        $pay->setPayWay($request->get("pay_way"));
        $pay->setSumm($request->get("pay_sum"));
        $pay->setDate(
            date_create(date("m.d.y"))
            );

        //limits part
        $minBound = call_user_func(array($limits,"get".ucfirst($pay->getPayWay())."MinBound"));
        $maxBound = call_user_func(array($limits,"get".ucfirst($pay->getPayWay())."MaxBound"));

        $summaryMaxBound = call_user_func(array($limits, "get".ucfirst($pay->getPayWay())."MaxDay"));
        

        if( $pay->getSumm() < $minBound || $pay->getSumm() > $maxBound)
            return new JsonResponse(array(
                "errorMessage" => "Платеж, совершенный данным образом, должен быть не менее ".$minBound." и не более ".$maxBound,
                ));

        //user part
        $sumSetter = "set".ucfirst($pay->getPayWay())."Sum";
        $sumGetter = "get".ucfirst($pay->getPayWay())."Sum";
        $currentUserSum = call_user_func(array($user,$sumGetter));
        
        if($currentUserSum+$pay->getSumm() > $summaryMaxBound)
            return new JsonResponse(array(
                "errorMessage" => "При выполнении данной платежа, превышается дневной лимит по данному каналу на ".($pay->getSumm()-$summaryMaxBound+$currentUserSum),
                ));

        call_user_func(array($user, $sumSetter), $currentUserSum + $pay->getSumm());

        $user->addPay($pay);
        $user->setLastPay(date_create(date("m.d.y")));
        
        $em->flush();

        return new JsonResponse(array(
                "okMessage" => "Платеж одобрен!"
                ));
    }
}
