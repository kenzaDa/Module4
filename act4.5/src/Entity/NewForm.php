<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class NewForm
{


/**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;
/**
     * @ORM\Column(type="string", length=255)
     */
    private $confirmationemail;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $numero;




    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

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

    public function getConfirmationEmail()
    {
        return $this->confirmationemail;
    }

    public function setConfirmationEmail(string $confirmationemail): self
    {
        $this->confirmationemail = $confirmationemail;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }


    
}
