<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Pay", mappedBy="user", cascade={"persist"})
     */
    private $pays;

    /**
     * @var float
     *
     * @ORM\Column(name="mobileSum", type="float")
     */
    private $mobileSum;

    /**
     * @var float
     *
     * @ORM\Column(name="internetSum", type="float")
     */
    private $internetSum;

    /**
     * @var float
     *
     * @ORM\Column(name="atmSum", type="float")
     */
    private $atmSum;

    public function getAtmSum()
    {
        return $this->atmSum;
    }

    public function setAtmSum($sum)
    {
        $this->atmSum = $sum;
        return $this;
    }

    public function getInternetSum()
    {
        return $this->internetSum;
    }

    public function setInternetSum($sum)
    {
        $this->internetSum = $sum;
        return $this;
    }

    public function getMobileSum()
    {
        return $this->mobileSum;
    }

    public function setMobileSum($sum)
    {
        $this->mobileSum = $sum;
        return $this;
    }

    public function getPays()
    {
        return $this->pays;
    }

    public function addPay(\AppBundle\Entity\Pay $pay)
    {
        $this->pays[] = $pay;
        return $this;
    }

    public function __construct()
    {
        parent::__construct();

        $this->pays = new ArrayCollection();

        $this->mobileSum = 0;
        $this->atmSum = 0;
        $this->internetSum = 0;

    }
}