<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 */
class Demande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroRegistre;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDemande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRecuperation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreCopies;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="demandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDemande::class, inversedBy="demandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeDemande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroRegistre(): ?int
    {
        return $this->numeroRegistre;
    }

    public function setNumeroRegistre(int $numeroRegistre): self
    {
        $this->numeroRegistre = $numeroRegistre;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDateRecuperation(): ?\DateTimeInterface
    {
        return $this->dateRecuperation;
    }

    public function setDateRecuperation(\DateTimeInterface $dateRecuperation): self
    {
        $this->dateRecuperation = $dateRecuperation;

        return $this;
    }

    public function getNombreCopies(): ?int
    {
        return $this->nombreCopies;
    }

    public function setNombreCopies(int $nombreCopies): self
    {
        $this->nombreCopies = $nombreCopies;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getTypeDemande(): ?TypeDemande
    {
        return $this->typeDemande;
    }

    public function setTypeDemande(?TypeDemande $typeDemande): self
    {
        $this->typeDemande = $typeDemande;

        return $this;
    }
}
