<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\DishBoothRepository")
 */
class DishBooth
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Booth")
     * @ORM\JoinColumn(nullable=false)
     */
    private $booth;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dish")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dish;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBooth(): ?Booth
    {
        return $this->booth;
    }

    public function setBooth(?Booth $booth): self
    {
        $this->booth = $booth;

        return $this;
    }

    public function getDish(): ?Dish
    {
        return $this->dish;
    }

    public function setDish(?Dish $dish): self
    {
        $this->dish = $dish;

        return $this;
    }
}
