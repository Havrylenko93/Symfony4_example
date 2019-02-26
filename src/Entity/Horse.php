<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HorsesRepository")
 */
class Horse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $the_number_of_voids_in_which_the_horse_visited;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheNumberOfVoidsInWhichTheHorseVisited(): ?int
    {
        return $this->the_number_of_voids_in_which_the_horse_visited;
    }

    public function setTheNumberOfVoidsInWhichTheHorseVisited(?int $the_number_of_voids_in_which_the_horse_visited): self
    {
        $this->the_number_of_voids_in_which_the_horse_visited = $the_number_of_voids_in_which_the_horse_visited;

        return $this;
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
}
