<?php

namespace App\Entity;

use App\Repository\ThrowDiceHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThrowDiceHistoryRepository::class)
 */
class ThrowDiceHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length="1")
     */
    private $playerResult;
    /**
     * @ORM\Column(type="string",  length="1")
     */
    private $computerResult;
    /**
     * @ORM\Column(type="string",  length="8")
     */
    private $winner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerResult(): ?string
    {
        return $this->playerResult;
    }

    public function setPlayerResult(string $playerResult): self
    {
        $this->playerResult = $playerResult;

        return $this;
    }

    public function getComputerResult(): ?string
    {
        return $this->computerResult;
    }

    public function setComputerResult(string $computerResult): self
    {
        $this->computerResult = $computerResult;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(string $winner): self
    {
        $this->winner = $winner;

        return $this;
    }
}
