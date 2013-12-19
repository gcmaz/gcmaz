<?php

namespace Gcmaz\MainBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\Url;

class SendLink
{
    protected $name;

    protected $email;
    
    protected $phone;

    protected $where;
    
    protected $link;

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
    
    public function getLink()
    {
        return $this->link;
    }
    
    public function setLink($link)
    {
        $this->link = $link;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());

        $metadata->addPropertyConstraint('phone', new NotBlank());
        
        $metadata->addPropertyConstraint('where', new NotBlank());
        
        $metadata->addPropertyConstraint('link', new NotBlank());
    }
    
}
?>