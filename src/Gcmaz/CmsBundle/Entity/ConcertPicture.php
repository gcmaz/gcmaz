<?php

namespace Gcmaz\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gcmaz\CmsBundle\Entity\ConcertPicture
 *
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 */
class ConcertPicture
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
     * @ORM\ManyToOne(targetEntity="Concert", inversedBy="concertpicture", cascade={"all"})
     */
    protected $concert;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Picture", inversedBy="concertpicture", cascade={"all"})
     */
    protected $picture;
    
     public function __construct() {
     }
    
    public function __toString()
    {
        return $this->$id;
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
     * Set concert
     *
     * @param \Gcmaz\CmsBundle\Entity\Concert $concert
     * @return ConcertPicture
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
    
    /**
     * Set picture
     *
     * @param \Gcmaz\CmsBundle\Picture $picture
     * @return ConcertPicture
     */
    public function setPicture(\Gcmaz\CmsBundle\Picture $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Gcmaz\CmsBundle\Picture 
     */
    public function getPicture()
    {
        return $this->picture;
    }
}