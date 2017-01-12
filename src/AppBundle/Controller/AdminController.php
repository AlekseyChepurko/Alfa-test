<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\PayLimits;

class AdminController extends Controller
{

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $limits = $em->getRepository('AppBundle:PayLimits')->findAll();
        if(count($limits) > 0)
            $limits = $limits[ count($limits)-1 ];

        return $this->render('default/admin.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'limits' => $limits,
        ]);
    }


    public function saveLimitsAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $curLimits = $em->getRepository('AppBundle:PayLimits')->findAll();

        $length = count($curLimits);

        $limits = new PayLimits();
 
        if ($length>0){
            $lastId = $curLimits[$length-1]->getId();
            $limits = $em->getRepository('AppBundle:PayLimits')->findOneById($lastId);
        }
        
        $limits->setMobileMinBound(
            min(
                $request->get("mobileMin"),
                $request->get("mobileMax"))
            );

        $limits->setMobileMaxBound(
            max(
                $request->get("mobileMin"),
                $request->get("mobileMax"))
            );
        
        $limits->setInternetMinBound(
            min(
                $request->get("internetMin"),
                $request->get("internetMax"))
            );
        
        $limits->setInternetMaxBound(
            max(
                $request->get("internetMin"),
                $request->get("internetMax"))
            );
        
        $limits->setAtmMinBound(
            min(
                $request->get("atmMin"),
                $request->get("atmMax"))
            );
        
        $limits->setAtmMaxBound(
            max(
                $request->get("atmMax"),
                $request->get("atmMin"))
                );

        $limits->setMobileMaxDay($request->get("mobileMaxDay"));
        $limits->setInternetMaxDay($request->get("internetMaxDay"));
        $limits->setAtmMaxDay($request->get("atmMaxDay"));

        $limits->setSummaryMaxBound($request->get("summaryMaxBound"));

        $em->persist($limits);
        $em->flush();

        return new Response(
                "OK",
                Response::HTTP_OK,
                array('content-type' => 'text/html')
                );
    }
}
