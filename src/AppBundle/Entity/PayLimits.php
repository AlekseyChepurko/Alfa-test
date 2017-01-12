<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class PayLimits{

    private static $mobileMaxBound = 0;
    private static $mobileMinBound = 0;

    private static $internetMaxBound = 0;
    private static $internetMinBound = 0;
    
    private static $atmMaxBound = 0;
    private static $atmMinBound = 0;

    private static $summaryMaxBound = 0;

    public static function getMobileMaxBound()
     {
         return $mobileMaxBound;
     }

     public static function getMobileMinBound()
      {
          return $mobileMinBound;
      } 
     public static function setMobileMaxBound($value=0)
     {
         $mobileMaxBound = $value;
     }

     public static function setMobileMinBound($value=0)
     {
         $mobileMinBound = $value;
     }

     public static function getInternetMaxBound()
     {
         return $internetMaxBound;
     }

     public static function getInternetMinBound()
      {
          return $intenetMinBound;
      } 
     public static function setInternetMaxBound($value=0)
     {
         $internetMaxBound = $value;
     }

     public static function setInternetMinBound($value=0)
     {
         $internetMinBound = $value;
     }

     public static function getAtmMaxBound()
     {
         return $atmMaxBound;
     }

     public function getAtmMinBound()
      {
          return $atmMinBound;
      } 
     public static function setAtmMaxBound($value=0)
     {
         $atmMaxBound = $value;
     }

     public static function setAtmMinBound($value=0)
     {
         $atmMinBound = $value;
     }


     public static function getSummaryMaxBound()
     {
         return $summaryMaxBound;
     }

     public static function setSummaryMaxBound($value=0)
     {
         $summaryMaxBound = $value;
     }
}
    