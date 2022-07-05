<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use symfony\Component\Validator\Constraints as Assert;


class Equipe
{


    private $Nomequipe ;
    private $Ville;
    private $Sport;
    public $joueur;


    public function getNomequipe(): ?string
    {
        return $this->Nomequipe;
    }

    public function setNomequipe(string $Nomequipe): self
    {
        $this->Nomequipe = $Nomequipe;

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
    public function getSport(): ?string
    {
        return $this->Sport;
    }

    public function setSport(string $Sport): self
    {
        $this->Sport = $Sport;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(string $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

}