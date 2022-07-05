<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use symfony\Component\Validator\Constraints as Assert;

/**

 */
class Emailing
{


/**
     * @ORM\Column(type="string")
     */
    private $firstname;


    /**
     * @ORM\Column(type="string")
     */
    private $lastname;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;


    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $numero;


    private $leboncoin;

    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }
    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }
  

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

   

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
    public function getLeboncoin(){
        return $this->leboncoin;
    }

    public function setLeboncoin(string $leboncoin): self
    {
        $this->leboncoin = $leboncoin;

        return $this;
    }

    
}