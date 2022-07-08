<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $groupCompetence;

    public function __construct()
    {
        $this->groupCompetence = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, GroupCompetence>
     */
    public function getGroupCompetence(): Collection
    {
        return $this->groupCompetence;
    }

    public function addGroupCompetence(GroupCompetence $groupCompetence): self
    {
        if (!$this->groupCompetence->contains($groupCompetence)) {
            $this->groupCompetence[] = $groupCompetence;
            $groupCompetence->setCompetences($this);
        }

        return $this;
    }

    public function removeGroupCompetence(GroupCompetence $groupCompetence): self
    {
        if ($this->groupCompetence->removeElement($groupCompetence)) {
            // set the owning side to null (unless already changed)
            if ($groupCompetence->getCompetences() === $this) {
                $groupCompetence->setCompetences(null);
            }
        }

        return $this;
    }
}
