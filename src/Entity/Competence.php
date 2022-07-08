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
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: GroupCompetence::class, inversedBy: 'competences')]
    public $groupCompetence;

    public function getId(): ?int
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

    public function getGroupCompetence(): ?GroupCompetence
    {
        return $this->groupCompetence;
    }

    public function setGroupCompetence(?GroupCompetence $groupCompetence): self
    {
        $this->groupCompetence = $groupCompetence;

        return $this;
    }
}
