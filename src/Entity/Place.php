<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place implements \JsonSerializable
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

    #[ORM\Column(options: ['default' => false])]
    private ?bool $shutDown = false;

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

    public function getHeaterState(): ?int
    {
        return $this->heaterState;
    }

    public function setHeaterState(?int $heaterState): void
    {
        $this->heaterState = $heaterState;
    }

    public function getAcState(): ?int
    {
        return $this->acState;
    }

    public function setAcState(?int $acState): void
    {
        $this->acState = $acState;
    }

    public function getVentState(): ?int
    {
        return $this->ventState;
    }

    public function setVentState(?int $ventState): void
    {
        $this->ventState = $ventState;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function jsonSerialize(): mixed
    {
        $reflection = new \ReflectionClass($this);
        $atts = [];

        foreach ($reflection->getProperties() as $property) {
            $atts[$property->getName()] = $property->getValue($this);
        }

        return $atts;
    }

    public function isShutDown(): ?bool
    {
        return $this->shutDown;
    }

    public function setShutDown(bool $shutDown): self
    {
        $this->shutDown = $shutDown;

        return $this;
    }
}
