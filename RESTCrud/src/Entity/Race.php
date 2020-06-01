<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raceName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Animal", mappedBy="race")
     */
    private $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaceName()
    {
        return $this->raceName;
    }

    public function setRaceName($raceName): void
    {
        $this->raceName = $raceName;
    }

    /**
     * @return Collection
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }




}
