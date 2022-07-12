<?php

namespace App\Entity;

use App\Repository\ExpectationLevelRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpectationLevelRepository::class)]
class ExpectationLevel
{
    public const SCORE_NO_KNOWLEDGE = 0;
    public const SCORE_THEORETICAL_KNOWLEDGE = 1;
    public const SCORE_HAVE_EXPERIENCE = 2;
    public const SCORE_PROFICIENT = 3;
    public const SCORE_GURU = 4;

    private const SCORES = [
        self::SCORE_NO_KNOWLEDGE,
        self::SCORE_THEORETICAL_KNOWLEDGE,
        self::SCORE_HAVE_EXPERIENCE,
        self::SCORE_PROFICIENT,
        self::SCORE_GURU,
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', nullable: false)]
    private int $score;

    #[ORM\OneToOne(targetEntity: Competence::class, inversedBy: 'expectationLevel')]
    private Competence $competence;

    #[ORM\OneToMany(targetEntity: EmployeePosition::class, mappedBy: 'expectationLevel')]
    private Collection $employeePositions;

    public function getId(): int
    {
        return $this->id;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore($score): void
    {
        self::assertScoreIsCorrect($score);

        $this->score = $score;
    }

    private static function assertScoreIsCorrect(int $score): void
    {
        if (self::scoreIsCorrect($score)) {
            throw new \DomainException("Значение должно быть в пределах от 1 до 4");
        }
    }

    private static function scoreIsCorrect(int $score): bool
    {
        return array_search($score, self::SCORES);
    }

    public function getCompetence(): Competence
    {
        return $this->competence;
    }

    public function setCompetence($competence): void
    {
        $this->competence = $competence;
    }


    public function getEmployeePositions(): Collection
    {
        return $this->employeePositions;
    }

    public function addEmployeePosition(EmployeePosition $employeePosition): self
    {
        if (!$this->employeePositions->contains($employeePosition)) {
            $this->employeePositions[] = $employeePosition;
            $employeePosition->setExpectationLevel($this);
        }

        return $this;
    }

    public function removeEmployeePosition(EmployeePosition $employeePosition): self
    {
        if ($this->employeePositions->removeElement($employeePosition)) {
            if ($employeePosition->getExpectationLevel() === $this) {
                $employeePosition->setExpectationLevel(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this?->getCompetence();
    }
}
