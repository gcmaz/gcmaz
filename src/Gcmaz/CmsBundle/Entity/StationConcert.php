<?php

namespace Gcmaz\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gcmaz\CmsBundle\Entity\StationConcert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gcmaz\CmsBundle\Entity\StationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class StationConcert
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
     *
     * @ORM\ManyToOne(targetEntity="Station", inversedBy="stationconcert")
     * @ORM\JoinColumn(name="station_id", referencedColumnName="id")
     */
    protected $station;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Concert", inversedBy="stationconcert")
     * @ORM\JoinColumn(name="concert_id", referencedColumnName="id")
     */
    protected $concert;
    
    public function __toString()
    {
        return $this->id;
    }

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
     * Set station
     *
     * @param \Gcmaz\CmsBundle\Entity\Station $station
     * @return StationConcert
     */
    public function setStation(\Gcmaz\CmsBundle\Entity\Station $station = null)
    {
        $this->station = $station;
    
        return $this;
    }

    /**
     * Get station
     *
     * @return \Gcmaz\CmsBundle\Entity\Station 
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * Set concert
     *
     * @param \Gcmaz\CmsBundle\Entity\Concert $concert
     * @return StationConcert
     */
    public function setConcert(\Gcmaz\CmsBundle\Entity\Concert $concert = null)
    {
        $this->concert = $concert;
    
        return $this;
    }

    /**
     * Get concert
     *
     * @return \Gcmaz\CmsBundle\Entity\Concert 
     */
    public function getConcert()
    {
        return $this->concert;
    }
}