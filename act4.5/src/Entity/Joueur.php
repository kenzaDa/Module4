<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use symfony\Component\Validator\Constraints as Assert;


class Joueur
{
    private $Nom;
    private $Age;

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }
    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(string $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

}