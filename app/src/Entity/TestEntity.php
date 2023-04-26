<?php

namespace App\Entity;

use App\Repository\TestEntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestEntityRepository::class)
 */
class TestEntity
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
    private $namw;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameCstegory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamw(): ?string
    {
        return $this->namw;
    }

    public function setNamw(string $namw): self
    {
        $this->namw = $namw;

        return $this;
    }

    public function getNameCstegory(): ?string
    {
        return $this->nameCstegory;
    }

    public function setNameCstegory(string $nameCstegory): self
    {
        $this->nameCstegory = $nameCstegory;

        return $this;
    }
}
