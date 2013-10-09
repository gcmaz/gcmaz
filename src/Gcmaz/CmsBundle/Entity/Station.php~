<?php

namespace Gcmaz\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gcmaz\CmsBundle\Entity\Station
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gcmaz\CmsBundle\Entity\StationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Station
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $callname
     * 
     * @ORM\Column(name="callname", type="string")
     */
    private $callname;
    
    /**
     * @ORM\OneToMany(targetEntity="StationConcert" , mappedBy="station", cascade={"all"})
     */
    protected $stationconcert;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set callname
     *
     * @param string $callname
     * @return Station
     */
    public function setCallname($callname)
    {
        $this->callname = $callname;
    
        return $this;
    }

    /**
     * Get callname
     *
     * @return string 
     */
    public function getCallname()
    {
        return $this->callname;
    }

    /**
     * Add stationconcert
     *
     * @param \Gcmaz\CmsBundle\Entity\StationConcert $stationconcert
     * @return Station
     */
    public function addStationconcert(\Gcmaz\CmsBundle\Entity\StationConcert $stationconcert)
    {
        $this->stationconcert[] = $stationconcert;
    
        return $this;
    }

    /**
     * Remove stationconcert
     *
     * @param \Gcmaz\CmsBundle\Entity\StationConcert $stationconcert
     */
    public function removeStationconcert(\Gcmaz\CmsBundle\Entity\StationConcert $stationconcert)
    {
        $this->stationconcert->removeElement($stationconcert);
    }

    /**
     * Get stationconcert
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStationconcert()
    {
        return $this->stationconcert;
    }

    public function __construct()
    {
    }
    
    public function __toString()
    {
        return $this->callname;
    }
}