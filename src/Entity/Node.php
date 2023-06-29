<?php

namespace App\Entity;

use App\Repository\NodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: NodeRepository::class)]
class Node
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'nodes')]
    private ?Place $place = null;

    #[ORM\ManyToOne(inversedBy: 'nodes')]
    private ?Group $group = null;

    #[ORM\OneToMany(mappedBy: 'node', targetEntity: Measure::class, orphanRemoval: true)]
    private Collection $measures;

    #[ORM\OneToMany(mappedBy: 'node', targetEntity: NodeMeta::class, orphanRemoval: true)]
    private Collection $nodeMetas;

    public function __construct()
    {
        $this->measures = new ArrayCollection();
        $this->nodeMetas = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(?Group $group): self
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return Collection<int, Measure>
     */
    public function getMeasures(): Collection
    {
        return $this->measures;
    }

    public function addMeasure(Measure $measure): self
    {
        if (!$this->measures->contains($measure)) {
            $this->measures->add($measure);
            $measure->setNode($this);
        }

        return $this;
    }

    public function removeMeasure(Measure $measure): self
    {
        if ($this->measures->removeElement($measure)) {
            // set the owning side to null (unless already changed)
            if ($measure->getNode() === $this) {
                $measure->setNode(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NodeMeta>
     */
    public function getNodeMetas(): Collection
    {
        return $this->nodeMetas;
    }

    public function addNodeMeta(NodeMeta $nodeMeta): self
    {
        if (!$this->nodeMetas->contains($nodeMeta)) {
            $this->nodeMetas->add($nodeMeta);
            $nodeMeta->setNode($this);
        }

        return $this;
    }

    public function removeNodeMeta(NodeMeta $nodeMeta): self
    {
        if ($this->nodeMetas->removeElement($nodeMeta)) {
            // set the owning side to null (unless already changed)
            if ($nodeMeta->getNode() === $this) {
                $nodeMeta->setNode(null);
            }
        }

        return $this;
    }
}
