<?php

namespace Gcmaz\CmsBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="picture")
 */
class Picture extends BaseMedia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="\Gcmaz\CmsBundle\Entity\ConcertPicture", mappedBy="picture" , cascade={"all"})
     */
    protected $concertpicture;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Remove concertpicture
     *
     * @param ConcertPicture $concertpicture
     */
    public function removeConcertpicture(\Gcmaz\CmsBundle\Entity\ConcertPicture $concertpicture)
    {
        $this->concertpicture->removeElement($concertpicture);
    }

    /**
     * Get concertpicture
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConcertpicture()
    {
        return $this->concertpicture;
    }
    
    /**
     * Add concertpicture
     *
     * @param \Gcmaz\CmsBundle\Entity\ConcertPicture $concertpicture
     * @return Concert
     */
    public function addConcertpicture(\Gcmaz\CmsBundle\Entity\ConcertPicture $concertpicture)
    {
        $this->concertpicture[] = $concertpicture;
    
        return $this;
    }
    
    public function __construct()
    {
    }
    
    public function __toString()
    {
        return $this->callname;
    }
    
}