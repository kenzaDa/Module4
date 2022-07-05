<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     
     */
    private $Nom;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     
     */
    private $Age;

    /**
     * @ORM\Column(type="text")
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $Code_Postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ville;

    
    private $Permis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(?int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->Code_Postal;
    }

    public function setCodePostal(int $Code_Postal): self
    {
        $this->Code_Postal = $Code_Postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }
 /**
     * Get the value of permis
     */ 
    public function getPermis()
    {
        return $this->Permis;
    }
 /**
     * Set the value of permis
     *
     * @return  self
     */ 
    public function setPermis(string $Permis): self
    {
        $this->Permis = $Permis;

        return $this;
    }
}
