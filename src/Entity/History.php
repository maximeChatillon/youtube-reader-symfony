<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\HistoryRepository")
 */
class History
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
    private $id_history;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdHistory(): ?string
    {
        return $this->id_history;
    }

    public function setIdHistory(string $id_history): self
    {
        $this->id_history = $id_history;

        return $this;
    }
}
