<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PayLimits
 *
 * @ORM\Table(name="pay_limits")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PayLimitsRepository")
 */
class PayLimits
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
     * @ORM\Column(name="mobileMaxBound", type="float")
     */
    private $mobileMaxBound;

    /**
     * @var float
     *
     * @ORM\Column(name="mobileMinBound", type="float")
     */
    private $mobileMinBound;

    /**
     * @var float
     *
     * @ORM\Column(name="internetMaxBound", type="float")
     */
    private $internetMaxBound;

    /**
     * @var float
     *
     * @ORM\Column(name="internetMinBound", type="float")
     */
    private $internetMinBound;

    /**
     * @var float
     *
     * @ORM\Column(name="atmMaxBound", type="float")
     */
    private $atmMaxBound;

    /**
     * @var float
     *
     * @ORM\Column(name="atmMinBound", type="float")
     */
    private $atmMinBound;

    /**
     * @var float
     *
     * @ORM\Column(name="summaryMaxBound", type="float")
     */
    private $summaryMaxBound;


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
     * Set mobileMaxBound
     *
     * @param float $mobileMaxBound
     *
     * @return PayLimits
     */
    public function setMobileMaxBound($mobileMaxBound)
    {
        $this->mobileMaxBound = $mobileMaxBound;

        return $this;
    }

    /**
     * Get mobileMaxBound
     *
     * @return float
     */
    public function getMobileMaxBound()
    {
        return $this->mobileMaxBound;
    }

    /**
     * Set mobileMinBound
     *
     * @param float $mobileMinBound
     *
     * @return PayLimits
     */
    public function setMobileMinBound($mobileMinBound)
    {
        $this->mobileMinBound = $mobileMinBound;

        return $this;
    }

    /**
     * Get mobileMinBound
     *
     * @return float
     */
    public function getMobileMinBound()
    {
        return $this->mobileMinBound;
    }

    /**
     * Set internetMaxBound
     *
     * @param float $internetMaxBound
     *
     * @return PayLimits
     */
    public function setInternetMaxBound($internetMaxBound)
    {
        $this->internetMaxBound = $internetMaxBound;

        return $this;
    }

    /**
     * Get internetMaxBound
     *
     * @return float
     */
    public function getInternetMaxBound()
    {
        return $this->internetMaxBound;
    }

    /**
     * Set internetMinBound
     *
     * @param float $internetMinBound
     *
     * @return PayLimits
     */
    public function setInternetMinBound($internetMinBound)
    {
        $this->internetMinBound = $internetMinBound;

        return $this;
    }

    /**
     * Get internetMinBound
     *
     * @return float
     */
    public function getInternetMinBound()
    {
        return $this->internetMinBound;
    }

    /**
     * Set atmMaxBound
     *
     * @param float $atmMaxBound
     *
     * @return PayLimits
     */
    public function setAtmMaxBound($atmMaxBound)
    {
        $this->atmMaxBound = $atmMaxBound;

        return $this;
    }

    /**
     * Get atmMaxBound
     *
     * @return float
     */
    public function getAtmMaxBound()
    {
        return $this->atmMaxBound;
    }

    /**
     * Set atmMinBound
     *
     * @param float $atmMinBound
     *
     * @return PayLimits
     */
    public function setAtmMinBound($atmMinBound)
    {
        $this->atmMinBound = $atmMinBound;

        return $this;
    }

    /**
     * Get atmMinBound
     *
     * @return float
     */
    public function getAtmMinBound()
    {
        return $this->atmMinBound;
    }

    /**
     * Set summaryMaxBound
     *
     * @param float $summaryMaxBound
     *
     * @return PayLimits
     */
    public function setSummaryMaxBound($summaryMaxBound)
    {
        $this->summaryMaxBound = $summaryMaxBound;

        return $this;
    }

    /**
     * Get summaryMaxBound
     *
     * @return float
     */
    public function getSummaryMaxBound()
    {
        return $this->summaryMaxBound;
    }
}

