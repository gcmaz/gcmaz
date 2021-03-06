<?php

namespace Gcmaz\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gcmaz\CmsBundle\Entity\Concert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gcmaz\CmsBundle\Entity\ConcertRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Concert
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
     * @var string $title
     * 
     * @ORM\Column(name="title", type="string")
     */
    private $title;
    
    /**
     * @ORM\OneToMany(targetEntity="StationConcert",  mappedBy="concert", cascade={"all"})
     */
    protected $stationconcert;
            
    protected $stations;
    
    public function __construct()
    {
        $this->stationconcert = new ArrayCollection();
        $this->stations = new ArrayCollection();
    }
    
    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var User $author
     *
     * @ORM\ManyToOne(targetEntity="Gcmaz\UserBundle\Entity\User")
     */
    private $author;

    /**
     * @var Media $picture
     *
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     */
    private $picture;

    /**
     * @var Link $link
     *
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $concertDate;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKAFF;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKMGN;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKFSZ;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKAFFAM;
    
     /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKTMG;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showKNOT;
    
    /**
     * @var boolean $published
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;
    
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
     * Set title
     *
     * @param string $title
     * @return Concert
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Concert
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Set link
     *
     * @param string $link
     * @return Link
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
    
    /**
     * Set concertDate
     *
     * @param \string $concertDate
     * @return Concert
     */
    public function setConcertDate($concertDate)
    {
        $this->concertDate = $concertDate;
    
        return $this;
    }

    /**
     * Get concertDate
     *
     * @return \string
     */
    public function getConcertDate()
    {
        return $this->concertDate;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Concert
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set author
     *
     * @param \Gcmaz\UserBundle\Entity\User $author
     * @return Concert
     */
    public function setAuthor(\Gcmaz\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Gcmaz\UserBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set picture
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $picture
     * @return Concert
     */
    public function setPicture(\Application\Sonata\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set showKAFF
     *
     * @param boolean $showKAFF
     * @return Concert
     */
    public function setShowKAFF($showKAFF)
    {
        $this->showKAFF = $showKAFF;
    
        return $this;
    }

    /**
     * Get showKAFF
     *
     * @return boolean 
     */
    public function getShowKAFF()
    {
        return $this->showKAFF;
    }

    /**
     * Set showKMGN
     *
     * @param boolean $showKMGN
     * @return Concert
     */
    public function setShowKMGN($showKMGN)
    {
        $this->showKMGN = $showKMGN;
    
        return $this;
    }

    /**
     * Get showKMGN
     *
     * @return boolean 
     */
    public function getShowKMGN()
    {
        return $this->showKMGN;
    }

    /**
     * Set showKFSZ
     *
     * @param boolean $showKFSZ
     * @return Concert
     */
    public function setShowKFSZ($showKFSZ)
    {
        $this->showKFSZ = $showKFSZ;
    
        return $this;
    }

    /**
     * Get showKFSZ
     *
     * @return boolean 
     */
    public function getShowKFSZ()
    {
        return $this->showKFSZ;
    }

    /**
     * Set showKAFFAM
     *
     * @param boolean $showKAFFAM
     * @return Concert
     */
    public function setShowKAFFAM($showKAFFAM)
    {
        $this->showKAFFAM = $showKAFFAM;
    
        return $this;
    }

    /**
     * Get showKAFFAM
     *
     * @return boolean 
     */
    public function getShowKAFFAM()
    {
        return $this->showKAFFAM;
    }

    /**
     * Set showKTMG
     *
     * @param boolean $showKTMG
     * @return Concert
     */
    public function setShowKTMG($showKTMG)
    {
        $this->showKTMG = $showKTMG;
    
        return $this;
    }

    /**
     * Get showKTMG
     *
     * @return boolean 
     */
    public function getShowKTMG()
    {
        return $this->showKTMG;
    }

    /**
     * Set showKNOT
     *
     * @param boolean $showKNOT
     * @return Concert
     */
    public function setShowKNOT($showKNOT)
    {
        $this->showKNOT = $showKNOT;
    
        return $this;
    }

    /**
     * Get showKNOT
     *
     * @return boolean 
     */
    public function getShowKNOT()
    {
        return $this->showKNOT;
    }

    /**
     * Add stationconcert
     *
     * @param \Gcmaz\CmsBundle\Entity\StationConcert $stationconcert
     * @return Concert
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

    public function __toString()
    {
        return ($this->getTitle() === null) ? 'Upcoming Concert' : (string) $this->getTitle();
    }
    
    //important
    public function getStations()
    {
        $stations = new ArrayCollection();
        foreach($this->stationconcert as $sc)
        {
            $stations[] = $sc->getStation();
        }
        return $stations;
    }
    
    //important
    public function setStations($stations)
    {
        foreach($stations as $s)
        {
            $stationconcert = new Stationconcert();
            $stationconcert->setConcert($this);
            $stationconcert->setStation($s);
            $this->addStationconcert($stationconcert);
        }
    }
    
    public function getConcert()
    {
        return $this;
    }
    
}