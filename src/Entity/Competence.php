<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: GroupCompetence::class, inversedBy: 'competences')]
    private GroupCompetence $groupCompetence;

    #[ORM\OneToOne(targetEntity: ExpectationLevel::class, mappedBy: 'competence')]
    private ExpectationLevel $expectationLevel;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGroupCompetence(): GroupCompetence
    {
        return $this->groupCompetence;
    }

    public function setGroupCompetence(GroupCompetence $groupCompetence): self
    {
        $this->groupCompetence = $groupCompetence;

        return $this;
    }

    public function getExpectationLevel()
    {
        return $this->expectationLevel;
    }

    public function setExpectationLevel($expectationLevel): void
    {
        $this->expectationLevel = $expectationLevel;
    }

    public function __toString(): string
    {
        return sprintf('%s - %s', $this->getGroupCompetence()->getName(), $this->getName());
    }
}
