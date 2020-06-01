<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 * @ApiResource()
 */
class Animal
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biography;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Race", inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return Race
     */
    public function getRace(): Race
    {
        return $this->race;
    }

    /**
     * @param Race $race
     */
    public function setRace(Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }





}
