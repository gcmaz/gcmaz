<?php

namespace Gcmaz\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gcmaz\CmsBundle\Entity\Realtor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gcmaz\CmsBundle\Entity\RealtorRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Realtor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $address
     * 
     * @ORM\Column(name="address", type="string")
     */
    private $address;
    
    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $listDate;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

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
     * Set address
     *
     * @param string $address
     * @return Realtor
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Realtor
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set listDate
     *
     * @param string $listDate
     * @return Realtor
     */
    public function setListDate($listDate)
    {
        $this->listDate = $listDate;
    
        return $this;
    }

    /**
     * Get listDate
     *
     * @return string 
     */
    public function getListDate()
    {
        return $this->listDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Realtor
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Realtor
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set author
     *
     * @param \Gcmaz\UserBundle\Entity\User $author
     * @return Realtor
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
     * @return Realtor
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

        public function __toString()
    {
        return ($this->getAddress() === null) ? 'Dream Homes' : (string) $this->getAddress();
    }
}