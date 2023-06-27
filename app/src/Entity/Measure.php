<?php

namespace App\Entity;

use App\Repository\MeasureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: MeasureRepository::class)]
class Measure
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column]
    private array $value = [];

    #[ORM\Column]
    private ?int $sensorId = null;

    #[ORM\ManyToOne(inversedBy: 'measures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Node $nodeId = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getValue(): array
    {
        return $this->value;
    }

    public function setValue(array $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getSensorId(): ?int
    {
        return $this->sensorId;
    }

    public function setSensorId(int $sensorId): self
    {
        $this->sensorId = $sensorId;

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