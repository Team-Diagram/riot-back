<?php

namespace App\Entity;

use App\Repository\NodeMetaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: NodeMetaRepository::class)]
class NodeMeta implements \JsonSerializable
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
    private ?Node $node = null;

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

    public function getNode(): ?Node
    {
        return $this->node;
    }

    public function setNodeId(?Node $node): self
    {
        $this->node = $node;

        return $this;
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
}
