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
    private ?Place $placeId = null;

    #[ORM\ManyToOne(inversedBy: 'nodes')]
    private ?Group $groupId = null;

    #[ORM\OneToMany(mappedBy: 'nodeId', targetEntity: Measure::class, orphanRemoval: true)]
    private Collection $measures;

    #[ORM\OneToMany(mappedBy: 'nodeId', targetEntity: NodeMeta::class, orphanRemoval: true)]
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

    public function getPlaceId(): ?Place
    {
        return $this->placeId;
    }

    public function setPlaceId(?Place $placeId): self
    {
        $this->placeId = $placeId;

        return $this;
    }

    public function getGroupId(): ?Group
    {
        return $this->groupId;
    }

    public function setGroupId(?Group $groupId): self
    {
        $this->groupId = $groupId;

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
            $measure->setNodeId($this);
        }

        return $this;
    }

    public function removeMeasure(Measure $measure): self
    {
        if ($this->measures->removeElement($measure)) {
            // set the owning side to null (unless already changed)
            if ($measure->getNodeId() === $this) {
                $measure->setNodeId(null);
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
            $nodeMeta->setNodeId($this);
        }

        return $this;
    }

    public function removeNodeMeta(NodeMeta $nodeMeta): self
    {
        if ($this->nodeMetas->removeElement($nodeMeta)) {
            // set the owning side to null (unless already changed)
            if ($nodeMeta->getNodeId() === $this) {
                $nodeMeta->setNodeId(null);
            }
        }

        return $this;
    }
}
