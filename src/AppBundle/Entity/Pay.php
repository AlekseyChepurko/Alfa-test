<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pay
 *
 * @ORM\Table(name="pay")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PayRepository")
 */
class Pay
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="summ", type="float")
     */
    private $summ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetimetz")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="payWay", type="string", length=255)
     */
    private $payWay;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="pays")
     */
    private $user;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;
        return $this;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set summ
     *
     * @param float $summ
     *
     * @return Pay
     */
    public function setSumm($summ)
    {
        $this->summ = $summ;

        return $this;
    }

    /**
     * Get summ
     *
     * @return float
     */
    public function getSumm()
    {
        return $this->summ;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Pay
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set payWay
     *
     * @param string $payWay
     *
     * @return Pay
     */
    public function setPayWay($payWay)
    {
        $this->payWay = $payWay;

        return $this;
    }

    /**
     * Get payWay
     *
     * @return string
     */
    public function getPayWay()
    {
        return $this->payWay;
    }
}

