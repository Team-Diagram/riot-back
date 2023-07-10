<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $peopleCount = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Planning::class, orphanRemoval: true)]
    private Collection $plannings;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Node::class, orphanRemoval: true)]
    private Collection $nodes;

    #[ORM\Column(nullable: true)]
    private ?bool $lightState = null;

    #[ORM\Column(nullable: true)]
    private ?int $heaterState = null;

    #[ORM\Column(nullable: true)]
    private ?int $acState = null;

    #[ORM\Column(nullable: true)]
    private ?int $ventState = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    public function __construct()
    {
        $this->plannings = new ArrayCollection();
        $this->nodes = new ArrayCollection();
    }

    public function getId(): ?Uuid
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

    public function getPeopleCount(): ?int
    {
        return $this->peopleCount;
    }

    public function setPeopleCount(int $peopleCount): self
    {
        $this->peopleCount = $peopleCount;

        return $this;
    }

    /**
     * @return Collection<int, Planning>
     */
    public function getPlannings(): Collection
    {
        return $this->plannings;
    }

    public function addPlanning(Planning $planning): self
    {
        if (!$this->plannings->contains($planning)) {
            $this->plannings->add($planning);
            $planning->setPlace($this);
        }

        return $this;
    }

    public function removePlanning(Planning $planning): self
    {
        if ($this->plannings->removeElement($planning)) {
            // set the owning side to null (unless already changed)
            if ($planning->getPlace() === $this) {
                $planning->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Node>
     */
    public function getNodes(): Collection
    {
        return $this->nodes;
    }

    public function addNode(Node $node): self
    {
        if (!$this->nodes->contains($node)) {
            $this->nodes->add($node);
            $node->setPlace($this);
        }

        return $this;
    }

    public function removeNode(Node $node): self
    {
        if ($this->nodes->removeElement($node)) {
            // set the owning side to null (unless already changed)
            if ($node->getPlace() === $this) {
                $node->setPlace(null);
            }
        }

        return $this;
    }

    public function isLightState(): ?bool
    {
        return $this->lightState;
    }

    public function setLightState(?bool $lightState): self
    {
        $this->lightState = $lightState;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeaterState(): ?int
    {
        return $this->heaterState;
    }

    /**
     * @param int|null $heaterState
     */
    public function setHeaterState(?int $heaterState): void
    {
        $this->heaterState = $heaterState;
    }

    /**
     * @return int|null
     */
    public function getAcState(): ?int
    {
        return $this->acState;
    }

    /**
     * @param int|null $acState
     */
    public function setAcState(?int $acState): void
    {
        $this->acState = $acState;
    }

    /**
     * @return int|null
     */
    public function getVentState(): ?int
    {
        return $this->ventState;
    }

    /**
     * @param int|null $ventState
     */
    public function setVentState(?int $ventState): void
    {
        $this->ventState = $ventState;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

}
