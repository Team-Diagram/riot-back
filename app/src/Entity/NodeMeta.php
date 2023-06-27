<?php

namespace App\Entity;

use App\Repository\NodeMetaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: NodeMetaRepository::class)]
class NodeMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $metaKey = null;

    #[ORM\Column(length: 255)]
    private ?string $metaValue = null;

    #[ORM\ManyToOne(inversedBy: 'nodeMetas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Node $nodeId = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getMetaKey(): ?string
    {
        return $this->metaKey;
    }

    public function setMetaKey(string $metaKey): self
    {
        $this->metaKey = $metaKey;

        return $this;
    }

    public function getMetaValue(): ?string
    {
        return $this->metaValue;
    }

    public function setMetaValue(string $metaValue): self
    {
        $this->metaValue = $metaValue;

        return $this;
    }

    public function getNodeId(): ?Node
    {
        return $this->nodeId;
    }

    public function setNodeId(?Node $nodeId): self
    {
        $this->nodeId = $nodeId;

        return $this;
    }
}