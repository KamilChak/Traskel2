<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_Cmd = null;

    #[ORM\Column(length: 255)]
    private ?string $statut_Cmd = null;

    #[ORM\Column(length: 255)]
    private ?string $delais_Cmd = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Panier $idPanier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseCmd(): ?string
    {
        return $this->adresse_Cmd;
    }

    public function setAdresseCmd(string $adresse_Cmd): static
    {
        $this->adresse_Cmd = $adresse_Cmd;

        return $this;
    }

    public function getStatutCmd(): ?string
    {
        return $this->statut_Cmd;
    }

    public function setStatutCmd(string $statut_Cmd): static
    {
        $this->statut_Cmd = $statut_Cmd;

        return $this;
    }

    public function getPrixCmd(): ?float
    {
        return $this->idPanier ? $this->idPanier->getTotalPrix() : null;
    }

    public function getDelaisCmd(): ?string
    {
        return $this->delais_Cmd;
    }

    public function setDelaisCmd(string $delais_Cmd): static
    {
        $this->delais_Cmd = $delais_Cmd;

        return $this;
    }

    public function getPanierNbProd(): ?int
    {
        return $this->idPanier ? $this->idPanier->getNbrProds() : null;
    }
    public function getPanier(): ?Panier
    {
        return $this->idPanier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->idPanier = $panier;

        return $this;
    }

}
