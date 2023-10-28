<?php

namespace App\Entity;

use App\Repository\ErrorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErrorRepository::class)]
class Error
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'error', targetEntity: History::class)]
    private Collection $history;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $json = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $functionName = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->history = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, History>
     */
    public function getHistory(): Collection
    {
        return $this->history;
    }

    public function addHistory(History $history): static
    {
        if (!$this->history->contains($history)) {
            $this->history->add($history);
            $history->setError($this);
        }

        return $this;
    }

    public function removeHistory(History $history): static
    {
        if ($this->history->removeElement($history)) {
            // set the owning side to null (unless already changed)
            if ($history->getError() === $this) {
                $history->setError(null);
            }
        }

        return $this;
    }

    public function getJson(): ?string
    {
        return $this->json;
    }

    public function setJson(?string $json): static
    {
        $this->json = $json;

        return $this;
    }

    public function getFunctionName(): ?string
    {
        return $this->functionName;
    }

    public function setFunctionName(?string $functionName): static
    {
        $this->functionName = $functionName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
