<?php

namespace App\Entity;

use App\Repository\EmployeePositionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeePositionRepository::class)]
class EmployeePosition
{
    public const SCORE_NO_KNOWLEDGE = 0;
    public const SCORE_THEORETICAL_KNOWLEDGE = 1;
    public const SCORE_HAVE_EXPERIENCE = 2;
    public const SCORE_PROFICIENT = 3;
    public const SCORE_GURU = 4;

    private const FINAL_SCORES = [
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
    private int $finalScore;

    #[ORM\ManyToOne(targetEntity: ExpectationLevel::class, inversedBy: 'employeePosition')]
    private ExpectationLevel $expectationLevel;

    #[ORM\ManyToOne(targetEntity: Employee::class, inversedBy: 'employeePositions')]
    private Employee $employee;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFinalScore(): int
    {
        return $this->finalScore;
    }

    public function setFinalScore($finalScore): void
    {
        self::assertFinalScoreIsCorrect($finalScore);

        $this->finalScore = $finalScore;
    }

    private static function assertFinalScoreIsCorrect($finalScore)
    {
        if (!self::scoreIsCorrect($finalScore)) {
            throw new \DomainException("Значение должно быть в пределах от 1 до 4");
        }
    }

    private static function scoreIsCorrect(int $finalScore): bool
    {
        return array_search($finalScore, self::FINAL_SCORES);
    }

    public function getExpectationLevel(): ExpectationLevel
    {
        return $this->expectationLevel;
    }

    public function setExpectationLevel(ExpectationLevel $expectationLevel): void
    {
        $this->expectationLevel = $expectationLevel;
    }

    public function getEmployee(): Employee
    {
        return $this->employee;
    }

    public function setEmployee(Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }
}
