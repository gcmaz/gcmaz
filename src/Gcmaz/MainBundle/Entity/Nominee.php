<?php

namespace Gcmaz\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;


/**
 * Gcmaz\MainBundle\Entity\Nominee
 * @ORM\Entity
 */
class Nominee
{
    protected $nominee;
    
    protected $name;

    protected $email;
    
    protected $phone;

    protected $where;
    
    protected $why;
    
    protected $kaff;
    
    protected $kfsz;
    
    protected $ktmg;
    
    protected $knot;

    public function getNominee()
    {
        return $this->nominee;
    }

    public function setNominee($nominee)
    {
        $this->nominee = $nominee;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getWhere()
    {
        return $this->where;
    }
    
    public function setWhere($where)
    {
        $this->where = $where;
    }
    
    public function getWhy()
    {
        return $this->why;
    }
    
    public function setWhy($why)
    {
        $this->why = $why;
    }

    public function getKaff()
    {
        return $this->kaff;
    }
    
    public function setKaff($kaff)
    {
        $this->kaff = $kaff;
    }
    
    public function getKfsz()
    {
        return $this->kfsz;
    }
    
    public function setKfsz($kfsz)
    {
        $this->kfsz = $kfsz;
    }
    
    public function getKtmg()
    {
        return $this->ktmg;
    }
    
    public function setKtmg($ktmg)
    {
        $this->ktmg = $ktmg;
    }
    
    public function getKnot()
    {
        return $this->knot;
    }
    
    public function setKnot($knot)
    {
        $this->knot = $knot;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('nominee', new NotBlank());
        
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());

        $metadata->addPropertyConstraint('phone', new NotBlank());
        
        $metadata->addPropertyConstraint('why', new NotBlank());
                
    }
    
}